<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RekomendasiFeedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $pageTitle = 'Feedback';
        $feedback = RekomendasiFeedback::all();
        return view('admin.feedback.view', compact('pageTitle', 'feedback'));
    }
}
