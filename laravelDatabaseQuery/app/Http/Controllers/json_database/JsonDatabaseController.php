<?php

namespace App\Http\Controllers\json_database;

use App\Http\Controllers\Controller;
use App\Models\json_database\ProductModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonDatabaseController extends Controller
{
    public function addData(Request $request)
    {
        $message = '';
        DB::beginTransaction();
        try {
            ProductModel::create([
                'product_name' => 'product 2',
                'process' => ['current_status' => 'pending', 'update_status' => 'approved'],
                'working' => ['current_status' => 'pending', 'update_status' => null],
            ]);
            DB::commit();
        } catch (Exception $err) {
            $message = $err->getMessage();
            DB::rollBack();
        }
        return response()->json([
            'message' => $message
        ]);
    }
    public function getData(Request $request)
    {
        $res_data = [];
        try {
            $data=ProductModel::get();
            // ---------- is you used accesssor ----------------
            // $res_data['current_status']=$data[0]->process->current_status;
            // $res_data['update_status']=$data[0]->process->update_status;
            // ------------if you used casts--------------
            $res_data['update_status']=$data[0]->process['update_status'];

        } catch (Exception $err) {
        }
        return response()->json([
            'res_data' => $res_data
        ]);
    }
    public function getConData(Request $request){
        try{
            $data=ProductModel::where('process->current_status','pending')->get();
            $res_data['data']=$data;
        }catch(Exception $err){
            $res_data['message']=$err;
        }
        return response()->json([
            'res_data'=>$res_data
        ]);
    }
}
