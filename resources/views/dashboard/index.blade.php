@extends('layout')

@section('title', 'Dashboard')

@section('content')
<div class="row mb-4">
    <div class="col-md-12">
        <h2>📊 Dashboard</h2>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">👥 Jami Oquvchilar</h5>
                <h2>{{ $totalStudents }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">💰 Jami To'lovlar</h5>
                <h2>{{ number_format($totalPayments, 0) }} so'm</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">⏳ Kutilayotgan To'lovlar</h5>
                <h2>{{ $pendingPayments }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">✅ Davomat Qaydlari</h5>
                <h2>{{ $totalAttendance }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
