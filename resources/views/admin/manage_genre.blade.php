@extends('layouts.main')

@section('content')

  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/admin/genre" method="POST">
          @csrf
          <div class="card">
            <div class="card-body">
              <h3>Добавить жанр</h3>
              <div class="row mb-3">
                <label class="col-sm-6 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" required>
                </div>
              </div>
              <button type="submit" class="btn btn-dark col-sm-4">Добавить</button>
            </div>
          </div>
        </form>
        <table class="table">
          <thead>
          <tr>
            <th scope="col">Название</th>
            <th scope="col">Действие</th>
          </tr>
          </thead>
          <tbody>
          @if ($genres)
            @foreach ($genres as $genre)
              <tr>
                <td>{{ $genre->name }}</td>
                <td>
                  <div class="d-grid gap-2 d-md-block">
                    <a href="/genre/{{ $genre->id }}/admin" class="btn btn-dark">Детали</a>
                    <form action="/genre/{{ $genre->id }}/admin" method="POST" class="d-inline-block">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Удалить</button>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
