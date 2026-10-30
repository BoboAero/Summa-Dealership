<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ucname($input){
        $output = "";
        $exceptions = array("van", "der", "den");
        $input = strtolower($input);
        foreach(explode(" ", $input) as $key => $word){
            $output .= (($word == $word[0]) ? "" : " ") . ((!in_array($word, $exceptions)) ? ucfirst($word) : $word);

        }
        return $output;
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('dashboard.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'role' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $this->ucname($request->name),
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'role_id' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return(redirect(route('users.index')));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'integer'],
        ]);

        $user->name = $this->ucname($request->name);

        $user->email = strtolower($request->email);
        $user->username = strtolower($request->username);
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->save();
        return(redirect(route('users.index')));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return(redirect(route('users.index')));
    }


}
