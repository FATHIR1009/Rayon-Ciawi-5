<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Schedule; // Just in case we need schedules from DB later, but user says "Buat mengikuti gaya visual Figma ... Jangan membuat layout baru". Wait, schedules and galeri. For Schedule section: "Section Jadwal: Buat mengikuti gaya visual Figma yang sudah ada. Jangan membuat layout baru yang berbeda dari halaman." I will just use static data for schedules if it's complex, or if there is a schedule model... Let's just fetch everything static for schedule, or from db if Schedule model exists. Wait, I saw Schedule.php in models! I'll include it.

class HomeController extends Controller
{
    public function index()
    {
        // Get structure (students with positions)
        // Group by position maybe, or just get all and let the view handle it.
        $students = Student::with('position')->get();

        return view('welcome', compact('students'));
    }
}
