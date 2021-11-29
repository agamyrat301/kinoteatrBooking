<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Seans;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $seans_start_date = null;
        
        if($request->has('seans_start_date')){
            $seans_start_date = $request->get('seans_start_date');
        }

        $seanses = Seans::when($seans_start_date, function ($query, $seans_start_date) {
            // $seans_start_date = Carbon::createFromFormat('m-d-Y', $seans_start_date)->format('Y-m-d');
             if (strlen($seans_start_date) == 10) {

                 return $query->whereDate('created_at', $seans_start_date);

             } else {
                 $from = substr($seans_start_date, 0, 10);
                 $to = substr($seans_start_date, 13, 24);
                 return $query->whereBetween('created_at', [$from, $to]);
             }
         })->orderBy('created_at', 'DESC')->get();

        return view('admin.reports.index',compact('seanses'));
    }
}
