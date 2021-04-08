<?php

namespace App\Controllers;

use App\Models\Categories;
use Exception;
use App\Services\NewsService;

class CategoriesController extends Controller {
    private Categories $categoriesList;

    function __construct()
    {
        parent::__construct();
        $this -> categoriesList = new Categories();
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
        $result = $this -> categoriesList -> getCategories();
        var_dump($result);
    }

    function update() {
        echo 'Create new\'s category';
    }

    function delete() {
        echo 'Create new\'s category';
    }


}