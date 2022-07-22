@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <form action="/login" method="POST" class="card shadow p-3">
                    @csrf
                    <div class="card-body">
                        <h2 class="mb-3">Войти</h2>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi-envelope"></i></span>
                            <input type="email" class="email form-control" name="email" value="{{ Cookie::get('email') }}"
                                placeholder="Email" required>
                        </div>
                        <div class="input-group mb-1">
                            <span class="input-group-text"><i class="bi-lock"></i></span>
                            <input type="password" class="password form-control" name="password"
                                value="{{ Cookie::get('password') }}" id="password" placeholder="Пароль" required>
                        </div>

                        <div class="form-group form-check mb-3" onclick="showPassword()">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Показать пароль</label>
                        </div>

                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember_me"
                                    {{ Cookie::get('remember_me') ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    Запомнить
                                </label>
                            </div>
                        </div>
                        <button class="login_btn btn btn-dark form-control mb-3">
                            <i class="bi-box-arrow-in-right me-1"></i>
                            Войти
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        const x = document.getElementById('password');
        const checkPassword = document.getElementById('exampleCheck1');
        const showPassword = () => {
            console.log('Show Password');
            if (checkPassword.checked === true)
                x.type = 'text'
            else
                x.type = 'password';
        }
        $(document).ready(() => {
            console.log("On Load");

        });
    </script>


@endsection
