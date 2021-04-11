<?php

namespace App\Controllers;

use App\Models\Categories;
use App\Services\CategoriesService;


class CategoriesController extends Controller {
    private CategoriesService $categoriesList;

    function __construct()
    {
        parent::__construct();
        $this -> categoriesList = new CategoriesService();
    }
//'categories/create' => 'categories/create',
//'categories/admin' => 'categories/read',
//'categories/update/([0-9]+)' => 'categories/update/$1',
//'categories/delete/([0-9]+)' => 'categories/delete/$1'

    function create() {
        echo 'Create new\'s category';
    }

    function read() {
        echo 'Create new\'s category';
        $this -> view -> categories = $this->categoriesList->getCategories();

        $this->view->generate('categories_template_view.phtml', 'categories/index.phtml'); // формируем вьюшку

    }

    function update() {
        echo 'Create new\'s category';
    }

    function delete(int $cat_id) {
        echo 'Delete new\'s category';
        var_dump($cat_id);die;
        $this->categoriesList->delCategories($cat_id);
    }


}