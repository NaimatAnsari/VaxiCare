<?php

namespace App\Http\Controllers;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childrens = DB::table('childrens')
        ->join('users as u', 'childrens.parent_id', '=', 'u.id') // Correct table and column
        ->select('childrens.*', 'u.fullname as parent_id') // Replace 'name' with 'full_name' or correct column name
        ->get();
    

        return view('admin.childrenDetail',compact('childrens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Children::create($request->all());
        return redirect('/childrenDashborad');
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
    public function edit(Children $children)
    {
        return view('user.editChildren', compact('children'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Children $children)
    {
        $children->update($request->all());
        return redirect()->route('children.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Children::find($id)->delete();
        return redirect()->back();
    }
}
