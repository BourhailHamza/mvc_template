<?php

abstract class Controller
{
    /**
     * Display view
     *
     * @param string $file
     * @param array $data
     * @return void
     */
    public function render(string $file, array $data = [])
    {
        extract($data);

        ob_start();

        require_once(ROOT . 'views/' . strtolower(get_class($this)) . '/' . $file . '.php');

        $content = ob_get_clean();

        require_once(ROOT . 'views/main/default.php');
    }

    /**
     * Change model
     *
     * @param string $model
     * @return void
     */
    public function loadModel(string $model)
    {
        require_once(ROOT . 'models/' . $model . '.php');

        $this->$model = new $model();
    }
}