<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Http\Requests\StorePartnerRequest;
use App\Repositories\PartnerRepository;
use App\Models\Partner;
use Illuminate\Routing\Controller as BaseController;

class PartnerController extends BaseController
{
    private $partnerRepository;

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

        return Inertia::render('NewPartner')->with(['toast' => ['message' => "Partner {$request['naziv']} dodan!", 'type' => 'success']]);
    }


    public function destroy($id) {
        $partner = Partner::find($id);
        $this->partnerRepository->delete($partner->id);
        return redirect('/new-partner')->with(['toast' => ['message' => "Partner {$partner->naziv} obrisan!", 'type' => 'success']]);
    }
}
