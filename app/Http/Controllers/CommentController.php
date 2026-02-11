<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Notifications\AddCommentNotification;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Home $home)
    {
        //     $comments = $home->comments()->latest()->get();
        // return view('home.show', compact('home', 'comments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function commentStore(Request $request, Home $home)
    {
        $data = $request->validate([
            'comment' => 'nullable|min:20',
        ]);
        $home->comments()->create([
            'comment' => $data['comment'],
            'user_id' => auth()->id(),
            'home_id' => $home->id
        ]);
        if ($home->user_id !== auth()->id()) {
            $home->user->notify(new AddCommentNotification($home));
        }
        return redirect()->route('home.show', $home);
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
