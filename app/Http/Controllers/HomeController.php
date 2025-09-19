<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $userId =  auth()->id();
        $income = \App\Models\Transaction::where('user_id', $userId)
            ->where('amount', '>', 0)
            ->sum('amount');
        $expenses = abs(\App\Models\Transaction::where('user_id', $userId)->where ('amount', '<', 0)->sum('amount'));
        $balance = $income - $expenses;

        $transactions = \App\Models\Transaction::where('user_id', $userId)
            ->orderBy('date')
            ->get(['date', 'amount']);

        return view('dashboard', compact('income', 'expenses', 'balance', 'transactions'));
    }
}