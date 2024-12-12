<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordFormRequest;
use Illuminate\Support\Facades\Password;

class ForgotController extends Controller
{
    public function page()
    {
        return view('View/forgot');
    }

    public function handle(ForgotPasswordFormRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['message' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


}
