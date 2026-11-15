@extends('base')

@section('title', 'Мои заявки')

@section('content')
    <h1 class="mt-5">Мои заявки</h1>

    <div class="apps d-flex gap-4 flex-wrap mt-5">
        
        @foreach ($applications as $app)
            
            <div>
                <p><i>Заявка №{{ $loop->iteration }}</i></p>
                <p><b>Курс: </b>{{ $app->course }}</p>
                <p><b>Начало обучения: </b>{{ $app->start_date }}</p>
                <p><b>Статус: </b>{{ $app->status->name }}</p>
                <p><b>Способ оплаты: </b>{{ $app->paymentMethod->name }}</p>
            </div>

        @endforeach
    </div>

@endsection