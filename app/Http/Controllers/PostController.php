<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
//     ->toggle():
//            if ($post) {
//            $user->likedPosts()->detach($id);
//        } else {
//            $user->likedPosts()->attach($id);
//        }
    public function toggleLike(int $id)
    {
        auth()->user()?->likedPosts()->toggle($id);
        return redirect()->back();
    }

//    So bitte nicht:
//    public function toggleLike(int $id)
//    {
//        $user = auth()->user();
//        $post = $user->likedPosts()->find($id);
//
//        if ($post && !$post->pivot->deleted_at) {
//            $user
//                ->likedPosts()
//                ->updateExistingPivot($id, ['deleted_at' => Carbon::now(), 'deleted_by_user_id' => $user->id]);
//        } elseif ($post && $post->pivot->deleted_at) {
//            $user
//                ->likedPosts()
//                ->updateExistingPivot($id, ['deleted_at' => null, 'deleted_by_user_id' => null]);
//        } else {
//            $user->likedPosts()->attach($id);
//        }
//
//        return redirect()->back();
//    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $post->restore();

        return redirect()->back();
    }
}
