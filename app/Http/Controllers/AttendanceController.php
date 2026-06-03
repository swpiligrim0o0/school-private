<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendance = Attendance::with('student')->paginate(20);
        return view('attendance.index', ['attendance' => $attendance]);
    }

    public function create()
    {
        $students = Student::all();
        return view('attendance.create', ['students' => $students]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'date' => 'required|date',
            'status' => 'required|in:present,absent,late',
            'notes' => 'nullable|string',
        ]);

        Attendance::updateOrCreate(
            ['student_id' => $validated['student_id'], 'date' => $validated['date']],
            $validated
        );

        return redirect()->route('attendance.index')->with('success', 'Davomat muvaffaqiyatli qo\'shildi!');
    }

    public function edit(Attendance $attendance)
    {
        $students = Student::all();
        return view('attendance.edit', ['attendance' => $attendance, 'students' => $students]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'status' => 'required|in:present,absent,late',
            'notes' => 'nullable|string',
        ]);

        $attendance->update($validated);

        return redirect()->route('attendance.index')->with('success', 'Davomat muvaffaqiyatli yangilandi!');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Davomat o\'chirildi!');
    }
}
