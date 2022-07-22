<style>
  h1{
    border-top: 1px solid rgb(0,0,0,1);
  }
</style>

{{--<h1>Transaction Model</h1>--}}
{{--@foreach($transactions as $transaction)--}}
{{--  <h3>{{ $transaction->id }}</h3>--}}
{{--  <p>{{ $transaction->price * $transaction->quantity }}</p>--}}
{{--  <p>{{ $transaction->book->name }}</p>--}}
{{--  <p>--}}
{{--    {{ $transaction->receipt->date }} ---}}
{{--    {{ $transaction->receipt->user->name }} ---}}
{{--    {{ $transaction->receipt->user->role->name }}--}}
{{--  </p>--}}
{{--@endforeach--}}

{{--<h1>Receipt Model</h1>--}}
{{--@foreach($receipts as $receipt)--}}
{{--  <h3>{{ $receipt->date }}</h3>--}}
{{--  <p>{{ $receipt->user->name }}</p>--}}
{{--  <ul>--}}
{{--    @foreach($receipt->transactions as $transaction)--}}
{{--      <li>{{ $transaction->price * $transaction->quantity }}</li>--}}
{{--    @endforeach--}}
{{--  </ul>--}}
{{--@endforeach--}}

{{--<h1>Role Model</h1>--}}
{{--@foreach($roles as $role)--}}
{{--  <h3>{{ $role->name }}</h3>--}}
{{--  <ul>--}}
{{--    @foreach($role->users as $user)--}}
{{--      <li>{{ $user->name }}</li>--}}
{{--    @endforeach--}}
{{--  </ul>--}}
{{--@endforeach--}}

{{--<h1>User Model</h1>--}}
{{--@foreach($users as $userOne)--}}
{{--  <h3>{{ $userOne->name }}</h3>--}}
{{--  <p>{{ $userOne->email }}</p>--}}
{{--  <p>{{ $userOne->role->name }}</p>--}}
{{--  <ul>--}}
{{--    @foreach($userOne->receipts as $receipt)--}}
{{--      <li>{{ $receipt->date }}</li>--}}
{{--    @endforeach--}}
{{--  </ul>--}}
{{--@endforeach--}}

<h1>Genre Model</h1>
@foreach($genres as $genre)
  <h3>{{ $genre->name }}</h3>
  <ul>
    @foreach($genre->books as $book)
      <li>{{ $book->name }}</li>
    @endforeach
  </ul>
@endforeach

<h1>Book Model</h1>
@foreach($books as $book)
  <h3>{{ $book->name }} , Author {{ $book->author }}</h3>
  <ul>
    @foreach($book->genres as $genre)
      <li>{{ $genre->name }}</li>
    @endforeach
  </ul>
@endforeach
