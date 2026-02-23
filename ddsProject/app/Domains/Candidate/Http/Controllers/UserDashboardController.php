<?php

namespace App\Domains\Candidate\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public function index()
    {
        try {


            $userId = 6;
            $result = DB::table('employment_details as e1')
                ->select([
                    'e1.user_id as user1',
                    'e2.user_id as user2',
                    'e3.user_id as user3',
                ])

                ->join('user_credentials as u1', function ($join) {
                    $join->on('u1.id', '=', 'e1.user_id')
                        ->where('u1.profile_verify_status', 1);
                })

                ->join('activepreference as p1', 'e1.user_id', '=', 'p1.user_id')

                ->join('employment_details as e2', 'p1.district_id', '=', 'e2.district_id')

                ->join('user_credentials as u2', function ($join) {
                    $join->on('u2.id', '=', 'e2.user_id')
                        ->where('u2.profile_verify_status', 1);
                })

                ->join('activepreference as p2', 'e2.user_id', '=', 'p2.user_id')

                ->join('employment_details as e3', 'p2.district_id', '=', 'e3.district_id')

                ->join('user_credentials as u3', function ($join) {
                    $join->on('u3.id', '=', 'e3.user_id')
                        ->where('u3.profile_verify_status', 1);
                })

                ->join('activepreference as p3', 'e3.user_id', '=', 'p3.user_id')

                ->whereColumn('p3.district_id', 'e1.district_id')
                ->where('e1.user_id', $userId)

                ->get();
            return view('candidate::dashboard', [
                'result' => $result
            ]);
        } catch (Exception $err) {
        }
    }
}
