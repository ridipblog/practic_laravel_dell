<?php

namespace App\Http\Controllers\service_container;

use App\Http\Controllers\Controller;
use App\Services\LoggService;
use App\test_method\TestMethod;
use Illuminate\Http\Request;

class ServiceContainerController extends Controller
{
    protected $logger;
    public function __construct(TestMethod $logger)
    {
        $this->logger=$logger;
    }
    public function index(){
        $this->logger->test();
    }
}
