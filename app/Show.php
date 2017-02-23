<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    protected $table = 'show';

    protected $fillable = ['owner', 'name', 'venue','opener','opener2','opener3','opener4','headliner', 'cover', 'rider', 'event_starts', 'event_ends'];
}
