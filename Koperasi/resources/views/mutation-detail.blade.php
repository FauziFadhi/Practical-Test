@extends('layout')

@section('content')
    <h2>Mutation Detail</h2>
    <div class="form-group">
        <label for="">Name</label>
    <span>{{$deposit->user->name}}</span>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <th>
                Date
            </th>
            <th>
                Nominal
            </th>
            <th>
                Saldo Akhir
            </th>
        </thead>
        <tbody>
            @foreach ($deposit->transactions()->orderBy('created_at','desc')->get() as $trans)
                <tr>
                <td>{{$trans->created_at}}</td>
                <td>{{$trans->nominal}}</td>
                <td>{{$trans->saldo}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group">
            <label>Bunga</label>
         <span>
             @php $bunga = 0; @endphp
            @if ($deposit->interests && $deposit->interests()->whereMonth('created_at',Carbon\Carbon::now()->month)->first())
                @php $bunga = $deposit->interests()->whereMonth('created_at',Carbon\Carbon::now()->month)->first()->nominal; @endphp
                {{$bunga}}
            @else
                0
            @endif
        </span>
         </div>
         <div class="form-group">
       <label>Total</label>
    <span>{{$deposit->nominal}}</span>
    </div>
@endsection