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
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class SearchIndex extends Component
{
    use WithPagination;
    // protected $updatesQueryString = [
    //     ['searchtitle' => ['except' => '']]
    // ];
    public $searchjob,$locations,$kualif_lulus,$jenis_kerja;
    public $isOpen = 0;

    public $myid = 0;
    public function postDetail($id){
        $this->myid = $id;
    }

    public function searchJob(){
        // $this->postjob = $postjob;
        $emit = $this->emit('searchJobs', [$this->searchjob,$this->locations,$this->kualif_lulus,$this->jenis_kerja]);
        // $emit = $this->emit('searchJobs', [$this->locations]);
        // dd($emit);
    }
    public function mount(){
        $this->provinces = Http::acceptJson()->get('https://dev.farizdotid.com/api/daerahindonesia/provinsi')['provinsi'];
        
        foreach($this->provinces as $provin){
            $kota_prof = Http::acceptJson()->get('https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='.$provin['id'])['kota_kabupaten'];
            foreach($kota_prof as $key => $kotas[]){
                $this->cities = $kotas;
            }
        }
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
    public function resetFilter(){
        $this->locations = null;
        $this->kualif_lulus = null;
        $this->jenis_kerja = null;
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
