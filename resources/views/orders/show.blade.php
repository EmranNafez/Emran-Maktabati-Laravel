@if(auth()->check())
<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="book_id" value="{{ $book->id }}">
    <label>الكمية:</label>
    <input type="number" name="quantity" value="1" min="1" required>
    <button type="submit">أضف إلى السلة</button>
</form>
@else
<p><a href="{{ route('login') }}">سجل دخول</a> لتتمكن من إضافة كتب إلى السلة.</p>
@endif
