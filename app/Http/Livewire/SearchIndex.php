<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\JenisKerja;
use App\Models\KualifikasiLulus;
use App\Models\PengalamanKerja;
use App\Models\SpesialisKerja;
use App\Models\TingkatKerja;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class SearchIndex extends Component
{
    use WithPagination;
    // protected $updatesQueryString = [
    //     ['searchtitle' => ['except' => '']]
    // ];
    public $searchjob;
    public $isOpen = 0;

    public $myid = 0;
    public function postDetail($id){
        $this->myid = $id;
    }

    public function searchJob(){
        // $this->postjob = $postjob;
        $emit = $this->emit('searchJobs', $this->searchjob);
        // dd($emit);
    }

    public function render()
    {
        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url', 'posts.created_at')
                        ->latest()
                        ->get();
        
        $this->jenker = JenisKerja::all();
        $this->kualif = KualifikasiLulus::all();
        $this->pengkerja = PengalamanKerja::all();
        $this->spesialis = SpesialisKerja::all();
        $this->tingker = TingkatKerja::all();

        
        return view('livewire.search-index',[
            'postsearch' => $posts,
            'jenkers' => $this->jenker,
            'kualifs' => $this->kualif,
            'pengkerjas' => $this->pengkerja,
            'spesialises' => $this->spesialis,
            'tingkers' => $this->tingker,
        ]);
    }
    public function searchClick()
    {
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }
}
