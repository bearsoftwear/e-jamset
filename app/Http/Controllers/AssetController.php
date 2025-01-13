<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Get data assets by lander_id.
         * Get data transaction by asset_id.
         * Get profit by (finish_date - start_date) * rental_price in 1 year.
         * Count asset need approval.
         */

        $transactions = Transaction::where('approval', 'wait')->withWhereHas('asset', function($query){
            $query->where('lander_id', Auth::id());
        } )->get();
        $approval = $transactions->count();
        return view('dashboard', compact('transactions', 'approval'));
        // todo table lander show asset and transaction provit in 1 year, profit = (finish_date - start_date) * rental_price, diffindays wrong
}
    /**
     * Find assets by lander_id.
     */
    public function findByLanderId($landerId)
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        //
    }
}
