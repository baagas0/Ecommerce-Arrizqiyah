<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Activation;
use App\Models\Profile;
use App\Models\User;
use App\Traits\ActivationTrait;
use App\Traits\CaptureIpTrait;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use jeremykenedy\LaravelRoles\Models\Role;

use App\Product;
use App\Site;
use App\Payment;
use App\Category;
use App\Contact;
use App\Faq;
use App\Blog;
use App\Banner;

class ActivateController extends Controller
{
    use ActivationTrait;

    private static $UserHomeRoute = 'public.home';
    private static $adminHomeRoute = 'public.home';
    private static $activationView = 'auth.activation';
    private static $activationRoute = 'activation-required';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Gets the user home route.
     *
     * @return string
     */
    public static function getUserHomeRoute()
    {
        return self::$UserHomeRoute;
    }

    /**
     * Gets the admin home route.
     *
     * @return string
     */
    public static function getAdminHomeRoute()
    {
        return self::$adminHomeRoute;
    }

    /**
     * Gets the activation view.
     *
     * @return string
     */
    public static function getActivationView()
    {
        return self::$activationView;
    }

    /**
     * Gets the activation route.
     *
     * @return string
     */
    public static function getActivationRoute()
    {
        return self::$activationRoute;
    }

    /**
     * Redirect the user after activation with admin logic.
     *
     * @param $user             The user
     * @param currentRoute      The current route
     *
     * @return Redirect
     */
    public static function activeRedirect($user, $currentRoute)
    {
        if ($user->activated) {
            Log::info('Activated user attempted to visit '.$currentRoute.'. ', [$user]);

            if ($user->isAdmin()) {
                return redirect()->route(self::getAdminHomeRoute())
                ->with('status', 'info')
                ->with('message', trans('auth.alreadyActivated'));
            }

            return redirect()->route(self::getUserHomeRoute())
                ->with('status', 'info')
                ->with('message', trans('auth.alreadyActivated'));
        }

        return false;
    }

    /**
     * Initial Activation View.
     *
     * @return Redirect
     */
    public function initial()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        $data = [
            'email' => $user->email,
            'date'  => $lastActivation->created_at->format('m/d/Y'),
        ];

        $data['auth'] = Auth::user();
        $data['best_item'] = Product::where('best_item','=', '1')
                            ->limit(4)
                            ->get();
        $data['newproduct'] = Product::orderBy('create_at', 'DESC')->get();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();
        $data['blog'] = Blog::orderBy('create_at', 'DESC')->limit(4)->get();
        $data['banner'] = Banner::find('1')->first();

        return view($this->getActivationView())->with($data);
    }

    /**
     * Check if actication is required.
     *
     * @return View
     */
    public function activationRequired()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        if ($user->activated == false) {
            $activationsCount = Activation::where('user_id', $user->id)
                ->where('created_at', '>=', Carbon::now()->subHours(config('settings.timePeriod')))
                ->count();

            if ($activationsCount > config('settings.maxAttempts')) {
                Log::info('Exceded max resends in last '.config('settings.timePeriod').' hours. '.$currentRoute.'. ', [$user]);

                $data = [
                    'email' => $user->email,
                    'hours' => config('settings.timePeriod'),
                ];

                return view('auth.exceeded')->with($data);
            }
        }

        Log::info('Registered attempted to navigate while unactivate. '.$currentRoute.'. ', [$user]);

        $data = [
            'email' => $user->email,
            'date'  => $lastActivation ? $lastActivation->created_at->format('m/d/Y') : null, //
        ];

        $data['best_item'] = Product::where('best_item','=', '1')
                            ->limit(4)
                            ->get();
        $data['newproduct'] = Product::orderBy('create_at', 'DESC')->get();
        $data['site'] = Site::find('1');
        $data['payment'] = Payment::where('status','=','1')->get();

        return view($this->getActivationView())->with($data);
    }

    /**
     * Activate a valid user with a token.
     *
     * @param string $token The token
     *
     * @return Redirect
     */
    public function activate($token)
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $ipAddress = new CaptureIpTrait();
        $role = Role::where('slug', '=', 'user')->first();
        $profile = new Profile();

        $rCheck = $this->activeRedirect($user, $currentRoute);
        if ($rCheck) {
            return $rCheck;
        }

        $activation = Activation::where('token', $token)->get()
            ->where('user_id', $user->id)
            ->first();

        if (empty($activation)) {
            Log::info('Registered user attempted to activate with an invalid token: '.$currentRoute.'. ', [$user]);

            return redirect()->route(self::getActivationRoute())
                ->with('status', 'danger')
                ->with('message', trans('auth.invalidToken'));
        }

        $user->activated = true;
        $user->detachAllRoles();
        $user->attachRole($role);
        $user->signup_confirmation_ip_address = $ipAddress->getClientIp();
        $user->profile()->save($profile);
        $user->save();

        $allActivations = Activation::where('user_id', $user->id)->get();
        foreach ($allActivations as $anActivation) {
            $anActivation->delete();
        }

        Log::info('Registered user successfully activated. '.$currentRoute.'. ', [$user]);

        if ($user->isAdmin()) {
            return redirect()->route(self::getAdminHomeRoute())
            ->with('status', 'success')
            ->with('message', trans('auth.successActivated'));
        }

        return redirect('/home')
            ->with('status', 'success')
            ->with('message', trans('auth.successActivated'));
    }

    /**
     * Resend Activation.
     *
     * @return Redirect
     */
    public function resend()
    {
        $user = Auth::user();
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $currentRoute = Route::currentRouteName();

        if ($user->activated == false) {
            $activationsCount = Activation::where('user_id', $user->id)
                ->where('created_at', '>=', Carbon::now()->subHours(config('settings.timePeriod')))
                ->count();

            if ($activationsCount >= config('settings.maxAttempts')) {
                Log::info('Exceded max resends in last '.config('settings.timePeriod').' hours. '.$currentRoute.'. ', [$user]);

                $data = [
                    'email' => $user->email,
                    'hours' => config('settings.timePeriod'),
                ];

                return view('auth.exceeded')->with($data);
            }

            $sendEmail = $this->initiateEmailActivation($user);

            Log::info('Activation resent to registered user. '.$currentRoute.'. ', [$user]);

            return redirect()->route(self::getActivationRoute())
                ->with('status', 'success')
                ->with('message', trans('auth.activationSent'));
        }

        Log::info('Activated user attempte to navigate to '.$currentRoute.'. ', [$user]);

        return $this->activeRedirect($user, $currentRoute)
            ->with('status', 'info')
            ->with('message', trans('auth.alreadyActivated'));
    }

    /**
     * Check if use is already activated.
     *
     * @return Redirect
     */
    public function exceeded()
    {
        $user = Auth::user();
        $currentRoute = Route::currentRouteName();
        $timePeriod = config('settings.timePeriod');
        $lastActivation = Activation::where('user_id', $user->id)->get()->last();
        $activationsCount = Activation::where('user_id', $user->id)
            ->where('created_at', '>=', Carbon::now()->subHours($timePeriod))
            ->count();

        if ($activationsCount >= config('settings.maxAttempts')) {
            Log::info('Locked non-activated user attempted to visit '.$currentRoute.'. ', [$user]);

            $data = [
                'hours'    => config('settings.timePeriod'),
                'email'    => $user->email,
                'lastDate' => $lastActivation->created_at->format('m/d/Y'),
            ];

            return view('auth.exceeded')->with($data);
        }

        return $this->activeRedirect($user, $currentRoute)
            ->with('status', 'info')
            ->with('message', trans('auth.alreadyActivated'));
    }
}