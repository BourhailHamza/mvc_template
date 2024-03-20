<?php

class ArticleModel extends Model
{
    public function __construct() {
        $this->table = 'film';
        $this->getConnection();
    }
}
