@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action ="{{  route('radars.store')  }}" method="POST">
                        {{  csrf_field()  }}
                        <label>Data</label>
                        <input type="date" name="date"> <br>
                        <label>Numeris</label>
                        <input type="text" name="number"> <br>
                        <label>Atstumas</label>
                        <input type="text" name="distance"> <br>
                        <label>Laikas</label>
                        <input type="text" name="time">
                        <button type="submit">Įrašyti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
