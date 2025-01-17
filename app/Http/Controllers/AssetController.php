<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Contracts\Database\Eloquent\Builder;
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
        $assets = Asset::withCount([
            'transactions as finished' => function (Builder $query) {
                $query->whereNotNull('finish_date');
            },
            'transactions as waiting' => function (Builder $query) {
                $query->where('approval', '=', 'wait');
            },
        ])->where('lander_id', Auth::id())->get();

        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'rental_price' => 'required',
            'image' => 'required',
        ]);

        Asset::create([
            'lander_id' => Auth::id(),
            'name' => $request->name,
            'location' => $request->location,
            'rental_price' => $request->rental_price,
            'image' => $request->image,
        ]);

        return redirect(route('assets.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        // $asset->with('transactions')->get();
        return view('asset.show', compact('asset'));
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
