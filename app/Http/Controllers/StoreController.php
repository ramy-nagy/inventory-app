<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;

class StoreController extends Controller
{
    public function store_two_factor(Request $request)
    {
        Validator::make($request->all(), [
            'store' => ['required', 'exists:stores,id'],
            'passcode' => ['required', 'numeric']
        ])->validate();

        $admin_two_factor_secret =  User::whereId(1)->first('two_factor_secret')->two_factor_secret;
        $store_passcode =   Store::whereId($request->store)->firstOrFail('passcode')->passcode;
        $verfi_passcode =
            tap(app(TwoFactorAuthenticationProvider::class)
                ->verify(decrypt($admin_two_factor_secret), $request->passcode), function ($result) {
                return $result;
            });
        if ($verfi_passcode || $request->passcode == $store_passcode) {
            return redirect()->route('frontend.dashboard', [$request->store, $request->passcode]);
        } else {
            return redirect()->back()->withErrors("Wrong Passcode");
        }
    }
}
