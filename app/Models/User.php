<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class User extends Model {
    use SoftDeletes;

    protected $guarded = [];
    protected $primaryKey = '_id';
    protected $collection = 'users';

    protected $fillable = [
        'email', 'password',
    ];


}
