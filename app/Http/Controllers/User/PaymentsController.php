<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;

class PaymentsController extends Controller
{
    public function index(Gateway $gateway, Apartment $apartment, Sponsorship $sponsorship)
    {
        return view('user.payments', compact('apartment', 'sponsorship'));
    }
}
