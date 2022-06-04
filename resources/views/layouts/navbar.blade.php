<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a class="navbar-brand" href="{{route('getHome')}}"><i class="uil uil-store"></i>MEIYING STORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('getHome')}}"><i class="uil uil-home me-1"></i>HOME</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getRegister')}}"><i class="uil uil-user-plus me-1"></i>REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('getLogin')}}"><i class="uil uil-sign-in-alt"></i>LOGIN</a>
                    </li>
                @else
                    @if (Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('getManage')}}">
                                <i class="uil uil-folder"></i>
                                MANAGE ITEM
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('manageTransaction')}}">
                                <i class="uil uil-shopping-cart"></i>
                                MANAGE ORDER
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('getFaktur')}}">
                                <i class="uil uil-shopping-cart"></i>
                                BASKET
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-user me-1"></i>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                                    <i class="uil uil-sign-out-alt"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
