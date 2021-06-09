<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository
{
    use Repository;

    protected $model;

    public function __construct(Blog $blog)
    {
        $this->model = $blog;
    }

    public function getAll() 
    {
       return $this->model::orderBy('id', 'DESC')->get();
    }

    public function getReply() 
    {
        return $this->model::orderBy('id', 'DESC')->with('replies')->get();
       
    }

    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    protected function save($model, $input)
    {
        $model->fill($input);
        $model->save();
        return $model;
    }
}