<?php

namespace App\Domains\Candidate\Http\Controllers;

use App\Domains\Candidate\Services\RegistrationService;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    protected $registrationService;

    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function home()
    {
        return view('candidate::home');
    }
    public function registration()
    {
        dd($this->registrationService->registration());
    }
}
