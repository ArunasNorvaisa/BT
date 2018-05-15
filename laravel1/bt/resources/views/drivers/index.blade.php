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
                            <td>{{ $driver->driverId }}</td>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->city }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
