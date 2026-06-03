<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use App\Models\Attendance;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStudents = Student::count();
        $totalPayments = Payment::sum('amount');
        $pendingPayments = Payment::where('status', 'pending')->count();
        $totalAttendance = Attendance::count();

        return view('dashboard.index', [
            'totalStudents' => $totalStudents,
            'totalPayments' => $totalPayments,
            'pendingPayments' => $pendingPayments,
            'totalAttendance' => $totalAttendance,
        ]);
    }
}
