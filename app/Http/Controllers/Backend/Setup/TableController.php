<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    public function index()
    {
        $teams = Team::all()->sortByDesc('points');

        return view('backend.compet.table', compact('teams'));
    }
}
