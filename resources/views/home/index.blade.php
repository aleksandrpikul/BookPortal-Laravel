@extends('layouts.main')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-11 my-5">
        <form action="/" class="d-flex justify-content-between mb-3">
          <label class="col me-3">
            <input type="text" class="form-control" name="search" placeholder="Поиск по названию книги">
          </label>
          <button type="submit" class="btn btn-dark">Поиск</button>
        </form>

        <div class="d-flex justify-content-between mt-3">
          @foreach ($books as $book)
            <div class="card col-md-2 navbar navbar navbar-light" style="background-color: #E0E0E0;">
              <div class="card-body d-flex flex-column">
                <img src="/books/{{ $book->cover }}" class="card-img-top" alt="{{ $book->name }}">
                <h5 class="card-title fw-bold mt-1" style="min-height: 3rem;">{{ $book->name }}</h5>
                <p class="card-text mb-0">Автор: {{ $book->author }}</p>
                <p class="card-text">руб. {{ $book->price }}</p>
                <a href="/book/{{ $book->id }}{{ $prefix }}" class="btn btn-dark mt-auto">
                  <i class="bi-info-circle-fill"></i>
                  Детали
                </a>
              </div>
            </div>
          @endforeach
        </div>

        <nav>
          <ul class="pagination justify-content-center mt-3">
            {{ $books->links() }}
          </ul>
        </nav>
      </div>
    </div>
  </div>
@endsection
