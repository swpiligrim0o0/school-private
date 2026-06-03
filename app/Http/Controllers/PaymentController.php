<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('student')->paginate(15);
        return view('payments.index', ['payments' => $payments]);
    }

    public function create()
    {
        $students = Student::all();
        return view('payments.create', ['students' => $students]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'month' => 'required|string',
            'year' => 'required|integer',
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,pending,overdue',
            'payment_method' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'To\'lov muvaffaqiyatli qo\'shildi!');
    }

    public function edit(Payment $payment)
    {
        $students = Student::all();
        return view('payments.edit', ['payment' => $payment, 'students' => $students]);
    }

    public function update(Request $request, Payment $payment)
    {
        $validated = $request->validate([
            'month' => 'required|string',
            'year' => 'required|integer',
            'amount' => 'required|numeric',
            'status' => 'required|in:paid,pending,overdue',
            'payment_date' => 'nullable|date',
            'payment_method' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $payment->update($validated);

        return redirect()->route('payments.index')->with('success', 'To\'lov muvaffaqiyatli yangilandi!');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'To\'lov o\'chirildi!');
    }
}
