<?php

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

    public static function get_object_array_by_id($table, $id)
    {
        return R::getrow("SELECT * FROM $table WHERE id = $id");
    }

    public static function get_object_by_id($table, $id)
    {
        return R::getAll("SELECT * FROM $table WHERE id = $id LIMIT 1");
    }

	public static function update_object($table, $id, $data)
	{
	    $object = R::load($table, $id);
		foreach ($data as $key => $value)
        {
            $object->$key = $value;
        }
        R::store($object);
		return true;
	}
}