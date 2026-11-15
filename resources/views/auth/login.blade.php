@extends('base')

@section('title', 'Вход')

@section('content')

<x-bf::form class="main_form d-flex flex-column col-5 mx-auto mt-5" url="/login" method="post">
    <h1 class="text-center">Вход</h1>

    <x-bf::text name="login" label="Логин" />
    <x-bf::password name="password" label="Пароль" />

    <x-bf::submit>Войти</x-bf::submit>
</x-bf::form>
@endsection