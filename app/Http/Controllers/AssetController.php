<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Carbon\Carbon;
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
        ])->where('user_id', Auth::id())->get();

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
            'user_id' => Auth::id(),
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
        // star rating
        $asset = Asset::with(['transactions' => function ($query) {
            $query->where('approval', '=', 'accept');
        }])->starRating()->find($asset->id);

        // Calculate star rating
        $asset->reviewer = $asset->accept + $asset->deny;
        $asset->star_rating = $asset->reviewer > 0 ? round(($asset->accept / $asset->reviewer) * 5, 1) : 0;
        // star rating

        $events = [];
        $disableDates = [];
        foreach ($asset->transactions as $transaction) {
            $start = Carbon::parse($transaction->start_date);
            $finish = Carbon::parse($transaction->finish_date);

            // Disable dates
            $period = $start->daysUntil($finish);
            foreach ($period as $date) {
                $disableDates[] = $date->format('Y-m-d');
            }
            // Disable dates

            $events[] = [
                'title' => $transaction->event,
                'start' => $start->format('Y-m-d'),
                'end' => $finish->addDay()->format('Y-m-d'),
            ];
        }

        return view('asset.show', compact('asset', 'events', 'disableDates'));
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
