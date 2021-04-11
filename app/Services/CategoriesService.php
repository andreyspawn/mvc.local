<?php

namespace App\Services;

use App\Models\Categories;

class CategoriesService
{
    private Categories $categoriesModel;

    function __construct()
    {
        $this->categoriesModel = new Categories();
    }

    public function getCategories() {
        return $this->categoriesModel->getCategories();
    }

    public function delCategories($cat_id) {
        return $this->categoriesModel->delCategories($cat_id);
    }
}