@extends('layout')

@section('title', 'To\'lovlar')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>💰 Oylik To'lovlar</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('payments.create') }}" class="btn btn-success">➕ Yangi To'lov</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Oquvchi</th>
                <th>Oy</th>
                <th>Yil</th>
                <th>Summa</th>
                <th>Holati</th>
                <th>To'lov Sanasi</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $payment)
                <tr>
                    <td>{{ $payment->student->full_name }}</td>
                    <td>{{ $payment->month }}</td>
                    <td>{{ $payment->year }}</td>
                    <td>{{ number_format($payment->amount, 0) }} so'm</td>
                    <td>
                        <span class="badge bg-{{ $payment->status === 'paid' ? 'success' : ($payment->status === 'pending' ? 'warning' : 'danger') }}">
                            {{ $payment->status === 'paid' ? '✅ To\'landi' : ($payment->status === 'pending' ? '⏳ Kutilmoqda' : '❌ O\'tgan vaqt') }}
                        </span>
                    </td>
                    <td>{{ $payment->payment_date ? $payment->payment_date->format('d.m.Y') : '-' }}</td>
                    <td>
                        <a href="{{ route('payments.edit', $payment) }}" class="btn btn-sm btn-warning">✏️</a>
                        <form action="{{ route('payments.destroy', $payment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ishonchingiz komilmi?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">To'lov topilmadi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $payments->links() }}
</div>
@endsection
