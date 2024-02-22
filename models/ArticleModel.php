<?php

class ArticleModel extends Model
{
    public function __construct() {
        $this->table = 'artiste';
        $this->getConnection();
    }
}
