<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Repositories\SupplierRepository;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Supplier;



class SupplierController extends Controller{

    private $supplierRepository;

    public function __construct(SupplierRepository $repository) {
        $this->supplierRepository = $repository;
    }

    public function index() {
        return redirect('/new-supplier');
    }

    public function create()
    {
        return Inertia::render('NewSupplier');
    }

    public function store(SupplierRequest $request) {
        $data = $request->validated();
        $data['partner_id'] = Auth::user()->partner_id;
        $this->supplierRepository->create($data);
        return Inertia::render('NewSupplier')->with(['toast' => ['message' => "Dobavljač {$request->name} uspješno dodan!", 'type' => 'success']]);
    }

}
