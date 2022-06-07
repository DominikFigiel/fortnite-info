
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h2>Wyróżnione przedmioty:</h1>
            @foreach ($featured as $item)
            @if (head($item['items'])['images']['featured'])
                <div class="card col-md-2">
                    <img class="card-img-top" src="{{ head($item['items'])['images']['featured'] }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ head($item['items'])['name'] }}</h5>
                    <p class="card-text">{{ head($item['items'])['description'] }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Zwykła cena: {{ $item['regularPrice'] }}</li>
                    <li class="list-group-item">Aktualna cena: {{ $item['finalPrice'] }}</li>
                    <li class="list-group-item">Rzadkość: {{ head($item['items'])['rarity']['displayValue'] }}</li>
                    <li class="list-group-item">Ostatnio w sklepie: {{ last($item['items'][0]['shopHistory']) }}</li>
                    </ul>
                    <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            @endif
            @endforeach

            <h2>Dzisiejszy sklep:</h1>
            @foreach ($daily as $item)
            @if (head($item['items'])['images']['featured'])
                <div class="card col-md-2">
                    <img class="card-img-top bg-secondary" src="{{ head($item['items'])['images']['featured'] }}" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">{{ head($item['items'])['name'] }}</h5>
                    <p class="card-text">{{ head($item['items'])['description'] }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Zwykła cena: {{ $item['regularPrice'] }}</li>
                    <li class="list-group-item">Aktualna cena: {{ $item['finalPrice'] }}</li>
                    <li class="list-group-item">Rzadkość: {{ head($item['items'])['rarity']['displayValue'] }}</li>
                    <li class="list-group-item">Ostatnio w sklepie: {{ last($item['items'][0]['shopHistory']) }}</li>
                    </ul>
                    <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            @endif
            @endforeach

        </div>
    </div>
</div>
@endsection




