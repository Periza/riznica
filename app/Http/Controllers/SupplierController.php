<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Repositories\SupplierRepository;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;


class SupplierController extends Controller{

    private $supplierRepository;

    public function __construct(SupplierRepository $repository) {
        $this->supplierRepository = $repository;
    }

    public function create()
    {
        return Inertia::render('NewSupplier');
    }

    public function store(SupplierRequest $request) {
        $data = $request->validated();
        $this->supplierRepository->create($data);

        return Inertia::render('NewSupplier')->with(['flash' => ['message' => "Dobavljač {$request['name']} uspješno dodan", 'type' => 'success', 'duration' => 10000]]);

    }

}
