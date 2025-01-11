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
        $landerAssets = Lander::with('assets')->find(Auth::id());
        // return $landerAssets;
        return view('dashboard', compact('landerAssets'));
        // todo error
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
