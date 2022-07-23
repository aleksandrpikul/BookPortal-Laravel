@extends('layouts.main')

@section('content')

  {{--ADMIN--}}

  <style>
    span {
      color: red;
    }
  </style>
  <div class="container my-5 flex-fill">
    <div class="row justify-content-center">
      <div class="col-md-11">
        <form action="/book/{{ $book->id }}/admin" method="POST"
              enctype="multipart/form-data" onsubmit="convertGenreArr()">
          @csrf
          <div class="card">
            <div class="card-body">
              <h3>{{ $book->name }}'s Описание</h3>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Название</label>
                <div class="col-sm-6">
                  <input value="{{ $book->name }}" type="text" class="form-control" name="name">
                  <span>{{ $errors->first('name') }}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Автор</label>
                <div class="col-sm-6">
                  <input value="{{ $book->author }}" type="text" class="form-control" name="author">
                  <span>{{ $errors->first('author') }}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Синопсис</label>
                <div class="col-sm-6">
                  <textarea type="text" class="form-control" name="synopsis">{{ $book->synopsis }}</textarea>
                  <span>{{ $errors->first('synopsis') }}</span>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Жанр</label>
                <div class="col-sm-4">
                  @foreach($genres as $genre)
                    <div class="form-group form-check" onclick="checkGenres({{ $genre->id }})">
                      <input class="form-check-input" type="checkbox" name="genres"
                             value="{{ $genre->id }}" id="check{{ $genre->id }}"
                      @foreach ($book->genres as $bookGenre)
                        {{ $genre->name === $bookGenre->name ? 'checked' : '' }}
                      @endforeach
                      >
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
                  <input value="{{ $book->price }}" type="number" class="form-control" name="price">
                  <span>{{ $errors->first('price') }}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Старая обложка</label>
                <div class="col-sm-6">
                  <img class="img-fluid mb-3" src="/books/{{ $book->cover }}" alt="Обложка">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-5 col-form-label">Новая обложка</label>
                <div class="col-sm-6">
                  <input type="file" class="form-control" name="cover">
                  <span>{{ $errors->first('cover') }}</span>
                </div>
              </div>
              {{-- Hidden Input--}}
              <input value="{{ $book->cover }}" name="oldCover" hidden>
              <button type="submit" class="btn btn-dark col-sm-4">Обновление</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
      console.log(@json($book->genres));
      const genreInput = document.getElementById('genres');
      let genreArr = [];
      window.onload = () => {
          (@json($book->genres)).forEach(genre => {
              genreArr.push(genre['id']);
          });
      }
      console.log(genreArr);
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
