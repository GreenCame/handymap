<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'comment', 'create_at', 'update_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
