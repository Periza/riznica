<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use App\Models\Partner;
use App\Models\Operator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Requests\OperatorRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Routing\Controller as BaseController;


class OperatorController extends BaseController
{
    public function create() {
        return Inertia::render('Operator/New')->with(['partners' => Partner::all()]);
    }

    public function store(OperatorRequest $request) {
        $data = $request->validated();

        $password = Str::random(8);
        // Random 8-char password
        $data['password'] = bcrypt($password);
        // Create an operator
        $operator = Operator::create($data);

        Mail::to($operator->email)->send(new MyEmail($password));

    }


}
