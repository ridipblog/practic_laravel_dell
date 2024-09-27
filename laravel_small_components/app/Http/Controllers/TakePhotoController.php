<?php

namespace App\Http\Controllers;

use App\Models\CronTest\CronTempModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TakePhotoController extends Controller
{
    public function index()
    {
        return view('take_photos.take_photo');
    }
    public function takePhotoSubmit(Request $request)
    {
        if ($request->ajax()) {
            $file = false;
            if ($request->hasFile('file')) {
                // $request->file('file')->store('public/uploads');
                $file_name = Str::uuid() . '_' . time() . $request->file('file')->getClientOriginalName();
                $location = '/uploads/disk/' . $file_name;
                $final_path = Storage::disk('public')->put($location, file_get_contents($request->file('file')));
            }
            return response()->json(['data' => $request->name, 'file' => $file]);
        }
    }
    public function cronTest(Request $request)
    {
        for ($i = 0; $i < 50; $i++) {
            CronTempModel::create([
                'name' => 'name' . $i
            ]);
        }
    }
}
