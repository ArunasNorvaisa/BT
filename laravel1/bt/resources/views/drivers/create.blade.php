@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action ="{{  route('drivers.store')  }}" method="POST">
                        {{  csrf_field()  }}
                        <label>Vardas/Pavardė</label>
                        <input type="text" name="name"> <br>
                        <label>Miestas</label>
                        <input type="text" name="city">
                        <button type="submit">Įrašyti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
