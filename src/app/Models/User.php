<?php

namespace Geazi\Interbits\App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'function_id', 'email', 'ddd', 'phone', 'password'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function functions()
    {
        return $this->belongsTo('Geazi\Interbits\App\Models\Functions', 'function_id');
    }

}
