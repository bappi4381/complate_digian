<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Project;

class ReportController extends Controller
{
    public function generatePDF()
    {
        $projects = Project::all(); // Fetch users from database

        $pdf = PDF::loadView('reports.user_report', compact('projects'));

        return $pdf->download('user_report.pdf');
    }
}
