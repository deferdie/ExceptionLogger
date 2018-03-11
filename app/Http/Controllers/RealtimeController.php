<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectException;
use App\Http\Resources\ProjectExceptionCollection;
use Illuminate\Support\Facades\DB;


class RealtimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $projectEx = ProjectException::all();
        
        $projectEx = $projectEx->unique(function ($item) {
            return $item['project_unique_exception_id'];
        });
        
        $exceptions = new ProjectExceptionCollection($projectEx);

        return view('realtime.index', [
            'exceptions' => json_encode($exceptions->toArray(''))
        ]);
    }
}
