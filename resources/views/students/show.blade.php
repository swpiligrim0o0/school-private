@extends('layout')

@section('title', $student->full_name)

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>{{ $student->full_name }}</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>📋 Oquvchi Ma'lumotlari</h5>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $student->student_id }}</p>
                <p><strong>Email:</strong> {{ $student->user->email }}</p>
                <p><strong>Telefon:</strong> {{ $student->phone ?? '-' }}</p>
                <p><strong>Manzil:</strong> {{ $student->address ?? '-' }}</p>
                <p><strong>Sinf:</strong> {{ $student->class ?? '-' }}</p>
                <p><strong>Tug'ilgan Sanasi:</strong> {{ $student->date_of_birth ? $student->date_of_birth->format('d.m.Y') : '-' }}</p>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">✏️ Tahrir</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h5>💰 To'lovlar ({{ $student->payments->count() }})</h5>
            </div>
            <div class="card-body">
                @forelse ($student->payments->take(5) as $payment)
                    <div class="mb-2 pb-2 border-bottom">
                        <span class="badge bg-{{ $payment->status === 'paid' ? 'success' : ($payment->status === 'pending' ? 'warning' : 'danger') }}">{{ $payment->status }}</span>
                        {{ $payment->month }} {{ $payment->year }} - {{ number_format($payment->amount, 0) }} so'm
                    </div>
                @empty
                    <p class="text-muted">To'lov topilmadi</p>
                @endforelse
                <a href="{{ route('payments.index') }}" class="btn btn-sm btn-primary">Batafsil</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h5>✅ Davomat ({{ $student->attendance->count() }})</h5>
            </div>
            <div class="card-body">
                @forelse ($student->attendance->take(10) as $att)
                    <span class="badge bg-{{ $att->status === 'present' ? 'success' : ($att->status === 'late' ? 'warning' : 'danger') }}">{{ $att->date->format('d.m.Y') }} - {{ $att->status }}</span>
                @empty
                    <p class="text-muted">Davomat topilmadi</p>
                @endforelse
                <br><br>
                <a href="{{ route('attendance.index') }}" class="btn btn-sm btn-primary">Batafsil</a>
            </div>
        </div>
    </div>
</div>
@endsection
