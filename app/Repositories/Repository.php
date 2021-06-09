<?php 

namespace App\Repositories;

trait Repository {

    public function all()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store($input)
    {
        return $this->save($this->model, $input);
    }

    public function update($id, $input)
    {
        $this->model = $this->getById($id);
        return $this->save($this->model, $input);
    }


    public function delete($id)
    {
        $this->model = $this->getById($id);
        $this->model->delete();

        return $this->model;
    }
}