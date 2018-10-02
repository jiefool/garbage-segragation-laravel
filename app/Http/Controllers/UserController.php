<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function store(Request $request)
    {
    	$data = request()->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'required|image'
        ]);

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->avatar = $request->file('avatar')->store('admin');
        $user->password = \Hash::make($request->password);
        $user->save();

        return redirect('administrator/list')->withSuccess('New administrator added successfully.');

    }

    public function list()
    {
    	$users = User::all();
    	return view('admin.list', compact('users'));
    }

    public function destroy($id)
    {
    	$user = User::find($id);
    	$user->delete();

    	return redirect('administrator/list')->withDelete('Administrator deleted successfully.');
    }

    public function show($id)
    {	
    	$user = User::find($id);
    	return view('admin.edit', compact('user'));
    }

    public function update(Request $request)
    {
    	$data = request()->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'avatar' => 'nullable|image'
        ]);

        $user = User::find($request->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->email = $request->email;

        if ($request->has('avatar')) {
            $user->avatar = $request->file('avatar')->store('admin');
        }

        $user->save();

        return redirect('administrator/list')->withUpdate('Administrator updated successfully.');
    }

    public function password($id)
    {
    	$user = User::find($id);
    	return view('admin.password', compact('user'));
    }

    public function passwordupdate(Request $request)
    {	

    	$user = User::find($request->id);

    	if (Hash::check($request->curpassword,$user->password)) {
    		$data = request()->validate([
	            'password' => 'required|string|min:6|confirmed',
	        ]);

    		$user->password = \Hash::make($request->password);
    		$user->save();

    		return redirect('administrator/list')->withReset('Administrator password updated successfully.');

    	}else{
    		return redirect()->back()->withInput()->withErrors([
                'curpassword' => 'Invalid password.',
            ]);

    	}
    }
}
