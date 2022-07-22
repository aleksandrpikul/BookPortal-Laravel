<style>
  h1 {
    border-top: 1px solid rgb(0, 0, 0, 1);
  }
</style>

<h1>Receipt Model</h1>
<h3>{{ $receipt->date }}</h3>
<p>{{ $receipt->user }}</p>
<ul>
  @foreach($receipt->transactions as $transaction)
    <li>{{ $transaction->price * $transaction->quantity }}</li>
  @endforeach
</ul>
