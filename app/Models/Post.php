<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'post_image_file_name',
        'date_of_publication',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
