<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transactions = Transaction::where('approval', 'wait')->with('borrower')->withWhereHas('asset', function (Builder $query) {

        $transactions = Transaction::with('borrower')
            ->withWhereHas('asset', function (Builder $query) {
                $query->where('lander_id', Auth::id());
            })->orderByDesc('approval')
            ->get();

        return view('dashboard', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        echo $request;
        return view('transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
