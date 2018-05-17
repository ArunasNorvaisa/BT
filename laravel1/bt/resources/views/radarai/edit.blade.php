@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action ="{{  route('radars.update', ['id' => $radar->id])  }}" method="POST">
                        @method('PUT')
                        {{  csrf_field()  }}
                        <label>Data</label>
                        <input type="date" name="date" value="{{  $radar->date  }}"> <br>
                        <label>Numeris</label>
                        <input type="text" name="number" value="{{  $radar->number  }}"> <br>
                        <label>Atstumas</label>
                        <input type="text" name="distance" value="{{  $radar->distance  }}"> <br>
                        <label>Laikas</label>
                        <input type="text" name="time" value="{{  $radar->time  }}">
                        <button type="submit">Atnaujinti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
