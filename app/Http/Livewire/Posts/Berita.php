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
    public $searchjob,$locations,$kualif_lulus,$jenis_kerja;
    protected $listeners = [
        'post-data' => 'postScroll',
        'post-detail' => 'postDetail',
        'searchJobs',

    ];

    public $myid = 0;
    public function postDetail($id){
        $this->myid = $id;
    }

    public function postScroll(){
        $this->limitPerPage = $this->limitPerPage + 1;
    }
    public function searchJobs($search){
        $this->searchjob = $search[0];
        if($search[1] == null){
            $search[1] = "";
        }
        $this->locations = $search[1];
        $this->kualif_lulus = $search[2];
        $this->jenis_kerja = $search[3];
        $this->myid = "";
        // dd($search);

    }

    public function render()
    {
        $now = Carbon::now();
        
        $post = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
                        ->leftJoin('users as b','author_id','=','b.id')
                        ->where('posts.title', 'like', '%' . $this->searchjob . '%')
                        ->where('posts.location_id', 'like',$this->locations . '%')
                        ->where('posts.kualifikasilulus_id', 'like',$this->kualif_lulus . '%')
                        ->where('posts.spesialiskerja_id', 'like',$this->jenis_kerja . '%')
                        ->orderBy('posts.id', 'desc')->paginate($this->limitPerPage);
                        $this->emit('postStore');

        $no = 1;

        if($this->myid != 0){
            $post_detail = Post::with([
                'author', 
                'category', 
                'images', 
                'videos', 
                'tags', 
                'jeniskerja', 
                'kualifikasilulus',
                'pengalamankerja',
                'spesialiskerja',
                'tingkatkerja',
                ])->find($this->myid);
            // $post_detail = $post->firstorfail()->toArray();
        }else{
            $post_detail = null;
        }
        // dd($post_detail);

                        
        return view('livewire.posts.berita', [
            'posts' => $post,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'no' => $no,
            'thistime' => $now,
            'post_detail' => $post_detail,

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
