<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // Create a new partner
    public function create() {
        return Inertia::render('NewPartner');
    }
}
