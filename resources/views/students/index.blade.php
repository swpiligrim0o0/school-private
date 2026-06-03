@extends('layout')

@section('title', 'Oquvchilar')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>👥 Oquvchilar Ro'yxati</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('students.create') }}" class="btn btn-primary">➕ Yangi Oquvchi</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Oquvchi ID</th>
                <th>Ismi</th>
                <th>Familyasi</th>
                <th>Sinf</th>
                <th>Email</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->student_id }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->class ?? '-' }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>
                        <a href="{{ route('students.show', $student) }}" class="btn btn-sm btn-info">👁️ Ko'rish</a>
                        <a href="{{ route('students.edit', $student) }}" class="btn btn-sm btn-warning">✏️ Tahrir</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ishonchingiz komilmi?')">🗑️ O'chirish</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Oquvchi topilmadi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $students->links() }}
</div>
@endsection
