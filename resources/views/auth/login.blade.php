@extends('layouts.app')

@section('content')
<h1>تسجيل الدخول</h1>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label>البريد الإلكتروني:</label><br>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus><br><br>

    <label>كلمة المرور:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">دخول</button>
</form>

@if ($errors->any())
    <div style="color:red;">
        {{ $errors->first() }}
    </div>
@endif
@endsection
