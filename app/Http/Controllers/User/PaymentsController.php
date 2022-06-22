<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentsController extends Controller
{
    public function index(Apartment $apartment, Sponsorship $sponsorship)
    {

        return view('user.payments', compact('apartment', 'sponsorship'));
    }

    public function transaction(Request $request,Apartment $apartment, $id)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $sponsorship = Sponsorship::findOrFail($id);

        $result = $gateway->transaction()->sale([
            'amount' => $sponsorship->price,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $hours = $sponsorship->period;
            if (count($apartment->sponsorships)) {
                $last_sponsorship = DB::table('apartment_sponsorship')->where('apartment_id', $apartment->id)->latest('expiration')->first();
                $created_at = Carbon::parse($last_sponsorship->expiration);
            } else {
                $created_at = Carbon::now('Europe/Rome');
            }
            //$updated_at = Carbon::parse($created_at);
            $start_date = Carbon::parse($created_at);
            $expiration = Carbon::parse($created_at);
            $expiration->addHours($hours);
            $apartment->sponsorships()->attach($sponsorship->id, [
                //'created_at' => $created_at,
                //'updated_at' => $updated_at,
                'start_date' => $start_date,
                'end_date' => $expiration,
            ]);
            return redirect()->route('user.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione pagata con successo')->with('alert-type', 'success');
        } else {
            return redirect()->route('user.apartments.show', $apartment->id)->with('alert-message', 'Sponsorizzazione fallita')->with('alert-type', 'danger');
        }
    }
}
