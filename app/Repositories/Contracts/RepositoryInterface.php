<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface {

    public function create(array $data);
    public function findBy(array $criteria, array $items, bool $single = true);

}
