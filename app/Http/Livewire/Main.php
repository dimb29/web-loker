<?php

namespace App\Http\Livewire;

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

class Main extends Component
{
    public $isOpen = 0;
    public $search;
    protected $queryString = ['search'];
    // public $limitPerPage = 3;
    // protected $listeners = [
    //     'post-scroll' => 'postScroll',
    // ];
    // public function postScroll(){
    //     $this->limitPerPage = $this->limitPerPage + 1;
    // }

    public function render()
    {

        $now = Carbon::now();
        $posttrend = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.views', 'desc')->get();
        
        $post = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
                        ->leftJoin('users as b','author_id','=','b.id')
                        ->orderBy('posts.id', 'desc')->get();
        // $this->emit('postStore');
        $no = 1;
        
        return view('livewire.main', [
                        'posts' => $post,
                        'trend' => $posttrend,
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
    public function countview2($id){
        dd($id);
    }
}
