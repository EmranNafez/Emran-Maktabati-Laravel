@extends('layouts.app')

@section('content')
<h1>تسجيل جديد</h1>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <label>الاسم:</label><br>
    <input type="text" name="name" required><br><br>

    <label>البريد الإلكتروني:</label><br>
    <input type="email" name="email" required><br><br>

    <label>كلمة المرور:</label><br>
    <input type="password" name="password" required><br><br>

    <label>تأكيد كلمة المرور:</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">تسجيل</button>
</form>

@if($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif
@endsection
