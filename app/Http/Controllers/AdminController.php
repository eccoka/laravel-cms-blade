<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showRegForm()
    {
        $roles = DB::table('users')
                    ->select('role')
                    ->distinct()
                    ->get();

        return view('admin.regform', ['roles' => $roles]);
    }
    public function showUsers(Request $request): View
    {
        $user = User::where('status', 'active')
            ->where('role', '<>', 'admin')
            ->orderBy('username', 'asc') // -- rendezést lehessen változtatni, ne hardkódolva legyen.
            ->get();

        $roles = DB::table('users')
            ->select('role')
            ->distinct()
            ->get();

        $statuses = DB::table('users')
            ->select('status')
            ->distinct()
            ->get();

        return view('admin.userdata', ['users' => $user, 'roles' => $roles, 'statuses' => $statuses]);
    }

    public function storeUser(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'newsletter' => 0,
            'status' => 'active',
            'role' => $request->role,
        ]);

           event(new Registered($user));
//
//        Auth::login($user);

        // ide kell majd vmi message-es oldal
        return redirect()->intended('admin/regform')->with('message', 'User Stored!');
    }

    public function updateUsers(Request $request): RedirectResponse
    {
        $saveData = '';
        if (!$request->password) {
            $saveData = [
                "username" => $request->username,
                "role" => $request->role,
                "status" => $request->status
            ];
        }
        else {
            $saveData = [
                "username" => $request->username,
                "role" => $request->role,
                "status" => $request->status,
                "password" => Hash::make($request->password),
            ];
        }

        DB::table('users')->where('id', $request->id )->update($saveData);

        return redirect()->intended('admin/userdata')->with('message', 'Updated ' . $request->username . ' ' . $request->role);
    }

}
