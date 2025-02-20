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
        return view('admin.add-user');
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
            'phone_number'=> $request->phone_number,
            'picture' => $picturePath, // Include picture path here
        ]);

        session()->flash('success', 'User registered successfully.');
        return redirect()->back();
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


        $user = User::find($user->id);

        if ($request->file('picture')) {
            // Delete old picture if exists
            if ($user->picture) {
                Storage::disk('public')->delete($user->picture);  // Delete old picture from storage
            }
        
            // Store new picture
            $picturePath = $request->file('picture')->store('picture', 'public');
            $user->picture = $picturePath;
        }

        $user->fullname =  $request->fullname;
        $user->fullname = $request->fullname;
            $user->email = $request->email;

            if ($request->filled('password')) {
                $user->password = $request->password;
            } 
            
            $user->address = $request->address;
            $user->role = $request->role;
            $user->phone_number= $request->phone_number;
            $user->save();
                        
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
