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

    public function create() {
        $this->view->generate('categories_template_view.phtml', 'categories/create.phtml'); // формируем вьюшку
    }

    public function store() {
        $cat_code = $_POST['cat_code'];
        $cat_name= $_POST['cat_name'];
        if ($this ->categoriesList->setCategories($cat_code, $cat_name)) {
            header('Location: http://mvc.local/admin/categories');
        }
        echo "Ошибка добавления категории";
    }

    public function list() {
        $this -> view -> categories = $this->categoriesList->getCategories();

        $this->view->generate('categories_template_view.phtml', 'categories/index.phtml'); // формируем вьюшку

    }

    public function edit($cat_id) {
        $this ->view->record = $this->categoriesList->getCategoriesByID($cat_id);
        $this->view->generate('categories_template_view.phtml', 'categories/edit.phtml'); // формируем вьюшку
    }

    public function update() {
        $cat_id = $_POST['cat_id'];
        $cat_code = $_POST['cat_code'];
        $cat_name= $_POST['cat_name'];
        if ($this ->categoriesList->updateCategories($cat_id, $cat_code, $cat_name)) {
            header('Location: http://mvc.local/admin/categories');
        }
        echo "Ошибка изменения категории";
    }

    public function delete($cat_id) {
        if ( $this->categoriesList->delCategories($cat_id)) {
            header('Location: http://mvc.local/admin/categories');
        }
        echo "Ошибка удаления категории";


    }


}