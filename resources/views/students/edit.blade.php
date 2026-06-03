@extends('layout')

@section('title', 'Oquvchini Tahrir')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>✏️ Oquvchini Tahrir</h2>
        <hr>

        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Ismi *</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Familyasi *</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Telefon</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $student->phone) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="class" class="form-label">Sinf</label>
                    <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $student->class) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="date_of_birth" class="form-label">Tug'ilgan Sanasi</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Manzil</label>
                <textarea class="form-control" id="address" name="address" rows="3">{{ old('address', $student->address) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Izohlar</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $student->notes) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">💾 Saqlash</button>
                <a href="{{ route('students.show', $student) }}" class="btn btn-secondary">❌ Bekor Qilish</a>
            </div>
        </form>
    </div>
</div>
@endsection
