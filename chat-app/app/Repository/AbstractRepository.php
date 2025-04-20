<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\{Builder, Model};

abstract class AbstractRepository
{
    public function __construct(
        private ?string $className = null
    )
    {
        if(!isset($this->className)) {
            $currentClass = static::class;
            throw new \ErrorException("Class name not defined in repository {$currentClass}");
        }
        $this->model = new $this->className();
    }

    protected Model $model;

    public function newQuery(): Builder
    {
        return $this->model->newQuery();
    }
}
