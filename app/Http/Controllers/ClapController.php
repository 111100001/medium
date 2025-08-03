<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Clap;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $hasClapped = $post->claps()->where('user_id', auth()->id())->count();
        $clapCount = $post->claps()->count();

        if ($hasClapped < 50) {
            $post->claps()->create([
                'user_id' => auth()->id()
            ]);
        }
        

        return response()->json([

            'message' => 'Clap added successfully',
            'Clapscount' => $post->claps()->count()
        ]);
    }
}
