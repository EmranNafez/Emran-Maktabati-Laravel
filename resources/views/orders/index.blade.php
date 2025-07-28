@extends('layouts.app')

@section('content')
<h1>الطلبات</h1>

@if($orders->isEmpty())
    <p>لا توجد طلبات حتى الآن.</p>
@else
    @foreach($orders as $order)
        <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
            <h3>طلب رقم #{{ $order->id }}</h3>
            <p>الحالة: {{ $order->status }}</p>
            <p>المجموع: {{ $order->total_price }} $</p>
            <h4>الكتب:</h4>
            <ul>
                @foreach($order->items as $item)
                    <li>{{ $item->book->title }} - الكمية: {{ $item->quantity }} - السعر: {{ $item->price }} $</li>
                @endforeach
            </ul>
        </div>
    @endforeach
@endif
@endsection
