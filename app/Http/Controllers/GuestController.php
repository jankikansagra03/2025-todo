<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function view;
use function redirect;
use App\Models\Registrations;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountCreatedMail;
use App\Models\PasswordToken;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Validator;



class GuestController extends Controller
{

    //
    public function home()
    {
        // session()->put('user', 'xyz');
        // session()->put('admin', 'xyz');
        // session()->remove('user');
        // session()->remove('admin');
        return view('index');
    }

    public function login()
    {
        // session()->remove('user');
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }
    public function register_action(Request $request)
    {

        $rules = [
            'fname' => 'required',
            'email' => 'required|email|unique:registration,email',
            'password' => 'required|min:8|max:25|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,25}$/',
            'confirm_password' => 'required|same:password',
            'gender' => 'required',
            'mobile' => 'required|regex:/^[0-9]{10}+$/',
            'profile_picture' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'edu' => 'required',
        ];
        $messages = [
            'fname.required' => 'Full Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.unique' => 'Email is already registered',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'password.max' => 'Password must be less than 25 characters',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character',
            'confirm_password.required' => 'Confirm Password is required',
            'confirm_password.same' => 'Password and Confirm Password must match',
            'gender.required' => 'Gender is required',
            'mobile.required' => 'Mobile Number is required',
            'mobile.regex' => 'Mobile Number must be a valid 10 digit number',
            'profile_picture.required' => 'Profile Picture is required',
            'profile_picture.mimes' => 'Profile Picture must be a file of type: jpeg, png, jpg, gif',
            'profile_picture.max' => 'Profile Picture must be less than 2MB',
            'edu.required' => 'Educational Qualification is required',
        ];
        $validatedData = $request->validate($rules, $messages);
        if (!$validatedData) {
            return redirect()->route('signup')->withErrors($validatedData)->withInput();
        } else {
            $register = new Registrations();
            $register->fname = $request->fname;
            $register->email = $request->email;
            $register->password = $request->password;
            $register->mobile = $request->mobile;
            $register->gender = $request->gender;
            $edu = $request->input('edu');
            $register->edu = implode(',', $edu);
            $profile_pic = uniqid() . $request->profile_picture->getClientOriginalName();
            $register->file = $profile_pic;
            $register->token = uniqid() . time();
            $request->profile_picture->move('images/profile_pictures/', $profile_pic);
            $data = array('name' => $request->fname, 'email' => $request->email, 'gender' => $request->gender, 'token' => $register->token);
            Mail::Send(['text' => 'create_account_email'], ["data1" => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name']);
                $message->from("kansagrajanki@gmail.com", "Janki Kansagra");
            });

            if ($register->save()) {
                session()->flash('success', 'Registration Successful');
                return redirect()->route('signin');
            } else {
                session()->flash('error', 'Registration Failed');
                return redirect()->route('signup');
            }
        }
    }

    public function verifyAccount($email, $token)
    {
        $register = Registrations::where('email', $email)->where('token', $token)->first();
        if ($register) {
            $register->status = 'Active';
            $register->token = '';
            if ($register->save()) {
                session()->flash('success', 'Account Verified Successfully');
                return redirect()->route('signin');
            } else {
                session()->flash('error', 'Account Verification Failed');
                return redirect()->route('signup');
            }
        } else {
            session()->flash('error', 'Invalid Verification Request');
            return redirect()->route('signup');
        }
    }

    public function loginAuth(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
        ]);
        if (!$validatedData) {
            return redirect()->route('signin')->withErrors($validatedData)->withInput();
        } else {
            $register = Registrations::where('email', $request->email)->where('password', $request->password)->first();
            if ($register) {
                if ($register->status == 'Inactive') {
                    session()->flash('error', 'Account is not verified');
                    return redirect()->route('signin');
                } else {
                    if ($register->role == 'Admin') {
                        session()->put('admin', $register['email']);
                        session()->flash('success', 'Login successful');
                        return redirect()->route('adminDashboard');
                    } else {
                        session()->put('user', $register['email']);
                        session()->put('username', $register['fname']);
                        session()->flash('success', 'Login successful');
                        return redirect()->route('userDashboard');
                    }
                }
            } else {
                session()->flash('error', 'Invalid Email or Password');
                return redirect()->route('signin');
            }
        }
    }
}
