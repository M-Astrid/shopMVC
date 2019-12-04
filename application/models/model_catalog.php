<?php
namespace Models;
use \R;

class Model_Catalog extends \Model
{
    // количсетво товаров на одной странице каталога/главной
    const SHOW_BY_DEFAULT = 6;

    // получает все категории со статусом "отображается"
    // returns array
	public static function get_categories_list()
	{
	    $category_list = R::getAll("SELECT id, name FROM category WHERE status=1 ORDER BY sort_order ASC");
	    return $category_list;
	}

	// получает все товары, отмеченные как новинка
    // returns array
	public function get_latest_products($count = self::SHOW_BY_DEFAULT)
    {
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=1 ORDER BY is_new DESC LIMIT ".$count);
        return $product_list;
    }

    // получает все товары, отмеченные как рекомендуемые
    // returns array
    public function get_recommended()
    {
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=True AND is_recommended=True");
        return $product_list;
    }

    // получает товары на странице каталога в указанной категории. id категории = 0 - все товары
    // returns array
    public function get_products_by_category($category_id, $page, $count = self::SHOW_BY_DEFAULT)
    {
        $condition = "AND category_id = $category_id";
        if ($category_id=="0")
        {
            $condition = '';
        }
        $offset = (intval($page)-1)*$count;
        $product_list = R::getAll("SELECT id, name, price, img, is_new FROM product WHERE display=True $condition ORDER BY id DESC LIMIT $count OFFSET $offset");
        return $product_list;
    }

    // общее количество товаров в категории. id категории = 0 - все товары
    // returns int
    public static function get_total_products_in_category($category_id)
    {
        if ($category_id=="0")
        {
            $count = R::count('product', 'display = ?', [1]);
        } else $count = R::count('product', "category_id = ? AND display = ?", [$category_id, 1]);
        return $count;
    }

    // returns array
    public function get_product_by_id($product_id)
    {
        $product = R::getrow("SELECT * FROM product WHERE id=$product_id");
        return $product;
    }

    // returns array
    public static function get_products_by_ids($ids)
    {
        $list = implode(', ', $ids);
        return R::getAll("SELECT * FROM product WHERE id IN ($list)");

    }

    // выводит все товары, в  т.ч. скрытые, для админ панели
    // returns array
    public static function get_admin_products()
    {
        return R::getAll("SELECT * FROM product ORDER BY category_id");

    }
}
