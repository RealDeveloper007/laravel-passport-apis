<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends APIController
{
    /**
     * Log the user in.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:4',
        ]);

        if ($validation->fails()) {
            return $this->throwValidation($validation->messages()->all());
        }

        $credentials = $request->only(['email', 'password']);

        try {
            if (!Auth::attempt($credentials)) {
                return $this->throwValidation('Invaild Credentials');
            }
            
            // else {
            //     $UserDetails = User::where('email',$request->email)->first();
            //     if($UserDetails->status==0 && $UserDetails->confirmed==0)
            //     {
            //         return $this->throwValidation(trans('api.messages.login.not-active'));
            //     }
            // }

            $user = $request->user();

            $passportToken = $user->createToken("{{env('APP_NAME')}}");

            // Save generated token
            $passportToken->token->save();

            $token = $passportToken->accessToken;
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        $UserUpdateDetails = User::where('email',$request->email)->first();
        $UserUpdateDetails->save();

        $UserDetails = User::where('email',$request->email)->first();
        $UserDetails->token = $token;
        return $this->respond([
            'status'      => true,
            'message'   => 'Login Successfully',
            'data'      => $UserDetails
        ]);
    }

   
    public function accountConformation(Request $request)
    {
        $user_data = User::where('id',$request->user_id)->first();
        $user_data->status    = 1;
        $user_data->confirmed = 1;
        if($user_data->save()) 
        {
            return response()->json([
                'status' => true,
                'message' => trans('api.messages.confirm.active'),
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => trans('api.messages.confirm.in-active'),
            ]);
        }
     }

    


      /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }
    

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {  
         try {
            $request->user()->token()->revoke();
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respond([
            'status'    => true,
            'message'   => 'Logout Successfully!',
        ]); 

    }
}
