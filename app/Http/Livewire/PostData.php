<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class PostData extends Component
{
    public $limitPerPage = 3;
    protected $listeners = [
        'post-scroll' => 'postScroll',
    ];

    public function postScroll(){
        $this->limitPerPage = $this->limitPerPage + 1;
    }
    public function render()
    {
        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
                        ->leftJoin('users as b','author_id','=','b.id')
                        ->orderBy('posts.id', 'desc')->paginate($this->limitPerPage);
                        $now = Carbon::now();
        return view('livewire.post-data', [
            'posts' => $posts,
            'thistime' =>$now,
        ]);
    }
}
