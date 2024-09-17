<?php

namespace App\Http\Controllers\lazy_loading;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LazyLoadingController extends Controller
{
    public function index(Request $request)
    {
        $skip = $request->input('skip');
        $take = 10;
        $members = DB::table('lazy_loading')
            ->skip($skip)
            ->take($take)
            ->get();
        if ($request->ajax()) {
            return view('lazy_locading.lazy_content',[
                'members' => $members
            ])->render();
        }
        return view('lazy_locading.lazy_loading', [
            'members' => $members
        ]);
    }
}
