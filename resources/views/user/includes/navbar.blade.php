<div class="container-fluid nav-bar p-0">
    <div class="container-lg p-0">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark ">
            <a href="{{route('dashboard-user')}}" class="navbar-brand">
                <img src="{{asset('img/'.$tp->logo_perusahaan)}}" width="100px" alt="">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('data-attorney')}}" class="nav-item nav-link {{ $menu === "data-attorney" ? 'active' : '' }} ">Our Attorney</a>
                    <!-- <a href="#about" class="nav-item nav-link">About</a> -->
                    <a href="{{route('data-artikel-user')}}" class="nav-item nav-link {{ $menu === "data-artikel" ? 'active' : '' }}">Articles</a>
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            News & articles
                        </a>
                        <div class="dropdown-menu rounded" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">News</a>
                            <a class="dropdown-item" href="#">Articles</a>
                        </div>
                    </li> -->
                    <a href="{{route('data-contact-us')}}" class="nav-item nav-link {{ $menu === "data-contact-us" ? 'active' : '' }}">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>