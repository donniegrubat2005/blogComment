<?php

namespace App\Repositories;

use App\Models\Reply;

class ReplyRepository
{
    use Repository;

    protected $model;

    public function __construct(Reply $reply)
    {
        $this->model = $reply;
    }

    public function getAll() 
    {
       return $this->model::orderBy('id', 'DESC')->get();
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