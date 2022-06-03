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
    public $limitPerPage = 3;
    protected $listeners = [
        'post-data' => 'postScroll',
        'post-detail' => 'postDetail',
    ];
    public function postScroll(){
        $this->limitPerPage = $this->limitPerPage + 1;
    }

    public $searchjob,$locations,$kualif_lulus,$jenis_kerja;
    public $myid = 0;
    public function postDetail($id){
        $this->myid = $id;
    }

    public function searchJobs(){
        // $this->postjob = $postjob;
        $emit = $this->emit('searchJobs', [$this->searchjob,$this->locations,$this->kualif_lulus,$this->jenis_kerja]);
        // $emit = $this->emit('searchJobs', [$this->locations]);
        // dd($emit);
        $return = redirect("/dashboard/berita/sj_send=$this->searchjob&loc_send=$this->locations&kl_send=$this->kualif_lulus&jk_send=$this->jenis_kerja");
        // dd($return);
        return $return;
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
        
        return view('livewire.main', [
                        'posts' => $post,
                        'no' => $no,
                        'thistime' => $now,
                        'post_detail' => $post_detail,

                    ]);
    }
    // public function scrollPost($id){
        
    //     if($id !== null){
    //         $post = Post::join('images', 'posts.id', '=', 'images.post_id')
    //                         ->where('posts.id', '=', $id)
    //                         ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at')
    //                         ->leftJoin('users as b','author_id','=','b.id')
    //                         ->orderBy('posts.id', 'desc')->first();
    //     }
    //     return view('livewire.main', [
    //                     'post_detail' => $post,
    //                 ]);
    // }

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
