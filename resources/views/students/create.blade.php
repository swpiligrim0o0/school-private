@extends('layout')

@section('title', 'Yangi Oquvchi')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>➕ Yangi Oquvchi Qo'shish</h2>
        <hr>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Ismi *</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Familyasi *</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="student_id" class="form-label">Oquvchi ID *</label>
                    <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" value="{{ old('student_id') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Parol *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="class" class="form-label">Sinf</label>
                    <input type="text" class="form-control" id="class" name="class" value="{{ old('class') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="date_of_birth" class="form-label">Tug'ilgan Sanasi</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Manzil</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ old('address') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">💾 Saqlash</button>
                <a href="{{ route('students.index') }}" class="btn btn-secondary">❌ Bekor Qilish</a>
            </div>
        </form>
    </div>
</div>
@endsection
