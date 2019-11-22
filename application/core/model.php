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

    // создаем объект на основе полученных данных, получаем его id
    public static function create_object($table, $data)
    {
        $object = R::dispense($table);
        foreach($data as $key => $value)
        {
            $object->$key = $value;
        }
        R::store($object);
        return $object->id;
    }

    public static function get_all_objects($table)
    {
        return R::getAll("SELECT * FROM $table");
    }

    public static function get_object_array_by_id($table, $id)
    {
        return R::getrow("SELECT * FROM $table WHERE id = ?", [$id]);
    }

    public static function get_object_by_id($table, $id)
    {
        return R::getAll("SELECT * FROM $table WHERE id = ? LIMIT 1", [$id]);
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

    public static function delete_object($table, $id)
    {
        $object = R::load($table, $id);
        R::trash($object);
    }

}