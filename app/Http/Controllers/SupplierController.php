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

    public function create()
    {
        return Inertia::render('NewSupplier')->with(['suppliers' => fn () => Supplier::paginate(4)]);
    }

    public function store(SupplierRequest $request) {
        $data = $request->validated();
        $data['partner_id'] = Auth::user()->partner_id;
        $this->supplierRepository->create($data);
        $redirect_path = '/new-supplier';
        if($request->page)
        {
            $redirect_path = $redirect_path."?page={$request->page}";
        }
        return redirect($redirect_path)->with(['toast' => ['message' => "Dobavljač {$request->name} dodan!", 'type' => 'success']]);
    }

    public function destroy($id, Request $request) {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        $redirect_path = $request->page ? "/new-supplier"."?page={$request->page}" : '/new-supplier';
        return redirect($redirect_path)->with(['toast' => ['message' => "Dobavljač {$supplier->name} obrisan!", 'type' => 'success']]);
    }

}
