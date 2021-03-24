<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'address'
    ];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
