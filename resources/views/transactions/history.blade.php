@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold" style="font-size:2.5rem; font-family:'Figtree', 'Segoe UI', Arial, sans-serif; letter-spacing:1px;">
        Personal Transaction History
    </h2>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Filter Button triggers modal -->
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel"></i> Filter
        </button>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <form method="GET" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="filterModalLabel">Filter Transactions</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="date_from" class="form-label">Date From</label>
                <input type="date" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
            </div>
            <div class="mb-3">
                <label for="date_to" class="form-label">Date To</label>
                <input type="date" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
            </div>
            <div class="mb-3">
                <label for="amount_min" class="form-label">Min Amount</label>
                <input type="number" step="0.01" name="amount_min" id="amount_min" class="form-control" value="{{ request('amount_min') }}">
            </div>
            <div class="mb-3">
                <label for="amount_max" class="form-label">Max Amount</label>
                <input type="number" step="0.01" name="amount_max" id="amount_max" class="form-control" value="{{ request('amount_max') }}">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Apply Filter</button>
            <a href="{{ route('transactions.history') }}" class="btn btn-secondary">Reset</a>
          </div>
        </form>
      </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-bordered" id="transactionTable">
            <thead class="table-light">
                <tr>
                    <th>
                        <a href="{{ request()->fullUrlWithQuery(['sort_field' => 'title', 'sort_order' => $sort_field == 'title' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                            Title
                            @if($sort_field == 'title')
                                <span>{!! $sort_order == 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ request()->fullUrlWithQuery(['sort_field' => 'amount', 'sort_order' => $sort_field == 'amount' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                            Amount
                            @if($sort_field == 'amount')
                                <span>{!! $sort_order == 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ request()->fullUrlWithQuery(['sort_field' => 'date', 'sort_order' => $sort_field == 'date' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                            Date
                            @if($sort_field == 'date')
                                <span>{!! $sort_order == 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                            @endif
                        </a>
                    </th>
                    <th>
                        <a href="{{ request()->fullUrlWithQuery(['sort_field' => 'category', 'sort_order' => $sort_field == 'category' && $sort_order == 'asc' ? 'desc' : 'asc']) }}">
                            Category
                            @if($sort_field == 'category')
                                <span>{!! $sort_order == 'asc' ? '&#9650;' : '&#9660;' !!}</span>
                            @endif
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr class="{{ $transaction->amount > 0 ? 'table-success' : 'table-danger' }}"
                        data-type="{{ $transaction->amount > 0 ? 'income' : 'expense' }}">
                        <td>{{ $transaction->title }}</td>
                        <td>
                            @if($transaction->amount > 0)
                                <span class="text-success">+{{ number_format($transaction->amount, 2) }}</span>
                            @else
                                <span class="text-danger">{{ number_format($transaction->amount, 2) }}</span>
                            @endif
                        </td>
                        <td>{{ $transaction->date }}</td>
                        <td>{{ $transaction->category ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection