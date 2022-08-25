<?php

namespace App\Http\Controllers;

use App\Handlers\LoggerHandler;
use App\Handlers\LoggerHandlerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoggerController extends Controller
{
    private LoggerHandlerInterface $handler;
    public function __construct( LoggerHandlerInterface $handler){
        $this->handler = $handler;
    }

    public function index(Request $request):void
    {
        $this->handler->handle($request);
    }
}
