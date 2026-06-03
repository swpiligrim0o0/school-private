@extends('layout')

@section('title', 'To\'lovni Tahrir')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>✏️ To'lovni Tahrir</h2>
        <hr>

        <form action="{{ route('payments.update', $payment) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="student_id" class="form-label">Oquvchi</label>
                <input type="text" class="form-control" value="{{ $payment->student->full_name }}" disabled>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="month" class="form-label">Oy *</label>
                    <input type="text" class="form-control @error('month') is-invalid @enderror" id="month" name="month" value="{{ old('month', $payment->month) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label">Yil *</label>
                    <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $payment->year) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="amount" class="form-label">Summa (so'm) *</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Holati *</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pending" {{ old('status', $payment->status) == 'pending' ? 'selected' : '' }}>⏳ Kutilmoqda</option>
                        <option value="paid" {{ old('status', $payment->status) == 'paid' ? 'selected' : '' }}>✅ To'landi</option>
                        <option value="overdue" {{ old('status', $payment->status) == 'overdue' ? 'selected' : '' }}>❌ O'tgan vaqt</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="payment_date" class="form-label">To'lov Sanasi</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ old('payment_date', $payment->payment_date?->format('Y-m-d')) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="payment_method" class="form-label">To'lov Usuli</label>
                    <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ old('payment_method', $payment->payment_method) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Izohlar</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $payment->notes) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">💾 Saqlash</button>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">❌ Bekor Qilish</a>
            </div>
        </form>
    </div>
</div>
@endsection
