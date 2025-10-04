<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\UserProfile;
class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function processStep1(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role' => 'required',
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);


        if ($formFields['role'] === '1') {

            // For company users, complete registration immediately
            $user = User::create($formFields);
            auth()->login($user);
            return redirect('/employer')->with('message', 'User created and logged in');
        } elseif ($formFields['role'] === '2') {
              // Store data in session and redirect to step 2
            session(['register_data' => $formFields]);
            return redirect('/register-step-2');
        }

          session(['register_data' => $formFields]);
            return redirect('/register-step-2');

        // Create User
       // $user = User::create($formFields);

        // Login
       // auth()->login($user);

       // return redirect('/')->with('message', 'User created and logged in');
    }
// Step 2: Show extra fields based on role
public function showStep2() {
    $role = session('register_data.role');
    return view('users.register-step2', compact('role'));
}
// Step 2: Complete registration
public function processStep2(Request $request) {
    $extra = $request->validate([
         'country' => 'required',
        'city' => 'required',
        'nationality' => 'required',
        'education_level' => 'required',
        'birthdate' => 'required',
    ]);
    // Retrieve data from step 1
       $data = session('register_data', []);
    if (empty($data)) {
        return redirect('/register')->withErrors(['message' => 'يرجى إكمال الخطوة الأولى من التسجيل']);
    }
    // Merge and create user
   //$user = User::create(array_merge($data, $extra));
        $user = User::create($data);
        $extra['user_id'] = $user->id;
        UserProfile::create($extra);

    session()->forget('register_data');
    // Redirect or login user

     auth()->login($user);

    return redirect('/')->with('message', 'User created and logged in');
}
    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if(auth()->user()->role === 1){
                return redirect('/employer')->with('message', 'تم تسجيل الدخول بنجاح!');
            }else{
                return redirect('/')->with('message', 'تم تسجيل الدخول بنجاح!');
            }

        }

        return back()->withErrors(['email' => 'البيانات المدخله غير صحيحه'])->onlyInput('email');
    }
}
