<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class SearchIndex extends Component
{
    use WithPagination;
    // protected $updatesQueryString = [
    //     ['searchtitle' => ['except' => '']]
    // ];
    public $searchtitle;
    public $isOpen = 0;

    public function render()
    {
        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url', 'posts.created_at')
                        ->latest()
                        ->get();

        View::share('postsearch', $posts);
        
        return view('livewire.search-index');
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
