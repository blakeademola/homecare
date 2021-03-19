<?php

namespace App\Http\Controllers\Auth;

use App\Eloquent\Interfaces\UserInterface;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        return view('pages.auth.register');
    }

    public function registerUser(RegisterRequest $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'USER'
        ];

        $user = $this->user->createUser($data);
        if ($user) {
            return redirect()->to(route('login'))->with('success', 'Registered Successfully');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
