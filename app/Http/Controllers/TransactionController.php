<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('user')->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|integer',
            'category' => 'required',
            'content' => 'required',
            'memo' => 'nullable',
            'transaction_date' => 'required|date',
        ]);;

        $request->user()->transactions()->create(
            $request->only([
                'type',
                'amount',
                'category',
                'content',
                'memo',
                'transaction_date',
            ])
        );
        
        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'type' => 'required',
            'amount' => 'required|integer',
            'category' => 'required',
            'content' => 'required',
            'memo' => 'nullable',
            'transaction_date' => 'required|date',
        ]);

        $transaction->update(
            $request->only([
                'type',
                'amount',
                'category',
                'content',
                'memo',
                'transaction_date',
            ])
        );

        return redirect()->route('transactions.index', $transaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }
}
