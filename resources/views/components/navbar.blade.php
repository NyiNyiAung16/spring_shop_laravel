@props(['boolean'=> 'false','products'])

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <h3 class="ms-4 text-warning"><span class="text-primary">SPRING</span> SHOP</h3>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarToggle">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-end ps-3" id="navbarToggle">
        <ul class="navbar-nav">
            <li class="nav-item activer">
                <a href="/" class="nav-link ">Home</a>
            </li>
            <li class="nav-item">
                <a href="/about" class="nav-link ">About</a>
            </li>
            <li class="nav-item">
                <a href="/contact" class="nav-link ">Contact</a>
            </li>
            @if (!auth()->check())
                <li class="nav-item">
                    <a href="/register" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="/login" class="nav-link">Login</a>
                </li>  
            @endif
            @if ($boolean)
                <li class="nav-item">
                    <form action="/user/{{ auth()->id() }}/addToCartProducts">
                        <button class="position-relative bg-transparent border-0 nav-link">
                            <i class="fa-solid fa-shopping-cart fs-5 text-light" style="cursor: pointer"></i>
                            <span class="badge bg-danger top-0 translate-middle">{{ $products->count() }}</span>
                        </button>
                    </form>
                </li>
            @endif
            @auth
                <li class="nav-item me-2" style="position: relative">
                    <x-profile :user="auth()->user()"></x-profile>
                </li>
                <div class="slideBar px-2 py-3" id="slideBar">
                    <i class="fa-solid fa-xmark fs-3 py-2 float-end mark" style="cursor: pointer" onclick="closeSlideBar()"></i>
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{'/'.auth()->user()->image}}" class="profileImg" alt="profileImg">
                        <span class="text-white">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="mt-4">
                        <x-changeProfilePhoto :user="auth()->user()"></x-changeProfilePhoto>
                    </div>
                    <div class="mt-4">
                        <x-changeProfileName :user="auth()->user()"></x-changeProfileName>
                    </div>
                </div>                
            @endauth
        </ul>
    </div>
</nav>
