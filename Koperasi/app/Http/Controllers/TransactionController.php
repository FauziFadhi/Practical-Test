<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('name')->get();
        // return view('deposit.create', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('deposit.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "user_id" => "required|exists:users,id",
                "nominal" => "required|numeric"
            ],
            ["user_id.required" => "Member is required"]
        );

        $deposit = User::find($request->user_id)->deposit;
        
        if(!$deposit)
            $deposit = Deposit::create(["user_id" => $request->user_id]);
        
        $request['type'] = "deposit";
        $trans = $deposit->transactions()->create($request->all());

        $deposit->update(["nominal" => $deposit->nominal + $trans->nominal]);
        if ($deposit)
            return view('layout');
        $users = User::orderBy('name')->get();

        return back();
    }

    public function withdraw(Request $request)
    {

        $request->validate(
            [
                "user_id" => "required|exists:users,id",
            ],
            [
                "user_id.required" => "Member is required",
            ]
        );
        $deposit = User::find($request->user_id)->deposit;
        $interest = $deposit->interests()->sum('nominal');

        $request->validate([
            "nominal" => "required|numeric|max:".($deposit->nominal+$interest)
        ],[
            "nominal.max" => "Nominal is higher than your Deposit"
        ]);

        $request['nominal'] = -$request->nominal;
        $request['type'] = "withdraw";
        $withdraw = $deposit->transactions()->create($request->all());

        $deposit->update(['nominal' => $deposit->nominal + $request->nominal]);
        if ($withdraw)
            return view('layout');

        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
