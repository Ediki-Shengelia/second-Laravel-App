<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AllHome = \App\Models\Home::all();
        return view('home.index', compact('AllHome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $owner = \App\Models\Home::$owner;
        $types = Home::$type;
        return view('home.create', compact('owner', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        if ($request->hasFile('home_image')) {
            $data['home_image'] = $request->file('home_image')
                ->store('homes', 'public');
        }
        \App\Models\Home::create($data);
        return redirect()->route('home.index')->with('success', "YOUR post is added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        $this->authorize('view', $home);
        return view('home.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        $this->authorize('update', $home);
        return view('home.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        $this->authorize('update', $home);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        $home->delete();
        $this->authorize('delete', $home);
        return redirect()->route('home.index')->with('success', "your post about HOME is deleted");
    }
}
