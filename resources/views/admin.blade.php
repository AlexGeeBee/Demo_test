@extends('base')

@section('title', 'Все заявки')

@section('content')
    <h1 class="mt-5">Все заявки</h1>

    <div class="apps d-flex gap-4 flex-wrap mt-5">
        
        @foreach ($applications as $app)
            
            <div class="d-flex flex-column pb-4">
                <p><i>ID заявки: {{ $app->id }}</i></p>
                <p><b>Курс: </b>{{ $app->course }}</p>
                <p><b>Пользователь: </b>{{ $app->user->name }}</p>
                <p><b>Начало обучения: </b>{{ $app->start_date }}</p>
                <p><b>Способ оплаты: </b>{{ $app->paymentMethod->name }}</p>
                <p class="mt-auto"><b>Статус: </b>{{ $app->status->name }}</p>

                <x-bf::form class="d-flex flex-column" url="/applications/update/{{ $app->id }}" method="patch">
                    <x-bf::select name="status" label="Изменить статус:" :choices="$statuses" :selected="$app->status_id" />
                    <x-bf::submit>Изменить</x-bf::submit>
                </x-bf::form>
            </div>

        @endforeach
    </div>

@endsection