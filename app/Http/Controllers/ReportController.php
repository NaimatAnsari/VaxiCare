<?php

namespace App\Http\Controllers;

use App\Models\Appointment;  // Assuming 'Booking' is your model for vaccination data
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function generateVaccinationReport(Request $request)
    {
        // Fetch data for admin (you can change this based on your admin's logic)
        $bookings = DB::table('bookings')
        ->join('childrens as c', 'bookings.child_id', '=', 'c.id')
        ->join('users as h', 'bookings.hospital_id', '=', 'h.id')
        ->join('vaccines as v', 'bookings.vaccine_type', '=', 'v.id')
        ->join('users as p', 'bookings.parent_id', '=', 'p.id')
        ->select('bookings.*', 'c.name as child_name', 'h.fullname as h_name', 'v.vaccine_name as vaccine_name' , 'p.fullname as parent_name') // Correct field
        ->get(); // You can customize the query as per your requirements

        // Check if admin wants to download PDF
        if ($request->has('download') && $request->download == 'pdf') {
            // Generate the PDF from the view
            $pdf = PDF::loadView('admin.vaccination_report_pdf', compact('bookings'));

            // Return the PDF file for download
            return $pdf->download('vaccination_report.pdf');
        }

        // Otherwise, show the report page
        return view('admin.report', compact('bookings'));

}
}