<?php

class Article extends Controller
{
    public function index() {
        $this->loadModel('ArticleModel');

        $articles = $this->ArticleModel->getAll();

        $this->render('index', compact('articles'));
    }

    public function detail($id) {
        $this->loadModel('ArticleModel');

        $this->ArticleModel->id = $id;

        $article = $this->ArticleModel->getOne();

        $this->render('detail', compact('article'));
    }
}
