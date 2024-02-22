<?php

class Article extends Controller
{
    public function index() {
        $this->render('index', [
            'article' => '1234'
        ]);
    }
}
