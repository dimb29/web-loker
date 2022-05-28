<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;



class Berita extends Component
{ use WithPagination;
    use WithFileUploads;

    public $title, $content, $category, $post_id;
    public $tagids = array();
    public $photos = [];
    public $isOpen = 0;
    public $limitPerPage = 3;
    protected $listeners = [
        'post-data' => 'postScroll',
    ];

    public function postScroll(){
        $this->limitPerPage = $this->limitPerPage + 1;
    }

    public function render()
    {
        $now = Carbon::now();
        
        $post = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
                        ->leftJoin('users as b','author_id','=','b.id')
                        ->orderBy('posts.id', 'desc')->paginate($this->limitPerPage);
                        $this->emit('postStore');

        $no = 1;

                        
        return view('livewire.posts.berita', [
            'posts' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'no' => $no,
            'thistime' => $now,
        ]);
    }
    public function countview($id)
    {
        $getdata = Post::select('views')
                        ->where('id', $id)
                        ->firstorfail()->toArray();
        $count = $getdata['views'] + '1';

        Post::where('id', $id)->update(['views' => $count]);
    }

}
