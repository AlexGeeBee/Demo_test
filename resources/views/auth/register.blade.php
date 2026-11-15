@extends('base')

@section('title', 'Регистрация')

@section('content')

<x-bf::form class="main_form d-flex flex-column col-5 mx-auto mt-5" url="/register" method="post">
    <h1 class="text-center">Регистрация</h1>

    <x-bf::text name="login" label="Логин" />
    <x-bf::password name="password" label="Пароль" />
    <x-bf::text name="name" label="ФИО" />
    <x-bf::tel name="phone" label="Телефон" />
    <x-bf::email name="email" label="Эл. почта" />

    <x-bf::submit>Зарегистрироваться</x-bf::submit>
</x-bf::form>

@endsection