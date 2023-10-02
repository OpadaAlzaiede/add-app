<?php


namespace App\Services\Adds;


interface AddStoreService
{
    public function store($data);
    public function update($id, $data);
    public function publish($id);
    public function unpublish($id);
}
