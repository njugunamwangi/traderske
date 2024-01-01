<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AccountBalance;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()
                ->withMessage([
                    'msg'=>'The paystack token has expired. Please refresh the page and try again.',
                    'type'=>'error'
                ]);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $data = $paymentDetails['data'];

        if($data['status'] == 'success') {

            $model = AccountBalance::query()
                ->where('user_id', '=', auth()->user()->id)
                ->first();

            if(!$model) {
                AccountBalance::create([
                    'user_id' => auth()->user()->id,
                    'amount' => $data['amount'] / 100
                ]);
            } else {
                $model->increment('amount', $data['amount'] / 100);
            }

            return redirect()->to('history');
        }
    }
}
