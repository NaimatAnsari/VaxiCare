<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
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
    public function edit(User $user)
    {
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request to ensure the picture is a valid file
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new picture is uploaded
        $picturePath = null;
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            // Delete the old picture from storage (if exists)
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);
            }

            // Store the new picture and get the path
            $picturePath = $request->file('picture')->store('pictures', 'public');

            // Update the picture path in the request
            $request->merge(['picture' => $picturePath]);
        }


        // Update other user data (including picture if uploaded)
        //    $user->update($request->all());

        $user->update([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password, // Password will be hashed in the model
            'address' => $request->address,
            'role' => $request->role,
            'picture' => $picturePath, // Include picture path here
        ]);

        // Redirect or return the updated view
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Check if the user has a picture and delete it from storage
        if ($user->picture) {
            Storage::disk('public')->delete($user->picture);
        }

        // Delete the user
        $user->delete();

        // Redirect to the users list with success message
        return redirect()->route('users.index');
    }
}
