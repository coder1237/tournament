<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name','code','group_id'];

    public function group()
    {
        return $this->hasOne(Group::class,'id','group_id');
    }
}
