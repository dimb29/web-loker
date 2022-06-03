<?php

namespace App\Http\Livewire;

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
    public function render()
    {
        return view('livewire.search-index');
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
