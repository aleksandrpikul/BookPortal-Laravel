@extends('layouts.main')

@section('content')

    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="{{route('update_password')}}" id="" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h3>Изменить пароль</h3>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Старый пароль</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="********" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Новый пароль</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="********" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Подтвердите пароль</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="********" required>
                                </div>
                            </div>
                            <div class="d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
