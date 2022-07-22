<nav class="navbar navbar-expand-lg navbar-light">

  <div class="container-fluid">
    <a class="navbar-brand" href="/">Book Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- admin Navbar -->
      @if( auth()->user() !== null && auth()->user()['role']['id'] === 1 )
        <ul class="navbar-nav ms-auto">
          <div class="btn-group">
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownManage" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                Управление
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownManage">
                <li><a class="dropdown-item" href="/admin/book">Книги</a></li>
                <li><a class="dropdown-item" href="/admin/genre">Жанр</a></li>
                <li><a class="dropdown-item" href="/admin/user">Пользователь</a></li>
              </ul>
            </li>
          </div>
          <div class="btn-group">
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownAccount" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                 Привет, {{ auth()->user()['name'] }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                <li><a class="dropdown-item" href="/profile">Профиль</a></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Выйти</button>
                  </form>
                </li>
              </ul>
            </li>
          </div>
        </ul>
      @endif

    <!-- Member Navbar -->
      @if( auth()->user() !== null && auth()->user()['role']['id'] === 2)

        <ul class="navbar-nav ms-auto">
          <div class="btn-group">
            <li class="nav-item">
              <a class="nav-link active" href="/cart">Корзина</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/history">История покупок</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownAccount" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                Привет, {{ auth()->user()['name'] }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownAccount">
                <li><a class="dropdown-item" href="/profile">Профиль</a></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Выйти</button>
                  </form>
                </li>
              </ul>
            </li>
          </div>
        </ul>
    @endif

    <!-- Guest Navbar -->
    @if( auth()->user() === null )
        <ul class="navbar-nav ms-auto">
          <div class="btn-group">
            <li class="nav-item">
              <a class="nav-link active" href="/register">Зарегистрироваться</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/login">Войти</a>
            </li>
          </div>
        </ul>
    @endif

    </div>
  </div>
</nav>
