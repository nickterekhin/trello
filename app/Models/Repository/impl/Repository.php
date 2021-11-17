<?php


namespace App\Models\Repository\impl;


use App\Models\Repository\IRepository;
use Exception;

abstract class Repository implements IRepository
{

    abstract protected function initModelName();

    function create(array $options)
    {
        /** @var \Eloquent $obj */
        $model = 'App\Models\\'.$this->initModelName();
        $obj = new $model($options);
        try {
           return  $obj::create($options);
        }catch(Exception $e)
        {
            throw new Exception($e->getMessage());
        }

    }


    function update($object)
    {
        try {
            return $object->update();
        }catch(\Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

    function getById($id)
    {
        /** @var \Eloquent $model */
        $model ='App\Models\\'.$this->initModelName();

        $obj = $model::find($id);
        if(!$obj)
            throw new Exception("Element with id={$id} does not exist");

        return $obj;
    }

    function delete($object)
    {
        try {
            return $object->delete();
        }catch(\Exception $e)
        {
            throw new Exception($e->getMessage());
        }
    }

}