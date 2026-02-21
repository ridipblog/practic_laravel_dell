<?php

namespace App\Domains\Candidate\Repositories;

interface RegistrationRepositoryInterface
{
    public function all();
    public function find($id);
}
