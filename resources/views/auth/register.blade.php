@extends('base')

@section('title', 'Регистрация')

@section('content')

<x-bf::form url="/register" method="post">
    <h1>Регистрация</h1>

    <x-bf::text name="login" label="Логин" />
    <x-bf::password name="password" label="Пароль" />
    <x-bf::text name="name" label="ФИО" />
    <x-bf::tel name="phone" label="Телефон" />
    <x-bf::email name="email" label="Эл. почта" />

    <x-bf::submit>Зарегистрироваться</x-bf::submit>
</x-bf::form>

@endsection