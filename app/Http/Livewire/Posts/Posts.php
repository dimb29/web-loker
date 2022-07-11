<?php
namespace App\Http\Livewire\Posts;

use App\Models\Image;
use App\Models\Post;
use App\Models\JenisKerja;
use App\Models\Regency;
use App\Models\KualifikasiLulus;
use App\Models\PengalamanKerja;
use App\Models\SpesialisKerja;
use App\Models\TingkatKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;


class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $content, $post_id, $views, $email, $wa, $minrange, $maxrange;
    public $location, $jenker, $kualif, $pengkerja, $spesialis, $tingker, $checkgaji;
    public $jenkeres = array(), $kualifes = array(), $pengkerjases = array();
    public $spesialisess = array(), $tingkeres = array(),$regencies = array();
    public $multitle = array(),$multitles = array();
    public $photos = [];
    public $isOpen = 0;
    protected $listeners = [
        'multiTitle',
        'store'
    ];

    public function multiTitle($title){
        $this->multitle = $title;
    }


    public function render()
    {
        $posts = Post::with('author')->orderBy('id', 'desc')->paginate();
        // dd($posts);
        return view('livewire.posts.posts', [
            'posts' =>  $posts,
            'locations' => Regency::all(),
            'jenkers' => JenisKerja::all(),
            'kualifs' => KualifikasiLulus::all(),
            'pengkerjas' => PengalamanKerja::all(),
            'spesialises' => SpesialisKerja::all(),
            'tingkers' => TingkatKerja::all(),
        ]);
    }

    public function store($dataFilArray)
    {
        $this->regencies = $dataFilArray[0];
        $this->jenkeres = $dataFilArray[1];
        $this->kualifes = $dataFilArray[2];
        $this->pengkerjases = $dataFilArray[3];
        $this->spesialisess = $dataFilArray[4];
        $this->tingkeres = $dataFilArray[5];
        $this->validate([
            // 'title' => 'required',
            'content' => 'required',
            'photos.*' => 'image|max:4000',
            'minrange'    => 'required',
            'maxrange'    => 'required',
            'email'     => 'required',
            'wa'        => 'required',
        ]);
        // dd($this->minrange);
        // Update or Insert Post
        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'content' => $this->content,
            'email' => $this->email,
            'wa' => $this->wa,
            'salary_start' => $this->minrange,
            'salary_end' => $this->maxrange,
            'salary_check' => $this->checkgaji,
            'author_id' => Auth::user()->id,
        ]);

        // Image upload and store name in db
        if($this->photos != null){
            if (count($this->photos) > 0) {
                Image::where('post_id', $post->id)->delete();
                $counter = 0;
                foreach ($this->photos as $photo) {

                    $storedImage = $photo->store('public/photos');

                    $featured = false;
                    if($counter == 0 ){
                        $featured = true;
                    }
                    Image::create([
                        'url' => url('storage'. Str::substr($storedImage, 6)),
                        'title' => $this->title,
                        'post_id' => $post->id,
                        'featured' => $featured
                    ]);
                    $counter++;
                }
            }
        }

        // Post Tag mapping
        // if (count($this->tagids) > 0) {
        //     DB::table('post_tag')->where('post_id', $post->id)->delete();

        //     foreach ($this->tagids as $tagid) {
        //         DB::table('post_tag')->insert([
        //             'post_id' => $post->id,
        //             'tag_id' => intVal($tagid),
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // }
        if (count($this->multitle) > 0) {
            $post_title = DB::table('post_title')->where('post_id', $post->id)->delete();
            foreach ($this->multitle as $multitle) {
                DB::table('post_title')->insert([
                    'post_id' => $post->id,
                    'title' =>  $multitle,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->regencies) > 0) {
            $post_title = DB::table('post_regency')->where('post_id', $post->id)->delete();
            foreach ($this->regencies as $location) {
                DB::table('post_regency')->insert([
                    'post_id' => $post->id,
                    'regency_id' => intVal($location),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->jenkeres) > 0) {
            $post_title = DB::table('jenis_kerja_post')->where('post_id', $post->id)->delete();
            foreach ($this->jenkeres as $jenker) {
                DB::table('jenis_kerja_post')->insert([
                    'post_id' => $post->id,
                    'jenis_kerja_id' => intVal($jenker),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->kualifes) > 0) {
            $post_title = DB::table('kualifikasi_lulus_post')->where('post_id', $post->id)->delete();
            foreach ($this->kualifes as $kualif) {
                DB::table('kualifikasi_lulus_post')->insert([
                    'post_id' => $post->id,
                    'kualifikasi_lulus_id' => intVal($kualif),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->pengkerjases) > 0) {
            $post_title = DB::table('pengalaman_kerja_post')->where('post_id', $post->id)->delete();
            foreach ($this->pengkerjases as $pengkerja) {
                DB::table('pengalaman_kerja_post')->insert([
                    'post_id' => $post->id,
                    'pengalaman_kerja_id' => intVal($pengkerja),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->spesialisess) > 0) {
            $post_title = DB::table('post_spesialis_kerja')->where('post_id', $post->id)->delete();
            foreach ($this->spesialisess as $spesialis) {
                DB::table('post_spesialis_kerja')->insert([
                    'post_id' => $post->id,
                    'spesialis_kerja_id' => intVal($spesialis),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        if (count($this->tingkeres) > 0) {
            $post_title = DB::table('post_tingkat_kerja')->where('post_id', $post->id)->delete();
            // dd($this->multitle);
            foreach ($this->tingkeres as $tingker) {
                DB::table('post_tingkat_kerja')->insert([
                    'post_id' => $post->id,
                    'tingkat_kerja_id' => intVal($tingker),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        session()->flash(
            'message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        // DB::table('post_tag')->where('post_id', $id)->delete();

        session()->flash('message', 'Post Deleted Successfully.');
    }

    public function edit($id)
    {
        $post = Post::with('PostTitles','jeniskerja','kualifikasilulus',
        'pengalamankerja','spesialiskerja','tingkatkerja','regency')
        ->findOrFail($id);
        // dd($post);

        $this->post_id = $id;
        $this->multitles = $post->postTitles;
        $this->multitle = $post->postTitles->pluck('title');
        $this->title = $post->title;
        $this->content = $post->content;
        $this->minrange = $post->salary_start;
        $this->maxrange = $post->salary_end;
        $this->checkgaji = $post->salary_check;
        $this->location = $post->regency->pluck('id');
        $this->jenker = $post->jeniskerja->pluck('id');
        $this->kualif = $post->kualifikasilulus->pluck('id');
        $this->spesialis = $post->spesialiskerja->pluck('id');
        $this->pengkerja = $post->pengalamankerja->pluck('id');
        $this->tingker = $post->tingkatkerja->pluck('id');
        $this->wa = $post->wa;
        $this->email = $post->email;
        // dd($this->multitle);

        $this->openModal();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->title = null;
        $this->content = null;
        $this->photos = null;
        $this->post_id = null;
        $this->jenkeres = null;
        $this->kualifes = null;
        $this->pengkerjases = null;
        $this->spesialisess = null;
        $this->tingkeres = null;
        $this->minrange = null;
        $this->maxrange = null;
        $this->checkgaji = null;
    }
}
