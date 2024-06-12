<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dashboard;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        $projects = Dashboard::all();
        $projects = Dashboard::with('types', 'technologies', 'user')->get();

        return response()->json([
            
            'projects' => $projects

        ]);
    }
}
