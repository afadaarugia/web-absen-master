<?php

namespace App\Http\Controllers\API;

use App\Models\FotoRecognition;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class AuthAPIController extends AppBaseController
{
    //
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['nik', 'password']);
	    if (! $token = auth('api')->attempt($credentials)) {

        return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->sendResponse([
            'token'=>$token,
            'expires' =>auth('api')->factory()->getTTL() * 360,
            'user' => auth('api')->user(),
            'detail' => Karyawan::with('namePosisions','agamas','golDarahs','pendidikans','units','statuses','sektor','banks')->where('users_id',auth('api')->user()->id)->get()->first(),
            'path' => FotoRecognition::where('users_id',auth('api')->user()->id)->first()


        ],'Authentication Success');
    }

    public function me()
    {
	    return response()->json(auth('api')->user());
    }

    public function logout()
    {
	    auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
	{
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 360
	    ]);
    }
}
