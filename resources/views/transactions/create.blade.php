<!-- resources/views/transactions/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold" style="font-size:2.5rem; font-family:'Figtree', 'Segoe UI', Arial, sans-serif; letter-spacing:1px;">Add Transaction</h2>
    <form method="POST" action="{{ route('transactions.store') }}" class="mx-auto" style="max-inline-size: 500px;">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" required min="0" step="0.01" value="{{ old('amount') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Transaction Type</label>
            <select name="transaction_type" class="form-select" required>
                <option value="income" {{ old('transaction_type') == 'income' ? 'selected' : '' }}>Income (+)</option>
                <option value="expense" {{ old('transaction_type') == 'expense' ? 'selected' : '' }}>Expense (-)</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ old('date') }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category (optional)</label>
           <select name="category" id="category" class="form-select" required>
        <option value="">Select category</option>
        <option value="Transport" {{ old('category') == 'Transport' ? 'selected' : '' }}>Transport</option>
        <option value="Logistics" {{ old('category') == 'Logistics' ? 'selected' : '' }}>Logistics</option>
        <option value="Clothing" {{ old('category') == 'Clothing' ? 'selected' : '' }}>Clothing</option>
        <option value="Meals" {{ old('category') == 'Meals' ? 'selected' : '' }}>Meals</option>
        <option value="Internet bills" {{ old('category') == 'Internet bills' ? 'selected' : '' }}>Internet bills</option>
        <option value="Water and electricity" {{ old('category') == 'Water and electricity' ? 'selected' : '' }}>Water and electricity</option>
        <option value="Fuel" {{ old('category') == 'Fuel' ? 'selected' : '' }}>Fuel</option>
        <option value="Home material" {{ old('category') == 'Home material' ? 'selected' : '' }}>Home material</option>
        <option value="Utensils" {{ old('category') == 'Utensils' ? 'selected' : '' }}>Utensils</option>
        <option value="Cosmetics" {{ old('category') == 'Cosmetics' ? 'selected' : '' }}>Cosmetics</option>
        <option value="Cleaning services" {{ old('category') == 'Cleaning services' ? 'selected' : '' }}>Cleaning services</option>
        <option value="Salary" {{ old('category') == 'Salary' ? 'selected' : '' }}>Salary</option>
        <option value="Service payment" {{ old('category') == 'Service payment' ? 'selected' : '' }}>Service payment</option>
        <option value="Savings" {{ old('category') == 'Savings' ? 'selected' : '' }}>Savings</option>
        <option value="Discount" {{ old('category') == 'Discount' ? 'selected' : '' }}>Discount</option>
        <option value="Bonus" {{ old('category') == 'Bonus' ? 'selected' : '' }}>Bonus</option>
        <option value="Academics" {{ old('category') == 'Academics' ? 'selected' : '' }}>Academics</option>
        <option value="School fees" {{ old('category') == 'School fees' ? 'selected' : '' }}>School fees</option>
        <option value="Fines" {{ old('category') == 'Fines' ? 'selected' : '' }}>Fines</option>
        <option value="Others" {{ old('category') == 'Others' ? 'selected' : '' }}>Others</option>
    </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Add Transaction</button>
    </form>
</div>
@endsection