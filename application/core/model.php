<?php
//namespace Models;

class Model
{
	public function __construct()
	{
	    //
	}

	public function get_data()
	{
		// todo
	}

    public function get_object_by_id($table, $id)
    {
        return R::getrow("SELECT * FROM $table WHERE id = $id");
    }

	public function object_update($table, $id, $data)
	{
	    $object = R::load($table, $id);
		foreach ($data as $key => $value)
        {
            $object->$key = $value;
        }
        R::store($object);
	}
}