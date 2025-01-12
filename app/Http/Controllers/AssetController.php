<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Lander;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function welcome()
    {
        $assets = Asset::with('lander')->paginate(5);
        return view('welcome', compact('assets'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $assets = Asset::where('lander_id', Auth::id())
        //            ->whereHas('transaction', function ($query) {
        //            $query->where('approval', 'wait');
        //            })
        //            ->with('transaction')
        //            ->paginate(5);
        $assets = Asset::where('lander_id', Auth::id())->with('transaction')->paginate(5);
        // return $assets;
        return view('dashboard', compact('assets'));
        // todo table lander show asset and transaction provit in 1 year
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
