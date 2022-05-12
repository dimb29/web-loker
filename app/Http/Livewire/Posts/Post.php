<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post as PostModel;
use App\Models\Comment;
use App\Models\LikesComment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Post extends Component
{

    public $post;
    public $comment, $category, $post_id;

    public function mount($id)
    {
        $this->post = PostModel::with(['author', 'category', 'images', 'videos', 'tags'])->find($id);
        // dd($this);
        
    }

    public function render()
    {                        
        $posttrend = PostModel::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.views', 'desc')->get();
                        $no = 1;
        $comments = Comment::leftJoin('users', 'comments.author_id', '=', 'users.id')
                        ->leftJoin('likes_comments', 'comments.id', '=', 'likes_comments.id_comment')
                        ->orderBy('comments.created_at', 'ASC')->get();
                        // dd($comments);
        return view('livewire.posts.post', [
            'trend' => $posttrend,
            'no' => $no,
            'comments' => $comments]);
    }

    public function comment_store(){
        
        $data = $this->validate([
            'comment' => 'required',
            
        ]);
        // Update or Insert Post
        Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post['id'],
            'author_id' => Auth::user()->id,
        ]);
    }

    public function comment_like($id){
        // dd($id);
        LikesComment::create([
            'id_post' => $this->post['id'],
            'id_comment' => $id,
            'user_id' => Auth::user()->id,
        ]);
    }
}
