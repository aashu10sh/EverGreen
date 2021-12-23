<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','posted_by','likes','image_path'];

    function user()
    {
        return $this->belongsTo(UserModel::class, 'posted_by');
    }
}
