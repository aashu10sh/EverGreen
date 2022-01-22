<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $fillable = ['comment','commented_by','posted_on'];
    public function user()
	{
		return $this->belongsTo(UserModel::class,'commented_by');
	}
    public function post()
    {
        return $this->belongsTo(PostModel::class,'posted_on');
    }
}
