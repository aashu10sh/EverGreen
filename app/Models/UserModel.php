<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table ='user_models';
    protected $primaryKey = 'id';
    protected  $fillable = ['name','username','password','email','phonenumber'];
    use HasFactory;

    function posts(){
        return $this->hasMany(PostModel::class, 'posted_by');
    }
    function comments()
    {
        return $this->hasMany(CommentModel::class,'commented_by');
    }
}
