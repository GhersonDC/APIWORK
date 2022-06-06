<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'nombre' => 'required',
            'email' => 'required|email',
            'rfc' => 'required',
            'direccion'=> 'required',
            'telefono'=> 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',

        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['nombre'] = $user->nombre;
        $success['clientid'] = $user->clientid;
        $success['rfc'] = $user->rfc;
        $success['direccion'] = $user->direccion;
        $success['telefono'] = $user->telefono;

        return $this->sendResponse($success, 'Cliente creado satisfactoriamente.');

    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            $success['nombre'] = $user->nombre;
            $success['clientid'] = $user->clientid;
            $success['rfc'] = $user->rfc;
            $success['direccion'] = $user->direccion;
            $success['telefono'] = $user->telefono;

            return $this->sendResponse($success, 'Login de Cliente correcto.');

        } else {

            return $this->sendError('No autorizado.', ['error' => 'No autorizado, compruebe el token, email y password.']);

        }

    }

}
