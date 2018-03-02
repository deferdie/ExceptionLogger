<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectException;

class RealtimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $exceptions =  ProjectException::latest()->get();

        return view('realtime.index', [
            'exceptions' => $exceptions
        ]);
    }
}
