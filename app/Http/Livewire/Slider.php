<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Carbon\Carbon;

class Slider extends Component
{



    public function render()
    {
        $posttrend = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
                        ->leftJoin('users as b','author_id','=','b.id')
                        ->orderBy('posts.views', 'desc')->get();
        $now = Carbon::now();



        return view('livewire.slider', [
            'trend' => $posttrend,
            'thistime' => $now,
        ]);
    }
}
 