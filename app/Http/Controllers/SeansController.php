<?php

namespace App\Http\Controllers;
use App\Seans;
use App\Spot;
use App\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Yajra\DataTables\DataTables;

class SeansController extends Controller
{
    public function index(Request $request)
    {
        $keyword = null;
        $seans_start_date = null;

        if ($request->has('seans_start_date')) {
            $seans_start_date = $request->get('seans_start_date');
        }

        if ($request->has('search_query')) {
            $keyword = strtolower($request->get('search_query'));
        }
        
        if($request->ajax())
        {
            $data = Seans::when($keyword, function ($query, $keyword) {
                return $query->where(
                    function ($q) use ($keyword) {
                    return $q->where('film_name', 'LIKE', "%$keyword%")
                    ->orWhere('price','LIKE',"%$keyword%")
                    ->orWhere('hall','LIKE',"%$keyword%")
                    ->orWhere('seans_number','LIKE',"%$keyword%")
                    ->orWhere('duration','LIKE',"%$keyword%");
                }
            );

            })->when($seans_start_date, function ($query, $seans_start_date) {
               // $seans_start_date = Carbon::createFromFormat('m-d-Y', $seans_start_date)->format('Y-m-d');
                if (strlen($seans_start_date) == 10) {
                    return $query->whereDate('start_date', $seans_start_date);
                } else {
                    $from = substr($seans_start_date, 0, 10);
                    $to = substr($seans_start_date, 13, 24);
                    return $query->whereBetween('start_date', [$from, $to]);
                }
            })->orderBy('created_at', 'DESC');
    
        return DataTables::of($data)
        ->editColumn('price', function ($seanse) {
           return  $seanse->price.' TMT';
         })
         ->editColumn('start_date', function ($seanse) {
            return date('d/m/Y H:i', strtotime($seanse->start_date));
        })

        ->editColumn('hall', function ($seanse) {
            if($seanse->hall == '3d1'){
                return '1nji zal 3D';
            } elseif ($seanse->hall == '3d2') {
                return '2nji zal 3D';
            } else {
                return '5D';
            }
        })
         
         ->addColumn('action', function ($seanse) {
           return view('column_for_seans', compact('seanse'));
       })
       ->addIndexColumn()
       ->rawColumns(['action'])
       ->make();

    }

        return view('admin.seanses.index');
    }

    public function create()
    {
        return view('admin.seanses.create');
    }
 
    public function store(Request $request)
    {
        $this->validate($request,[
            'film_name'=>'required',
            'start_date'=>'required',
            'price'=>'required|numeric',
            'hall'=>'required',
            'duration'=>'required'
        ]);
        
        if($request->has('start_date'))
        {
            $start_date = Carbon::createFromFormat('m-d-Y H:i', $request->start_date)->format('Y-m-d H:i');
        }

        $request->merge([
            'start_date'=> $start_date,
            'seans_number'=>'fwfpnwefi'
        ]);
        

       $seans = Seans::create($request->all());

       $seans->update(['seans_number'=>'#SEANS000'.$seans->id]);

        return redirect()->route('seanses.index')->with('success','seans goshuldy');
    }
    
    public function show(Seans $seanse)
    {
        $Aspots = Spot::whereZal($seanse->hall)->where('number','LIKE','%A%')->get();
        $Bspots = Spot::whereZal($seanse->hall)->where('number','LIKE','%B%')->get();
        $Bspots = Spot::whereZal($seanse->hall)->where('number','LIKE','%B%')->get();
        $Cspots = Spot::whereZal($seanse->hall)->where('number','LIKE','%C%')->get();
        $Dspots = Spot::whereZal($seanse->hall)->where('number','LIKE','%D%')->get();

        $booking_ids = Booking::where('seans_id', $seanse->id)->pluck('spot_id')->toArray();

        // dd($booking_ids);

        
        return view('admin.seanses.show', compact('seanse','Aspots','Bspots','Cspots','Dspots','booking_ids'));
    }
  
    public function edit(Seans $seanse)
    {
        return view('admin.seanses.edit', compact('seanse'));
    }
   
    public function update(Request $request, Seans $seanse)
    {
        if($request->has('start_date'))
        {
            $start_date = Carbon::createFromFormat('m-d-Y H:i', $request->start_date)->format('Y-m-d H:i');
        }

        $request->merge([
            'start_date'=> $start_date,
        ]);

        $seanse->update($request->all());

        return redirect()->route('seanses.index')->with('success','seans uytgedildi');
    }
  
    public function destroy(Seans $seanse)
    {
        $seanse->delete();
        return redirect()->route('seanses.index')->with('success','seans pozuldy');
    }
}
