<?php

namespace App\Repositories\JenssegersMongo\User;

use App\Models\User;
use App\Repositories\Contracts\JenssegersMongoBaseRepository;

class JenssegersMongoUserRepository extends JenssegersMongoBaseRepository {
    protected $model=User::class;
}
