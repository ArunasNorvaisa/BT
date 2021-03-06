@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <tr>
                            <td>DriverId</td>
                            <td>Vardas</td>
                            <td>Miestas</td>
                        </tr>

                        @foreach ($drivers as $driver)
                        <tr>
                            <td>
                                <a href="{{  route('drivers.show', ['driverId' => $driver->driverId])  }}">
                                 {{ $driver->driverId }}
                             </a>
                            </td>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->city }}</td>
                        </tr>
                        @endforeach
                    </table>
                        <div class='row'>
                        <a href="{{  route('drivers.create')  }}">
                        <button>Įrašyti</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
