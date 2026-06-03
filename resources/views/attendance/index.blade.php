@extends('layout')

@section('title', 'Davomat')

@section('content')
<div class="row mb-4">
    <div class="col-md-8">
        <h2>✅ Davomat Ro'yxati</h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="{{ route('attendance.create') }}" class="btn btn-info">➕ Yangi Davomat</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Oquvchi</th>
                <th>Sana</th>
                <th>Holati</th>
                <th>Izohlar</th>
                <th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendance as $att)
                <tr>
                    <td>{{ $att->student->full_name }}</td>
                    <td>{{ $att->date->format('d.m.Y') }}</td>
                    <td>
                        <span class="badge bg-{{ $att->status === 'present' ? 'success' : ($att->status === 'late' ? 'warning' : 'danger') }}">
                            {{ $att->status === 'present' ? '✅ Keldi' : ($att->status === 'late' ? '⏰ Kech Keldi' : '❌ Kelmadi') }}
                        </span>
                    </td>
                    <td>{{ $att->notes ?? '-' }}</td>
                    <td>
                        <a href="{{ route('attendance.edit', $att) }}" class="btn btn-sm btn-warning">✏️</a>
                        <form action="{{ route('attendance.destroy', $att) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ishonchingiz komilmi?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Davomat topilmadi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $attendance->links() }}
</div>
@endsection
