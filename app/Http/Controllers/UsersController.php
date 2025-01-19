<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User ;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    // Handle picture upload
    $picturePath = null;
    if ($request->hasFile('picture')) {
        $picturePath = $request->file('picture')->store('pictures', 'public'); // Save in storage/app/public/pictures
    }

    // Save user data in the database
    User::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => $request->password, // Password will be hashed in the model
        'address' => $request->address,
        'role' => $request->role,
        'picture' => $picturePath, // Include picture path here
    ]);

    return redirect()->route('user.login')->with('success', 'User registered successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
