@extends('base')

@section('title', 'Вход')

@section('content')

<x-bf::form url="/login" method="post">
    <h1>Вход</h1>

    <x-bf::text name="login" label="Логин" />
    <x-bf::password name="password" label="Пароль" />

    <x-bf::submit>Войти</x-bf::submit>
</x-bf::form>
@endsection