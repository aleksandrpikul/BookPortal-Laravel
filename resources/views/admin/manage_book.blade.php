@extends('layouts.main')

@section('content')
  <style>
    span {
      color: red;
    }
  </style>
  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/admin/book" method="POST"
              enctype="multipart/form-data" onsubmit="convertGenreArr()">
          @csrf
          <div class="card">
            <div class="card-body">
              <h3>Информация о книге</h3>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name">
                  <span>{{ $errors->first('name') }}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Автор</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="author">
                  <span>{{ $errors->first('author') }}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Синопсис</label>
                <div class="col-sm-6">
                  <textarea type="text" class="form-control" name="synopsis"></textarea>
                  <span>{{ $errors->first('synopsis') }}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Жанр</label>
                <div class="col-sm-4">
                  @foreach($genres as $genre)
                    <div class="form-group form-check" onclick="checkGenres({{ $genre->id }})">
                      <input class="form-check-input" type="checkbox"
                             value="{{ $genre->id }}" id="check{{ $genre->id }}">

                      <label class="form-check-label">
                        {{ $genre->name }}
                      </label>
                    </div>
                  @endforeach
                  <span>{{ $errors->first('genres') }}</span>
                </div>
              </div>

{{--Genre Input--}}
              <input value="" type="text" id="genres" class="form-control" name="genres" hidden>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Цена</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control" name="price">
                  <span>{{ $errors->first('price') }}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Обложка</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="cover">
                  <span>{{ $errors->first('cover') }}</span>
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
            <th scope="col">Автор</th>
            <th scope="col">Синопсис</th>
            <th scope="col">Жанр</th>
            <th scope="col">Цена</th>
            <th scope="col">Действие</th>
          </tr>
          </thead>
          <tbody>
          @foreach( $books as $book )
            <tr>
              <td>{{ $book->name }}</td>
              <td>{{ $book->author }}</td>
              <td>{{ $book->synopsis }}</td>
              <td>
                @foreach( $book->genres as $genre)
                  {{ $genre->name }}
                @endforeach
              </td>
              <td>руб. {{ $book->price }}</td>
              <td>
                <div class="d-grid gap-2 d-md-block">
                  <a href="/book/{{ $book->id }}/admin" class="btn btn-dark">Детали</a>
                  <form action="/book/{{ $book->id }}/admin" method="POST" class="d-inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Удалить</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>

  <script>
      const genreInput = document.getElementById('genres');
      let genreArr = [];
      const checkGenres = (idGenre) => {
          const check = document.getElementById('check' + idGenre);
          if (genreArr.includes(idGenre) === false) {
              genreArr.push(idGenre);
              check.checked = true;
          } else {
              genreArr = arrayRemove(genreArr, idGenre);
              check.checked = false;
          }

          console.log(genreArr);
      }
      const convertGenreArr = () => {
          genreInput.value = genreArr.join('_');
      }
      const arrayRemove = (arr, value) => {
          return arr.filter((loop) => {
              return loop !== value;
          });
      }
  </script>

@endsection
