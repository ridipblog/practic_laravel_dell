<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\SendEmailInterfaceJob;
use App\Mail\SendMailToUserJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DispatchJobController extends Controller
{
    // QUEUE_CONNECTION=database
    // php artisan queue:table
    // php artisan migrate
    // php artisan queue:work


    public function index(Request $request)
    {
        dispatch(new SendEmailJob("memorytemp5@gmail.com"));
        dispatch(new SendEmailJob("nametemp316@gmail.com"));
        dd("sa");
    }
    public function byInterface(Request $request)
    {
        Mail::to('memorytemp5@gmail.com')->queue(new SendEmailInterfaceJob());
        Mail::to('nametemp316@gmail.com')->queue(new SendEmailInterfaceJob());
        dd("Send");
    }
}
