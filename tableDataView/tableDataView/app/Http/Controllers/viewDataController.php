<?php

namespace App\Http\Controllers;

use App\Models\DataFlow;
use Illuminate\Http\Request;

class viewDataController extends Controller
{
    public function index(Request $request)
    {
        $query = DataFlow::query();

        if ($request->has('name') && $request->name != '') {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                  ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }
        
        if ($request->has('email') && $request->email != '') {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('city') && $request->city != '') {
            $query->where('city', $request->city);
        }

        $data = $query->paginate(5); // 5 per page to easily see pagination
        $cities = DataFlow::select('city')->distinct()->pluck('city');

        if ($request->ajax()) {
            return view('data_table', compact('data'))->render();
        }

        return view('data_view', compact('data', 'cities'));
    }
}
