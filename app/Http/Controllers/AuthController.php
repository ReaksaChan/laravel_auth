<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegister() {
        return view('auth.register');
    }

    public function showLogin() {
        return view('auth.login');
    }

    public function register(Request $request) {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
          ]);

          $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

          Auth::login($user);

          return redirect()->route('show.homepage');
    //     try {
    //         $validation = Validator($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|email|unique:users',
    //             'password' => 'required|string|min:8|confirmed'
    //         ]);
    //         if ($validation->fails()) {
    //             return response()->json(
    //                 [
    //                     'status' => 'error',
    //                     'msg' => $validation->getMessageBag(),
    //                     'result' => [],
    //                 ]
    //             );
    //         };


    //         $data = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => $request->password,
    //         ]);
    //         Log::debug('insertStatus: ', ['data' => $data->toArray()]);
    //         $result = [
    //             'status' => "success",
    //             'msg' => "Form submitted successfully. Yehhhhhh",
    //             'result' => []
    //         ];
    //         return response()->route('show.homepage');
    //     }
    //     catch (\Throwable $th) {
    //         return response()->json(
    //             [
    //                 'status' => 'error',
    //                 'icon' => 'error',
    //                 'msg' => 'Insert data Error!',
    //                 'result' => $th,
    //                 'data' => [],
    //             ]
    //         );
    //     }
    }

    public function login(Request $request) {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('show.login');
    }

}
