<header class="main-header">
    <a href="" class="logo"><span class="logo-lg">{{$_ENV['APP_NAME']}}</span></a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" id="push-menu"><span class="sr-only">Toggle navigation</span></a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i></a>
                        @include('layouts.userOptions')
                    </li>
                </ul>
            </div>
        </nav>
</header>