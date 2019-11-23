<?php
/**
 * Created by PhpStorm.
 * User: astrid
 * Date: 23.11.2019
 * Time: 11:31
 */
namespace Components;

class Product
{
    public static function get_image($id)
    {
        // имя изображения по умолчанию
        $no_image = 'no-image.jpg';

        // путь к папк с изображениями продуктов
        $path = '/upload/img/catalog/';

        // путь к изображению товара
        $path_to_product_img = $path.$id.'.jpg';

        // если изображение товара существует, то возвращаем путь к изображению
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$path_to_product_img))
        {
            return $path_to_product_img;
        }

        // если файла не существует, путь к изображению по умолчанию
        return $path.$no_image;
    }
}