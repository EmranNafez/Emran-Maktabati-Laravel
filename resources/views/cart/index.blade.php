@extends('layouts.app')

@section('content')
<h1>سلة الشراء</h1>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if($items->isEmpty())
    <p>السلة فارغة.</p>
@else
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
        <thead>
            <tr>
                <th>الكتاب</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($items as $item)
                @php
                    $subtotal = $item->quantity * $item->book->price;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item->book->title }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->book->price }} $</td>
                    <td>{{ $subtotal }} $</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align:right;"><strong>الإجمالي:</strong></td>
                <td><strong>{{ $total }} $</strong></td>
            </tr>
        </tbody>
    </table>
@endif
@endsection
