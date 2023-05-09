<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Repositories\PartnerRepository;

class PartnerController extends Controller
{
    private $partnerRepositry;

    public function __construct(PartnerRepository $repository) {
        $this->partnerRepository = $repository;
    }
    // Create a new partner
    public function create() {
        return Inertia::render('NewPartner');
    }

    public function store(StorePartnerRequest $request) {
        $data = $request->validated();
        $partner = $this->partnerRepository->create($data);
        return Inertia::render('NewPartner');
    }
}
