<?php

namespace App\Repositories;

use App\Models\Partner;
use Illuminate\Support\Collection;

class PartnerRepository {
    
    public function create(array $data) {
        $partner = Partner::create($data);
        return $partner;
    }

    public function delete($id) {
        $partner = Partner::findOrFail($id);
        $partner->delete();
    }
}