<?php

namespace App\Modules\Blog\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        return view("Blog::admin.index");
    }
}
