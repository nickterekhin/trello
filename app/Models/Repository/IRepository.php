<?php


namespace App\Models\Repository;


use App\Models\Ticket;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IRepository
{
    /**
     * @param array $options
     * @return Model
     * @throws Exception
     */
    function create(array $options);

    /**
     * @return Collection
     */
    function getAll();

    /**
     * @param Model $object
     * @return bool
     * @throws Exception
     */
    function update($object);

    /**
     * @param $id
     * @return Model
     * @throws Exception
     */
    function getById($id);

    /**
     * @param Model $object
     * @return bool
     * @throws Exception
     */
    function delete($object);

    /**
     * @return Collection
     */
    public function getAllActive();
}