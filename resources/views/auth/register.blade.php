@extends('layouts.main')

@section('content')
    <style>
        span {
            color: red;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <form action="/register" method="POST" class="card shadow p-3">
                    @csrf
                    <div class="card-body">
                        <h2 class="mb-3">Регистрация</h2>
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="bi-envelope"></i></span>
                            <input type="text" class="email form-control" name="email" placeholder="Email">
                        </div>
                        <span>{{ $errors->first('email') }}</span>
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="bi-person"></i></span>
                            <input type="text" class="name form-control" name="name" placeholder="Имя">
                        </div>
                        <span>{{ $errors->first('name') }}</span>
                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="bi-lock"></i></span>
                            <input type="password" class="password form-control" name="password" placeholder="Пароль"
                                id="password">
                        </div>

                        <div class="input-group mt-3">
                            <span class="input-group-text"><i class="bi-lock"></i></span>
                            <input type="password" class="password_confirmation form-control" name="password_confirmation"
                                id="confirmPassword" placeholder="Подтверждение пароля">
                        </div>

                        @foreach ($errors->get('password') as $message)
                            <span>{{ $message }}<br></span>
                        @endforeach

                        <div class="form-group form-check mt-3" onclick="showPassword()">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Показать пароль</label>
                        </div>

                        <button class="register_btn btn btn-dark form-control mt-3">
                            <i class="bi-person-lines-fill me-1"></i>
                            Регистрация
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
        const x = document.getElementById("password");
        const y = document.getElementById("confirmPassword");
        const checkPassword = document.getElementById('exampleCheck1');
        const showPassword = () => {
            console.log('show password');
            if (checkPassword.checked === true) {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }
    </script>
@endsection
