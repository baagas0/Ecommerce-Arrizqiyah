<footer class="section-footer position-relative" style="background-color:#cff0cc !important">
    <section class="footer py-5">
        <div class="container">
            <div class="row pb-3 ">
                <aside class="col-md-2 pb-6 mr-2">
                    <div class="footer-logo">
                        <img src="{{ asset('site/'.$site->vaficon) }}" alt="logo-small" class="logo-sm" width="50" height="41">
                        <img src="{{ asset('site/'.$site->logo) }}" alt="logo-small" class="logo-sm" width="120" height="35">
                    </div>
                </aside>
                <aside class="col-md">
                    <h6 class="title" style="color: #81db74">Page</h6>
                    <ul class="list-unstyled">
                        <li> <a href="{{ url('list') }}" class="text-body">Product List</a></li>
                        <li> <a href="{{ url('contact') }}" class="text-body">Contact</a></li>
                        <li> <a href="{{ url('blog') }}" class="text-body">Blog</a></li>
                        <li> <a href="{{ url('faq') }}" class="text-body">Faq</a></li>
                        <li> <a href="{{ url('member-area') }}" class="text-body">Member Area</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Help</h6>
                    <ul class="list-unstyled">
                        <li> <a href="{{ url('contact') }}" class="text-body">Contact Us</a></li>
                        <li> <a href="{{ url('faq') }}" class="text-body">Faq</a></li>
                        <li> <a href="{{ url('blog') }}" class="text-body">Blog</a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6 class="title">Account</h6>
                    <ul class="list-unstyled">
                        <li> <a href="{{ url('login') }}" class="text-body"> User Login </a></li>
                        <li> <a href="{{ url('register') }}" class="text-body"> User register </a></li>
                        <li> <a href="{{ url('member-area') }}" class="text-body"> Member Area </a></li>
                    </ul>
                </aside>
                <aside class="col-md">
                    <h6><i class="las la-coffee mr-2"></i>Stay Up-to-Date!</h6>
                    <form method="POST" action="{{ url('/subscription') }}">
                    {{ csrf_field()}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control bg-dark" placeholder="Subscribe" name="email" aria-label="Subscribe.." aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-white" type="submit" id="button-addon2">@</button>
                        </div>
                    </div>
                    </form>
                </aside>
                {{-- <aside class="col-md-5">
                    <h6><i class="las la-coffee mr-2"></i>Stay Up-to-Date!</h6>
                    <div class="input-group mb-3">
                        <form method="POST" action="{{ url('/subscription') }}">
                            {{ csrf_field()}}
                        <span><input type="text" class="form-control bg-dark" name="email" placeholder="Subscribe" aria-label="Subscribe.." aria-describedby="button-addon2"><button class="btn btn-primary text-white" type="submit" id="button-addon2">@</button></span>
                        
                        
                            
                        
                        </form>
                    </div>
                </aside> --}}
            </div>
            <!-- row.// -->
        </div>
        <!-- //container -->
    </section>
    <!-- footer-top.// -->

    <section class="footer-bottom border-top border-dark white pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="pr-2 text-body">© 2020 Arrizqiyah Shop</span>
                </div>
                <div class="col-md-6 text-md-right">
                    @foreach($payment as $payment)
                        <img class="mr-2" src="{{ asset('site/payment/'.$payment->image) }}" width="42">
                    @endforeach
                </div>
            </div>
            <!-- row.// -->
        </div>
        <!-- //container -->
    </section>
</footer>