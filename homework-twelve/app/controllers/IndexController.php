<?php
namespace App\Controllers;


use App\Models\ProductModel as ProductModel;

class IndexController extends Controller
{
    private $productModel = null;

    public function __construct()
    {}

    public function index()
    {
        
        /**Добавьте сюда код, для получения всех продуктов из таблицы. 
         * Реализуйте это через соответствующую модель
         */
        
       

        $products = [];//Сейчас этот массив пуст. Вам нужно в него получить продукты 

        $products = $this->callProductModel();

        $this->display('index.html', $products);
    }

    private function callProductModel () {
        $productModel = new ProductModel;
        return $productModel->getProducts();
    }
}