@extends('layouts.main')

@section('content')
    <div class="container my-5 flex-fill">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <?php $grandtotal = 0; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Автор</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Всего</th>
                            <th scope="col">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($items)
                            @foreach ($items as $item)
                                <?php $grandtotal += (int)$item->subtotal; ?>
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>руб. {{ $item->price }}</td>
                                    <td>{{ $item->quantity }} <?= $item->quantity > 1 ? 's' : '' ?></td>
                                    <td>IDR {{ $item->subtotal }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a href="/book/{{ $item->id }}" class="btn btn-dark">Описание</a>
                                            <a href="/book/{{ $item->id }}" class="btn btn-dark">Изменить</a>
                                            <form action="/cart/r/{{ $item->id }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Удалить</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <h6 class="mb-3">Итого: руб. <?= $grandtotal; ?></h6>
                @if ($items)
                    <form action="/checkout" method="POST">
                        @csrf
                        <button class="btn btn-dark" type="submit">Проверить</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
