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

        // $transactions = Transaction::where('approval', 'wait')
        //     ->with(['asset' => function ($query) {
        //         $query->where('lander_id', Auth::id());
        // }])->get();

        // $select = "SELECT * FROM assets LEFT JOIN transactions ON assets.id = transactions.asset_id WHERE transactions.approval = 'wait' and  assets.lander_id = " . Auth::id();
        // todo get asset need approval, transform to eloquent

        $assets = Asset::withWhereHas('transactions', function($query) {
            $query->where('approval', 'wait');
        })->where('lander_id', Auth::id())->toRawSql();

        // $select = Asset::leftJoin('transactions', 'assets.id', '=', 'transactions.asset_id')
        //     ->where('transactions.approval', 'wait')
        //     ->where('assets.lander_id', Auth::id())
        //     ->select('assets.*', 'transactions.*')
        //     ->toSql();

        // $transactions = Transaction::whereRelation('asset', 'lander_id', Auth::id())->toRawSql();

        // dd($select);

        // $assets = Asset::where('lander_id', Auth::id())
        //            ->whereHas('transaction', function ($query) {
        //            $query->where('approval', 'wait');
        //            })
        //            ->with('transaction')
        //            ->paginate(5);

        // $assets = Asset::where('lander_id', Auth::id())
        //     ->with(['transaction' => function ($query) {
        //     $query->where('approval', 'accept')
        //           ->whereYear('created_at', date('Y'));
        //     }])
        //     ->paginate(5);

        // $assets = Asset::with(['transaction' => function ($query) {
        //     $query->where('approval', 'accept')
        //       ->where('user_id', Auth::user()->id)
        //       ->whereNotNull('finish_date')
        //       ->whereYear('created_at', date('Y'));
        // }])->toRawSql();

        // dd($assets);

        // $assets->each(function ($asset) {
        //     $asset->profit = $asset->transaction->sum(function ($transaction) use ($asset) {
        //         $days = abs((int) $transaction->finish_date->diffInDays($transaction->start_date));
        //         return $days * $asset->rental_price;
        //     });
        // });

        // $assets = Asset::where('lander_id', Auth::id())->with('transaction')->paginate(5);
        // return $assets;
        return view('dashboard', compact('assets'));
        // todo table lander show asset and transaction provit in 1 year, profit = (finish_date - start_date) * rental_price, diffindays wrong
        // todo banner show asset need approval
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
