@extends('base')

@section('title', 'Новая заявка')

@section('content')

<x-bf::form class="main_form d-flex flex-column col-5 mx-auto mt-5" url="/applications/create" method="post">
    <h1 class="text-center">Новая заявка</h1>

    <x-bf::text name="course" label="Название курса" />
    <x-bf::date name="start_date" label="Дата начала обучения" />
    <x-bf::select name="payment_method" label="Способ оплаты" :choices="$payment_methods" placeholder="Выберите способ" />


    <x-bf::submit>Отправить</x-bf::submit>
</x-bf::form>
@endsection