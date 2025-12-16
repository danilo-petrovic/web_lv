<?php

namespace App\Http\Controllers;

use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = \App\Models\Application::whereHas('task', function ($q) {
            $q->where('user_id', auth()->id());
        })->get();

        return view('applications.index', compact('applications'));
    }


    public function accept(Application $application)
    {
        $application->update(['status' => 'accepted']);
        return back();
    }

    public function reject(Application $application)
    {
        $application->update(['status' => 'rejected']);
        return back();
    }
}
