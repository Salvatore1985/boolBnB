<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    public function index(Gateway $gateway, Apartment $apartment, Sponsorship $sponsorship)
    {
        return view('user.sponsorships.payments', compact('apartment', 'sponsorship'));
    }

    public function transaction(OrderRequest $request, Gateway $gateway, Apartment $apartment, Sponsorship $sponsorship)
    {
        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $hours = $sponsorship->duration;
            if (count($apartment->sponsorships)) {
                $last_sponsorship = DB::table('apartment_sponsorship')->where('apartment_id', $apartment->id)->latest('expiration')->first();
                $created_at = Carbon::parse($last_sponsorship->expiration);
            } else {
                $created_at = Carbon::now('Europe/Rome');
            }
            $updated_at = Carbon::parse($created_at);
            $start_date = Carbon::parse($created_at);
            $expiration = Carbon::parse($created_at);
            $expiration->addHours($hours);
            $apartment->sponsorships()->attach($sponsorship->id, [
                'created_at' => $created_at,
                'updated_at' => $updated_at,
                'start_date' => $start_date,
                'expiration' => $expiration,
            ]);
            return redirect()->route('admin.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione pagata con successo')->with('alert-type', 'success');
        } else {
            return redirect()->route('admin.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione fallita')->with('alert-type', 'danger');
        }
    }
    public function make(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $status = Braintree\Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
            'submitForSettlement' => True
            ]
        ]);
        return response()->json($status);
    }
}
