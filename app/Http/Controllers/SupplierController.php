<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SupplierController extends Controller
{
    public function create()
    {
        return Inertia::render('NewSupplier');
    }

    public function store() {
        
    }

}
