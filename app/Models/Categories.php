<?php
/**
 * Created by PhpStorm.
 * User: Vadim
 * Date: 05.09.2018
 * Time: 19:06
 */

namespace App\Models;

use PDO;

class Categories extends AbstractModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories() {
        $sql = $this->connection->prepare("SELECT * FROM category");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delCategories($cat_id) {
        $sql = $this->connection->prepare("DELETE FROM category WHERE cat_id=:cat_id");
        $sql->bindValue(':cat_id',$cat_id, PDO::PARAM_INT);
        $result = $sql->execute();
        return $result;
    }

    public function setCategories($cat_code, $cat_name)
    {
        $sql = $this->connection->prepare("INSERT INTO `category`(`cat_code`, `cat_name`) VALUES (:cat_code, :cat_name)");

        $sql->bindParam(':cat_code', $cat_code, PDO::PARAM_STR);
        $sql->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);

        $result = $sql->execute();
        return $result;
    }

    public function getCategoriesByID($cat_id) {
        $sql = $this->connection->prepare("SELECT * FROM category where `cat_id`=:cat_id");
        $sql->bindValue(':cat_id',$cat_id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCategories($cat_id,$cat_code,$cat_name) {
        $sql = $this->connection->prepare("UPDATE `category` SET `cat_name`=:cat_name, `cat_code`=:cat_code WHERE `cat_id`=:cat_id");
        $sql->bindValue(':cat_id',$cat_id, PDO::PARAM_INT);
        $sql->bindValue(':cat_code',$cat_code, PDO::PARAM_STR);
        $sql->bindValue(':cat_name',$cat_name, PDO::PARAM_STR);
        $result = $sql->execute();
        return $result;
    }
}