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

    public function setCategories($cat_code, $cat_name) {
        return $this->categoriesModel->setCategories($cat_code, $cat_name);
    }

    public function getCategoriesByID($cat_id) {
        return $this->categoriesModel->getCategoriesByID($cat_id);
    }

    public function updateCategories($cat_id,$cat_code,$cat_name) {
        return $this->categoriesModel->updateCategories($cat_id,$cat_code,$cat_name);
    }
}