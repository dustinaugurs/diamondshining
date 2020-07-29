 <!--================Header Menu Area =================-->
 <header class="main_menu_area">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
             @if(settings()->logo)
            <a href="{{ route('frontend.index') }}" class="logo"><img  class="navbar-brand" src="{{url('img/logo.png')}}"></a>
            @else
             {{ link_to_route('frontend.index',app_name(), [], ['class' => 'navbar-brand']) }}
            @endif
            </div><!--navbar-header-->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 
                    <ul class=" navbar-nav navbar-right">

                    <li class="nav-item">{{ link_to_route('frontend.pages.show', trans('navs.frontend.about_us'), ['slug' =>'about-us']) }}</li>
                        @if ($logged_in_user)
                            <!-- <li class="nav-item">{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li> -->
                        @endif
                        <li class="nav-item">{{ link_to_route('frontend.contact-us', trans('navs.frontend.contact_us')) }}</li>
                        @if (! $logged_in_user)
                            <li class="nav-item">{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                            @if (config('access.users.registration'))
                                <li class="nav-item">{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                            @endif
                        @else
                            <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $logged_in_user->name }} <span class="caret"></span>
                                </a>

                                <ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @permission('view-backend')
                                        <li class="nav-item">{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                                    @endauth

                                    <li class="nav-item">{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                                    <li class="nav-item">{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                                </ul>
                            </li>
    @endif
</ul>
                </div>
            </nav>
        </header>
        <!--================End Header Menu Area =================-->
