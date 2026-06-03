@extends('layout')

@section('title', 'Davomatni Tahrir')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <h2>✏️ Davomatni Tahrir</h2>
        <hr>

        <form action="{{ route('attendance.update', $attendance) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="student_id" class="form-label">Oquvchi</label>
                <input type="text" class="form-control" value="{{ $attendance->student->full_name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Sana</label>
                <input type="date" class="form-control" value="{{ $attendance->date->format('Y-m-d') }}" disabled>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Holati *</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="present" {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>✅ Keldi</option>
                    <option value="absent" {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>❌ Kelmadi</option>
                    <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>⏰ Kech Keldi</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Izohlar</label>
                <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $attendance->notes) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-info">💾 Saqlash</button>
                <a href="{{ route('attendance.index') }}" class="btn btn-secondary">❌ Bekor Qilish</a>
            </div>
        </form>
    </div>
</div>
@endsection
