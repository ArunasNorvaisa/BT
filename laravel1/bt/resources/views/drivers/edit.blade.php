@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action ="{{  route('drivers.update', ['driverId' => $driver->driverId])  }}" method="POST">
                        @method('PUT')
                        {{  csrf_field()  }}
                        <label>Vardas/Pavardė</label>
                        <input type="text" name="name" value="{{  $driver->name  }}"> <br>
                        <label>Miestas</label>
                        <input type="text" name="city" value="{{  $driver->city  }}">
                        <button type="submit">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
