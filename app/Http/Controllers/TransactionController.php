<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $term = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->finish_date)->addDay());
        $date = Carbon::parse($request->start_date)->format('d F Y').' to '.Carbon::parse($request->finish_date)->format('d F Y');
        $date = $term > 1 ? $date : Carbon::parse($request->start_date)->format('d F Y');
        $rental_price = (int) Asset::where('id', $request->asset_id)->implode('rental_price'); // Asset::find($request->id)->get('rental_price');  //
        $total_price = $term * $rental_price;

        $transaction = [
            'asset_id' => $request->asset_id,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'date' => $date,
            'term' => $term,
            'rental_price' => $rental_price,
            'total_price' => $total_price,
        ];

        return view('transaction.create', compact('transaction'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event' => 'required',
            'booking_code' => 'required|unique:transactions',
            //'NIK' => 'required|digits:14',
            // 'name' => 'required',
            'asset_id' => 'required|exists:assets,id',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        $transaction = new Transaction($validatedData);
        // $transaction->user_id = Auth::id();
        $transaction->save();

        // TODO: ERROR

        return redirect()->route('transactions.show', $request->asset_id)->with('success', 'Transaction created successfully.');
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
