<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // protected $fillable = ['from', 'to', 'message', 'is_read'];

    protected $guarded = [];

    public function fromUser()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
