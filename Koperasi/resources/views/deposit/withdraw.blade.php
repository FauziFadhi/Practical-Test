@extends('layout')

@section('content')
<h2>Withdraw</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" action="{{ action('TransactionController@withdraw') }}">
<div class="form-group">
        {{csrf_field()}}
    <label>Anggota</label>
    <select name="user_id" class="form-control">
        <option value="test" disabled selected>Select Member</option>
        @foreach ($users as $user)
        <option value="{{ $user->id }}">{{$user->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="nominal">Nominal to Deposit</label>
    <input type="number" class="form-control" name="nominal">
</div>
<button class="btn btn-success" type="submit">Deposit</button>
<button class="btn btn-danger" type="reset">Reset</button>
</form>
    @endsection