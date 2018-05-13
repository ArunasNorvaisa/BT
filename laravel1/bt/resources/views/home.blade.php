@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table table-dark">
                            <tr>
                                <td>Vardas</td>
                                <td>el. paštas</td>
                                <td>kada sukurtas</td>
                            </tr>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </table>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
