<?php

namespace App\Domains\Candidate\Repositories;

use App\Domains\Candidate\Repositories\RegistrationRepositoryInterface;
use App\Models\Vehicle;

class RegistrationRepository implements RegistrationRepositoryInterface
{
    public function all()
    {
        // return Vehicle::all();
        return "Get All Data Sets";
    }

    public function find($id)
    {
        // return Vehicle::find($id);
        return "Find A Report";
    }
}
