<?php

namespace App\Repositories;

use App\Models\Supplier;
use Illuminate\Support\Collection;

class SupplierRepository {
    
    public function create(array $data) {
        // dd($data);
        $supplier = Supplier::create($data);
        return $supplier;
    }

    public function delete($id) {

    }
}