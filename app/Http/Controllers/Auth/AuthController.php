<?php

    namespace App\Http\Controllers\Auth;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\View\View;

    class AuthController extends Controller {

        public function authenticate(Request $request) {

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/');
            }

            return back()->onlyInput("email");
        }

        public function register(Request $request) {

            $reg_details = $request->validate([
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'min:8', 'confirmed'],
                'phone_number' => ['required'],
                'address' => ['required']
            ]);
            $reg_details["password"] = Hash::make($reg_details["password"]);

            $user = User::create($reg_details);
            Auth::login($user);

            return \view("auth.register-success");
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->intended("/login");
        }

    }
