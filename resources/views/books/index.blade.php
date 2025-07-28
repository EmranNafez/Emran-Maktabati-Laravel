@extends('layouts.app')

@section('content')
<h1>📚 قائمة الكتب</h1>
<div>
    @foreach($books as $book)
        <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
            <h3><a href="{{ route('books.show', $book->id) }}">{{ $book->title }}</a></h3>
            <p>المؤلف: {{ $book->author }}</p>
            <p>السعر: {{ $book->price }} $</p>
            <p>التصنيف: {{ $book->category->name ?? 'غير محدد' }}</p>
        </div>
    @endforeach
</div>
{{ $books->links() }}
@endsection
