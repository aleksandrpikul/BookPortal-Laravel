@extends('layouts.main')

@section('content')

    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <form action="/genre/{{ $genre->id }}/admin" method="POST">
                            @csrf
                            <h3>О жанре</h3>
                            <div class="row mb-3">
                                <label class="col-sm-6 col-form-label">Название</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="{{ $genre->name }}" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark col-sm-4">Обновить</button>
                        </form>
                        <h3 class="mt-3">Список книг</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Название</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($books)
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->name }}</td>
                                            <td>
                                                <a href="/book/{{ $book->id }}/admin" class="btn btn-info">Описание</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
