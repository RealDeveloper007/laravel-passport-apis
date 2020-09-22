<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class UserController extends APIController
{
    /**
     * user details by token.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $UserDetails = User::where('id',Auth::User()->id)->first();
        return $this->respond([
            'status'     => true,
            'message'   => 'User Deatils',
            'data'      => $UserDetails
        ]);
    }

   
   
}
