<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\LikeNotification;

class LikeController extends Controller
{
    public function toggleLikeFunc(Request $request, \App\Models\Home $home)
    {
        $like = \App\Models\Like::where('user_id', auth()->id())
            ->where('home_id', $home->id)
            ->first();
        if ($like) {
            $like->delete();
        } else {
            \App\Models\Like::create([
                'user_id' => auth()->id(),
                'home_id' => $home->id
            ]);
            if ($home->user_id !== auth()->id()) {
            $home->user->notify(new LikeNotification($home));
            }
        }
        return back();
    }
}
