<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'post_type',
        'meta_data',
        'category_id',
        'location_id',
        'author_id',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function likes_comment(){
        return $this->belongsTo(LikesComment::class, 'id', 'id_post');
    }

    public function comments(){
        return $this->hasMany(Comment::class)->with(['author', 'likes_comment']);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function jeniskerja(){
        return $this->belongsTo(JenisKerja::class);
    }
    
    public function jobcategory(){
        return $this->belongsTo(JobCategory::class);
    }
    
    public function kualifikasilulus(){
        return $this->belongsTo(KualifikasiLulus::class);
    }
    
    public function pengalamankerja(){
        return $this->belongsTo(PengalamanKerja::class);
    }
    
    public function tingkatkerja(){
        return $this->belongsTo(TingkatKerja::class);
    }

    public function spesialiskerja(){
        return $this->belongsTo(SpesialisKerja::class);
    }
}
