<?php


namespace App\Http\Interfaces;


interface RepositoryInterface
{
    public function index();

    public function create(array $data);

    public function update(array $data, $id);

    public function show($id);

    public function delete($id);
}
