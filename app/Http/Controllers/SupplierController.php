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
        $operator = Auth::user();
        return Inertia::render('NewSupplier')->with(['suppliers' => fn () => Supplier::where(function($query) use ($operator) {
            $query->where('visible_to_all', true)->orWhere('partner_id', $operator->partner_id);
        })->paginate(5)]);
    }

    public function store(Request $request) {
        $data = $request->validate( [
            'name' => 'required|string|max:255',
            'oib' => 'required|string|size:11',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'visible_to_all' => 'required|boolean'
        ]);

        $data['partner_id'] = Auth::user()->partner_id;
        $this->supplierRepository->create($data);
        $redirect_path = $request->page && $request->page > 1 ? "/new-supplier"."?page={$request->page}" : "/new-supplier";
        return redirect($redirect_path)->with(['toast' => ['message' => "Dobavljač {$request->name} dodan!", 'type' => 'success']]);
    }

    public function destroy(Supplier $supplier, Request $request) {
        $this->autorize('delete', $supplier);
        $supplier->delete();
        $redirect_path = $request->page && $request->page > 1 ? "/new-supplier"."?page={$request->page}" : '/new-supplier';
        return redirect($redirect_path)->with(['toast' => ['message' => "Dobavljač {$supplier->name} obrisan!", 'type' => 'success']]);
    }

}
