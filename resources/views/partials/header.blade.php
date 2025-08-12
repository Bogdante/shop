<header>
    <div class="container-fluid bg-light py-2 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('home') }}" class="navbar-brand">
                    <img src="" height="30" alt="Логотип">
                </a>
                <span class="ml-3 d-none d-md-block">Москва, Кремль</span>
                <a href="tel:+74951234567" class="btn btn-link text-dark d-none d-md-block">
                    <i class="fas fa-phone-alt mr-1"></i> 8 800 555 35-35
                </a>
            </div>

            <div class="d-flex align-items-center">

                <a href="{{ route('home') }}" class="btn btn-outline-dark ml-3">
                    <i class="fas fa-shopping-cart"></i> Корзина
                    <span class="badge badge-dark">0</span>
                </a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">Главная</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="catalogDropdown"
                           role="button" data-toggle="dropdown">
                            Каталог
                        </a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('products', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('products') }}">Все товары</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">О нас</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
