<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// khai báo sử dụng loginRequest
use App\Http\Requests\LoginRequest;
use Auth;
use App\Models\Users;
class AdminLoginController extends Controller
{

    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return view('admin.dashboard');
        } else {
            return view('admin.login');
        }

    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'level' => 1,
            'status' => 1
        ];
        if (Auth::attempt($login)) {
            return redirect('admincp');
        } else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
        }
    }

    /**
     * action admincp/logout
     * @return RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
//        return view('admin.login');
        return redirect()->route('getLogin');
    }

    public function postRegister(Request $request) {
//        $username = $request['username'];
//        $email = $request['email'];
//        $password = bcrypt($request['password']);
        $username = "Director Tu";
        $email = "nguyentu.cnpm@gmail.com";
        $password = bcrypt("MrTu1992");

        $user = new Users();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();
        return "Register done!";

//        return redirect()->route('login');
    }

}