<?php



namespace App\Http\Livewire\Posts;




use App\Models\Image;

use App\Models\Regency;

use App\Models\Post;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Livewire\Component;

use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Carbon\Carbon;

use Illuminate\Http\Request;







class Berita extends Component

{ use WithPagination;

    use WithFileUploads;



    public $title, $content, $post_id;

    public $photos = [];

    public $isOpen = 0;

    public $limitPerPage = 3;

    public $searchjob,$kualif_lulus,$jenis_kerja,$spes_kerja,$peng_kerja,$ting_kerja;

    public $minrange,$maxrange;

    public $sj_split,$loc_split,$kl_split,$jk_split;

    public $locations = "";

    // public $posts;

    protected $listeners = [

        // 'post-data' => 'postScroll',

        'post-detail' => 'postDetail',

        'searchJobs', 'nextPage'



    ];



    public $myid = 0;

    public function postDetail($id){

        $this->myid = $id;

        // dd($id);

    }



    // public function postScroll(){

    //     $this->limitPerPage = $this->limitPerPage + 1;

    // }

    public function searchJobs($search){

        $this->searchjob = $search[0];
        $this->resetPage();

        if($search[1] == null){

            $search[1] = "";

        }

        $this->locations = $search[1];

        $this->kualif_lulus = $search[2];

        $this->jenis_kerja = $search[3];

        $this->minrange = $search[4];

        $this->maxrange = $search[5];

        $this->myid = "";

        // dd($search);

        // dd($this->locations);



    }



    public function mount(Request $id){

        $split = explode('&', $id);

        // dd($split);

        if(count($split) > 1){

            $sj_split = str_replace('+',' ',explode('=', $split[0]));

            $loc_split = str_replace('+',' ',explode('=', $split[1]));

            $kl_split = str_replace('+',' ',explode('=', $split[2]));

            $jk_split = str_replace('+',' ',explode('=', $split[3]));

            $minr_split = str_replace('+',' ',explode('=', $split[4]));

            $maxr_split = str_replace('+',' ',explode('=', $split[5]));


            if($loc_split[1] != null){
            
                $regencies = Regency::where('name', 'like','%' . $loc_split[1] . '%')->first();
                $regency_split = $regencies;
            
            }else{
            
                $regency_split = "";
            
            }
            

            // dd($regencies);

            if($sj_split[1] != '' || $loc_split[1] != '' || $kl_split[1] != '' || $jk_split[1] != '' || $maxr_split[1] != '' || $minr_split[1] != ''){

                if($this->searchjob != '' || $this->locations != '' || $this->kualif_lulus != '' || $this->jenis_kerja != '' || $this->maxrange != '' || $this->minrange != ''){

    

                }else{

                    $this->searchjob = $sj_split[1];

                    $this->locations = $regency_split;

                    $this->kualif_lulus = $kl_split[1];

                    $this->jenis_kerja = $jk_split[1];

                    $this->minrange = $minr_split[1];

                    $this->maxrange = $maxr_split[1];

                }
                // dd($this->locations);

            }

        }elseif(count($split) == 1){

            $fil_split = str_replace('+',' ',explode('=', $split[0]));

            // dd($fil_split[0]);

            if($fil_split[0] == 'sj_send'){

                $this->searchjob = $fil_split[1];

            }elseif($fil_split[0] == 'jk_send'){

                $this->jenis_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'loc_send'){

                $this->locations = $fil_split[1];

            }elseif($fil_split[0] == 'kl_send'){

                $this->kualif_lulus = $fil_split[1];

            }elseif($fil_split[0] == 'pk_send'){

                $this->peng_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'sk_send'){

                $this->spes_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'tk_send'){

                $this->ting_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'minrange'){

                $this->minrange = $fil_split[1];

            }elseif($fil_split[0] == 'maxrange'){

                $this->maxrange = $fil_split[1];

            }

        }

    } 



    public function render()

    {
        $now = Carbon::now();
        // dd($this->locations);
        // $regency = Regency::where('name', 'like',$this->locations->name . '%')->first();
        // dd($regency);
            $posts = Post::search($this->searchjob);
            $posts->query(function($builders){
                $builders->with('postTitles','regency','jeniskerja','kualifikasilulus','pengalamankerja','spesialiskerja','tingkatkerja');
            });
            if($this->locations != null){
                // if(strlen($regency->id) > 2){
                //     $posts->where('location_id',$regency->id);
                // }else{
                //     $posts->where('province_id',$regency->id);
                // }
                $posts->query(function ($builder) {
                    $builder->whereHas('regency',function($query){
                        $query->where('id',$this->locations->id);
                    });
                });
            }
            if($this->jenis_kerja != null){
                // $posts->where('jeniskerja_id',$this->jenis_kerja);
                $posts->query(function ($builder) {
                    $builder->whereHas('jeniskerja',function($query){
                        $query->where('id',$this->jenis_kerja);
                    });
                });
            }
            // dd($this->kualif_lulus);
            if($this->kualif_lulus != null){
                $pusing = $posts->query(function ($builder) {
                    $builder->whereHas('kualifikasilulus',function($query){
                        $query->where('id',$this->kualif_lulus);
                    });
                });
            }
            if($this->peng_kerja != null){
                // $posts->where('pengalamankerja_id',$this->peng_kerja);
                $posts->query(function ($builder) {
                    $builder->whereHas('pengalamankerja',function($query){
                        $query->where('id',$this->peng_kerja);
                    });
                });
            }
            if($this->spes_kerja != null){
                // $posts->where('spesialiskerja_id',$this->spes_kerja);
                $posts->query(function ($builder) {
                    $builder->whereHas('spesialiskerja',function($query){
                        $query->where('id',$this->spes_kerja);
                    });
                });
            }
            if($this->ting_kerja != null){
                // $posts->where('tingkatkerja_id',$this->ting_kerja);
                $posts->query(function ($builder) {
                    $builder->whereHas('tingkatkerja',function($query){
                        $query->where('id',$this->ting_kerja);
                    });
                });
            }
            if($this->minrange != null){
                $posts->where('salary_start','>=',$this->minrange);
            }
            if($this->maxrange != null){
                $posts->where('salary_end','<=',$this->maxrange);
            }
            $post = $posts->simplePaginate(3);
            // $users = Post::search()->query(function ($builder) {
            //     $builder->whereHas('kualifikasilulus',function($query){
            //         $query->where('id',$this->kualif_lulus);
            //     });
            // })->get();
            // dd($post);
// dd($posts);

        $no = 1;



        if($this->myid != 0){

            $post_detail = Post::with([

                'author', 

                'images', 

                'videos', 

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

        $jobsave = Post::rightJoin('post_save', 'posts.id', 'post_save.post_id')->get();

        // dd($jobsave);



                        

        return view('livewire.posts.berita', [

            'posts' => $post,

            'no' => $no,

            'thistime' => $now,

            'post_detail' => $post_detail,

            'simpan_job' => $jobsave,



        ]);

    }



    public function saveJob($id){

        DB::table('post_save')->insert([

            'user_id' => Auth::user()->id,

            'post_id' => $id,

            'created_at' => now(),

            'updated_at' => now(),

        ]);

    }



    public function delSaveJob($id){

        DB::table('post_save')->where('post_id', $id)->delete();

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

