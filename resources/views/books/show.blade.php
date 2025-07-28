@extends('layouts.app')

@section('content')
<h1>{{ $book->title }}</h1>
<p>المؤلف: {{ $book->author }}</p>
<p>السعر: {{ $book->price }} $</p>
<p>التصنيف: {{ $book->category->name ?? 'غير محدد' }}</p>
<p>الوصف: {{ $book->description }}</p>

<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->id }}">
    <label>الكمية:</label>
    <input type="number" name="quantity" value="1" min="1" required>
    <button type="submit">أضف إلى السلة</button>
</form>
@endsection
