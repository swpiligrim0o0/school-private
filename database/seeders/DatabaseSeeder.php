<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Payment;
use App\Models\Attendance;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Foydalanuvchi
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // O'qituvchi Foydalanuvchi
        $teacher = User::create([
            'name' => 'Teacher User',
            'email' => 'teacher@test.com',
            'password' => Hash::make('password123'),
            'role' => 'teacher',
        ]);

        // 10 ta Oquvchi Qo'shish
        $studentNames = [
            ['Ali', 'Karimov'],
            ['Fatima', 'Ibragimova'],
            ['Husan', 'Qodirova'],
            ['Zulfiya', 'Rashidova'],
            ['Akmal', 'Shodmonov'],
            ['Nasiba', 'Turaeva'],
            ['Shavkat', 'Omonov'],
            ['Gulnora', 'Mirzaeva'],
            ['Jaloliddin', 'Abdulloyev'],
            ['Munira', 'Salimova'],
        ];

        foreach ($studentNames as $index => $names) {
            $user = User::create([
                'name' => $names[0] . ' ' . $names[1],
                'email' => 'student' . ($index + 1) . '@test.com',
                'password' => Hash::make('password123'),
                'role' => 'student',
            ]);

            $student = Student::create([
                'user_id' => $user->id,
                'student_id' => 'STU' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'first_name' => $names[0],
                'last_name' => $names[1],
                'phone' => '998' . rand(90, 99) . rand(1000000, 9999999),
                'address' => 'Tashkent city',
                'class' => rand(7, 11) . '-"' . chr(65 + rand(0, 2)) . '"',
                'date_of_birth' => Carbon::now()->subYears(rand(13, 17))->subDays(rand(0, 365)),
            ]);

            // 12 ta oyning to'lovlar
            $months = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];
            foreach ($months as $month) {
                Payment::create([
                    'student_id' => $student->id,
                    'month' => $month,
                    'year' => 2024,
                    'amount' => 500000,
                    'status' => rand(0, 1) ? 'paid' : 'pending',
                    'payment_method' => ['Naqd', 'Karta'][rand(0, 1)],
                    'payment_date' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 30)) : null,
                ]);
            }

            // 30 ta davomat qaydlari
            for ($day = 1; $day <= 30; $day++) {
                Attendance::create([
                    'student_id' => $student->id,
                    'date' => Carbon::now()->subDays(30 - $day),
                    'status' => ['present', 'absent', 'late'][rand(0, 2)],
                    'notes' => rand(0, 5) === 0 ? 'Bemor edi' : null,
                ]);
            }
        }
    }
}
