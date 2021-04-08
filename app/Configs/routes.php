<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 11:31
 */
//news/sport/juventus-jenoa-anons-matcha
return [
    'news/([a-zA-Z-]+)/([a-zA-Z-]+)' => 'news/detail/$2',
    'news/([a-zA-Z-]+)' => 'news/index/$1',
    'news' => 'news/index',
    'comment' => 'comments/store',
    '^\s*$' => 'index/index',
    //add work with categories
    'categories/create' => 'categories/create',
    'categories' => 'categories/read',
    'categories/update/([0-9]+)' => 'categories/update/$1',
    'categories/delete/([0-9]+)' => 'categories/delete/$1'
];

?>