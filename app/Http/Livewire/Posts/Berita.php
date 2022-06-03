<?php

namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Image;
use App\Models\Regency;
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
    public $searchjob,$kualif_lulus,$jenis_kerja;
    public $sj_split,$loc_split,$kl_split,$jk_split;
    public $locations = "";
    // public $posts;
    protected $listeners = [
        'post-data' => 'postScroll',
        'post-detail' => 'postDetail',
        'searchJobs',

    ];

    public $myid = 0;
    public function postDetail($id){
        $this->myid = $id;
        // dd($id);
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
        // dd($this->locations);

    }

    public function mount($id){
        $split = explode('&', $id);
        $sj_split = str_replace('+',' ',explode('=', $split[0]));
        $loc_split = str_replace('+',' ',explode('=', $split[1]));
        $kl_split = str_replace('+',' ',explode('=', $split[2]));
        $jk_split = str_replace('+',' ',explode('=', $split[3]));
        // dd($sj_split);
        if($sj_split[1] != '' || $loc_split[1] != '' || $kl_split[1] != '' || $jk_split[1] != ''){
            if($this->searchjob != '' || $this->locations != '' || $this->kualif_lulus != '' || $this->jenis_kerja != ''){

            }else{
                $this->searchjob = $sj_split[1];
                $this->locations = $loc_split[1];
                $this->kualif_lulus = $kl_split[1];
                $this->jenis_kerja = $jk_split[1];
            }
        }
    } 

    public function render()
    {
        $now = Carbon::now();
        $regency = Regency::where('name', 'like',$this->locations . '%')->first();
        // dd($this->kualif_lulus);
        if($this->locations == ""){
            $posts = Post::leftJoin('images','posts.id', 'images.post_id')
                            ->leftJoin('regencies', 'posts.location_id', 'regencies.id')
                            ->where('posts.title', 'like', '%' . $this->searchjob . '%')
                            ->where('posts.kualifikasilulus_id', 'like',$this->kualif_lulus . '%')
                            ->where('posts.jeniskerja_id', 'like',$this->jenis_kerja . '%')
                            ->orderBy('posts.id', 'desc')->paginate($this->limitPerPage);
                            $this->emit('postStore');
        }else{
            $posts = Post::leftJoin('images','posts.id', 'images.post_id')
                            ->leftJoin('regencies', 'posts.location_id', 'regencies.id')
                            ->where('posts.title', 'like', '%' . $this->searchjob . '%')
                            ->where('posts.location_id', 'like',$regency->id . '%')
                            ->where('posts.kualifikasilulus_id', 'like',$this->kualif_lulus . '%')
                            ->where('posts.jeniskerja_id', 'like',$this->jenis_kerja . '%')
                            ->orderBy('posts.id', 'desc')->paginate($this->limitPerPage);
                            $this->emit('postStore');
        }
// dd($post);
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
            'posts' => $posts,
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
