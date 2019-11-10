<?php
//namespace Models;

class Model_Catalog extends Model
{
    const SHOW_BY_DEFAULT = 2;

	public function get_category_list()
	{
	    $category_list = R::getAll("SELECT id, name FROM category ORDER BY sort_order ASC");
	    return $category_list;
	}

	public function get_latest_products($count = self::SHOW_BY_DEFAULT)
    {
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=True ORDER BY id ASC LIMIT ".$count);
        return $product_list;
    }
    public function get_recommended($count = self::SHOW_BY_DEFAULT)
    {
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=True AND is_recommended=True ORDER BY id DESC LIMIT ".$count);
        return $product_list;
    }

    public function get_products_by_category($category_id, $page, $count = self::SHOW_BY_DEFAULT)
    {
        $condition = "AND category_id=$category_id ";
        if ($category_id=="0")
        {
            $condition = '';
        }
        $offset = ($page-1)*$count;
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=True ".$condition."ORDER BY id DESC LIMIT ".$count." OFFSET ".$offset);
        return $product_list;
    }

    public static function get_total_products_in_category($category_id)
    {
        if ($category_id=="0")
        {
            $count = R::count('product');
        } else $count = R::count('product', "category_id = ?", [$category_id]);
        return $count;
    }

    public function get_product_by_id($product_id)
    {
        $product = R::getrow("SELECT * FROM product WHERE id=$product_id");
        return $product;
    }

    public static function get_products_by_ids($ids)
    {
        $list = implode(', ', $ids);
        if ($list != "")
        {
            return R::getAll("SELECT * FROM product WHERE id IN ($list)");
        }
        else return array();
    }
}
