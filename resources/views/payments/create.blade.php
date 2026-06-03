@extends('layout')

@section('title', 'Yangi To\'lov')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>➕ Yangi To'lov Qo'shish</h2>
        <hr>

        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="student_id" class="form-label">Oquvchi *</label>
                <select class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>
                    <option value="">Oquvchini Tanlang</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ old('student_id') == $student->id ? 'selected' : '' }}>
                            {{ $student->full_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="month" class="form-label">Oy *</label>
                    <input type="text" class="form-control @error('month') is-invalid @enderror" id="month" name="month" value="{{ old('month') }}" placeholder="Yanvar, Fevral..." required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="year" class="form-label">Yil *</label>
                    <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', date('Y')) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="amount" class="form-label">Summa (so'm) *</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Holati *</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Kutilmoqda</option>
                        <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>✅ To'landi</option>
                        <option value="overdue" {{ old('status') == 'overdue' ? 'selected' : '' }}>❌ O'tgan vaqt</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">To'lov Usuli</label>
                <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ old('payment_method') }}" placeholder="Naqd, Karta...">
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Izohlar</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">💾 Saqlash</button>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">❌ Bekor Qilish</a>
            </div>
        </form>
    </div>
</div>
@endsection
