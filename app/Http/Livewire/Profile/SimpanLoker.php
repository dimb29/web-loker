<?php

namespace App\Http\Livewire\Profile;

use App\Models\Post;
use App\Models\PostSave;
use Livewire\Component;

class SimpanLoker extends Component
{
    public function render()
    {
        $posts = Post::rightJoin('post_save', 'posts.id','post_save.post_id')
        ->leftJoin('images', 'posts.id', '=', 'images.post_id',)
        ->leftJoin('users as b','author_id','=','b.id') 
        ->leftJoin('regencies', 'posts.location_id', 'regencies.id')
        ->orderBy('id', 'desc')->paginate();
        return view('livewire.profile.simpan-loker',['posts'=>$posts]);
    }
}
