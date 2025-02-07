<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $transactions = Transaction::with('asset', 'user')->orderByDesc('approval')->get();
        } else {
            $transactions = Transaction::with('asset')->where('user_id', Auth::id())->orderByDesc('approval')->get();
        }

        return view('transaction.index', compact('transactions'));
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
        $request->validate([
            'event' => 'required',
            'date' => 'required',
            'asset_id' => 'required|exists:assets,id',
            'start_date' => 'required|date',
            'finish_date' => 'required|date',
        ]);

        $term = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->finish_date)->addDay());
        $rental_price = (int) Asset::where('id', $request->asset_id)->implode('rental_price'); // Asset::find($request->id)->get('rental_price');  //
        $total_price = $term * $rental_price;
        $booking_code = fake()->numerify('####'.now()->year.'####');

        Transaction::create([
            'event' => $request->event,
            'booking_code' => $booking_code,
            'asset_id' => $request->asset_id,
            'start_date' => $request->start_date,
            'finish_date' => $request->finish_date,
            'user_id' => Auth::id(),
            'term' => $term,
            'rental_price' => $rental_price,
            'total_price' => $total_price,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully. Booking Code: '.$booking_code);
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
