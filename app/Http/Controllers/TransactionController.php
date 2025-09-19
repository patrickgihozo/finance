<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // Show form to add a transaction
    public function create()
    {
        return view('transactions.create');
    }

    // Store a new transaction
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'transaction_type' => 'required|in:income,expense',
            'date' => 'required|date',
            'category' => 'nullable|string|max:255',
        ]);

        // Set amount sign based on transaction_type
        $amount = $request->amount;
        if ($request->transaction_type === 'expense') {
            $amount = -abs($amount);
        }

        Transaction::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'amount' => $amount,
            'date' => $request->date,
            'category' => $request->category,
        ]);

        return redirect()->route('transactions.history')->with('success', 'Transaction added!');
    }
    public function history(Request $request)
    {
        $query = Transaction::where('user_id', auth()->id());

    // Filter by category
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    // Filter by date range
    if ($request->filled('date_from')) {
        $query->where('date', '>=', $request->date_from);
    }
    if ($request->filled('date_to')) {
        $query->where('date', '<=', $request->date_to);
    }

    // Filter by amount range
    if ($request->filled('amount_min')) {
        $query->where('amount', '>=', $request->amount_min);
    }
    if ($request->filled('amount_max')) {
        $query->where('amount', '<=', $request->amount_max);
        }

    // Sorting
    $sort_field = $request->get('sort_field', 'date');
    $sort_order = $request->get('sort_order', 'desc');
    $query->orderBy($sort_field, $sort_order);

    $transactions = $query->get();

    // Get all categories for dropdown
    $categories = Transaction::where('user_id', auth()->id())->distinct()->pluck('category');

    return view('transactions.history', compact('transactions', 'categories', 'sort_field', 'sort_order'));
    }
}