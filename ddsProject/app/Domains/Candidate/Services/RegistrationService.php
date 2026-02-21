<?php

namespace App\Domains\Candidate\Services;

use App\Domains\Candidate\Repositories\RegistrationRepositoryInterface;

class RegistrationService
{
    protected $registrationRepo;

    public function __construct(RegistrationRepositoryInterface $registrationRepo)
    {
        $this->registrationRepo = $registrationRepo;
    }

    public function registration()
    {
        return $this->registrationRepo->all();
    }
}
