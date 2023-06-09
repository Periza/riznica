<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Repositories\SupplierRepository;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


use App\Models\Supplier;



class SupplierController extends Controller{

    private $supplierRepository;

    public function __construct(SupplierRepository $repository) {
        $this->supplierRepository = $repository;
    }

    public function create(Request $request)
    {
        $operator = Auth::user();

        return Inertia::render('Supplier/New')->with(['suppliers' => fn () => Supplier::where(function($query) use ($operator) {
            $query->where('visible_to_all', true)->orWhere('partner_id', $operator->partner_id);
        })
        ->when($request->term, function($query, $term) {
            $query->where('name', 'like', '%'.$term.'%');
        })
        ->paginate(20)]);
    }

    public function store(SupplierRequest $request) {
        $data = $request->validated();

        $data['partner_id'] = Auth::user()->partner_id;
        $this->supplierRepository->create($data);
        return redirect()->route('supplier.create', ['page' => $request->page, 'term' => $request->term])->with(['toast' => ['message' => "Dobavljač {$request->name} dodan!", 'type' => 'success']]);
        // $redirect_path = $request->page && $request->page > 1 ? "/new-supplier"."?page={$request->page}" : "/new-supplier";
        // return redirect()->route('supplier.create', $request->page && $request->page > 1 ? ['page'])->with(['toast' => ['message' => "Dobavljač {$request->name} dodan!", 'type' => 'success']]);
    }

    public function destroy(Supplier $supplier, Request $request) {
        $this->authorize('delete', $supplier);
        $supplier->delete();
        return redirect()->route('supplier.create', ['page' => $request->page, 'term' => $request->term])->with(['toast' => ['message' => "Dobavljač {$supplier->name} obrisan!", 'type' => 'success']]);
        /*
        $redirect_path = $request->page && $request->page > 1 ? "/new-supplier"."?page={$request->page}" : '/new-supplier';
        return redirect($redirect_path)->with(['toast' => ['message' => "Dobavljač {$supplier->name} obrisan!", 'type' => 'success']]);
        */
    }

    public function edit(Supplier $supplier, Request $request)
    {
        return Inertia::render('Supplier/Edit')->with(['supplier' => $supplier]);
    }

    public function update(Supplier $supplier, SupplierRequest $request) {
        $data = $request->validated();
        $data['partner_id'] = Auth::user()->partner_id;

        $supplier->update($data);
        
        return redirect()->route('supplier.edit', ['supplier' => $supplier])->with(['toast' => ['message' => "Dobavljač {$supplier->name} izmijenjen!", 'type' => 'success']]);

    }

}
