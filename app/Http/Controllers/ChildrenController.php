<?php

namespace App\Http\Controllers;
use App\Models\Children;
use Illuminate\Http\Request;

class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childrens = Children::all();
        return view('user.children',compact('childrens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.addChildren');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Children::create($request->all());
        return redirect()->route('children.index');
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
    public function destroy(string $id)
    {
        Children::find($id)->delete();
        return redirect()->route('children.index');
    }
}
