<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Slider extends Component
{
    public function render()
    {
        $posttrend = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.views', 'desc')->get();
        return view('livewire.slider', [
            'trend' => $posttrend,
        ]);
    }
}
