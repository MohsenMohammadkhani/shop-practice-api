<?php

namespace App\Repositories\Contracts;

class JenssegersMongoBaseRepository implements RepositoryInterface {

    protected $model;

    public function create(array $data) {
      return $this->model::create($data);
    }

    public function findBy(array $criteria, array $items, bool $single = true) {
        $query= $this->model::query();
        foreach ($criteria as $key => $value){
            $query->where($key,$value);
        }

        $method = $single ? 'first' : 'get';

        return !is_null($items) ? $query->{$method}() : $query->{$method}($items);
    }
}
