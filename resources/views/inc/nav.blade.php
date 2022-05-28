<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <i class="fa-solid fa-rocket" style="font-size: 32px"></i>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{route('posts.index')}}" class="nav-link px-2 link-secondary">Posts</a></li>
                <li><a href="{{route('admin.login')}}" class="nav-link px-2 link-dark">Admin</a></li>
            </ul>


            @if(auth('web'))
                <div class="dropdown text-end ms-3">

                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                       data-bs-toggle="dropdown" aria-expanded="false">

                        <i class="fa-solid fa-user-astronaut" style="font-size: 32px"></i>
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item" href="{{route('posts.index')}}">Posts</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="{{ url('/logout') }}" class="dropdown-item"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @else
                        <div class="col-md-3 text-end">
                            <a href="{{ url('/login') }}" type="button" class="btn btn-outline-primary me-2">Login</a>
                            <a href="{{ url('/register') }}" type="button" class="btn btn-primary">Sign-up</a>
                    @endif
                </div>
        </div>
    </div>
</header>
@show
