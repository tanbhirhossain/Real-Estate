<?php

namespace App\Http\Controllers\FRONT;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Front/Contact');
    }
}
