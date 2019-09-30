@extends('layout')

@section('content')
<h2>Mutation</h2>
<table class="table table-striped table-bordered">
    <thead>
        <tr>

            <th>#</th>
            <th>Name</th>
            <th>Saldo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $key => $user)   
        <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->deposit->nominal}}</td>
        <td><a class="btn btn-info" href="{{ route('deposits.show', $user->deposit->id) }}">Mutation</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection