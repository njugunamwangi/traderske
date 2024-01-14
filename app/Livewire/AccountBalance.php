<?php

namespace App\Livewire;

use App\Models\AccountBalance as ModelsAccountBalance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AccountBalance extends Component
{
    public function render()
    {
        if(Auth::check()) {
            $model = ModelsAccountBalance::query()
                ->where('user_id', '=', auth()->user()->id)
                ->first();

            if($model) {
                $account_balance = $model->amount;
            } else {
                $account_balance = 0;
            }
        }

        return view('livewire.account-balance', compact('account_balance'));
    }
}
