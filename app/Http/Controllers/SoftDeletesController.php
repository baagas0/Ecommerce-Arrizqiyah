<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Site;

class SoftDeletesController extends Controller
{
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
     * Get Soft Deleted User.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public static function getDeletedUser($id)
    {
        $user = User::onlyTrashed()->where('id', $id)->get();
        if (count($user) != 1) {
            return redirect('ip-admin/users/deleted/')->with('error', trans('usersmanagement.errorUserNotFound'));
        }

        return $user[0];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::onlyTrashed()->get();
        $roles = Role::all();
        $data['site'] = Site::find('1');

        return View('login.usersmanagement.show-deleted-users', compact('users', 'roles'),$data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = self::getDeletedUser($id);

        return view('login.usersmanagement.show-deleted-user')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = self::getDeletedUser($id);
        $user->restore();

        return redirect('ip-admin/users/')->with('success', trans('usersmanagement.successRestore'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = self::getDeletedUser($id);
        $user->forceDelete();

        return redirect('ip-admin/users/deleted/')->with('success', trans('usersmanagement.successDestroy'));
    }
}
