<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Status;

class AdminController extends Controller
{
    public function index() {
        $apps = Application::all();
        $statuses = Status::pluck('name', 'id')->all();

        return view('admin', ['applications' => $apps, 'statuses' => $statuses]);
    }
}
