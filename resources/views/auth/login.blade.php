@extends('layouts.app')

@section('content')
<h1 class="text-center mt-10">Login</h1>
<form method="POST" action="{{ route('login') }}" class="max-w-md mx-auto mt-6">
    @csrf
    <input type="email" name="email" placeholder="Email" class="w-full p-2 mb-2 border" required>
    <input type="password" name="password" placeholder="Password" class="w-full p-2 mb-2 border" required>
    <button type="submit" class="bg-blue-500 text-white p-2 w-full">Ingresar</button>
</form>
@endsection

