<?php

namespace Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupFormRequest;
use Modules\User\Contracts\RegisterContract;
use Modules\User\DTOs\NewUserDTO;

class RegistrationController extends Controller
{
    public function page()
    {
        return view('View/register');
    }

    public function handle(SignupFormRequest $request, RegisterContract $action)
    {

        $action(NewUserDTO::fromRequest($request));

        return redirect()->intended(route('index'));
    }



}
