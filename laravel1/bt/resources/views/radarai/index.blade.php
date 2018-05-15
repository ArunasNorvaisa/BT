@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <td>Id</td>
                            <td>Data</td>
                            <td>Numeris</td>
                            <td>Atstumas</td>
                            <td>Laikas</td>
                            <td>Kada sukurtas</td>
                            <td>Greitis</td>
                        </tr>

                        @foreach ($radars as $radar)
                        <tr>
                            <td>{{ $radar->id }}</td>
                            <td>{{ $radar->date }}</td>
                            <td>{{ $radar->number }}</td>
                            <td>{{ $radar->distance }}</td>
                            <td>{{ $radar->time }}</td>
                            <td>{{ $radar->created_at }}</td>
                            <td>{{ $radar->getSpeed() }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
