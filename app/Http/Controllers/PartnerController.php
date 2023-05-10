<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Repositories\PartnerRepository;
use App\Models\Partner;

class PartnerController extends Controller
{
    private $partnerRepositry;

    public function __construct(PartnerRepository $repository) {
        $this->partnerRepository = $repository;
    }
    // Form for creating a new partner
    public function create() {
        return Inertia::render('NewPartner');
    }
    
    // Create and store a new partner in the database
    public function store(StorePartnerRequest $request) {
        $data = $request->validated();
        $partner = $this->partnerRepository->create($data);
        return Inertia::render('NewPartner')->with(['message' => 'partner dodan']);;
    }

    
    public function destroy($id) {
        $this->partnerRepository->delete($id);
    }
}
