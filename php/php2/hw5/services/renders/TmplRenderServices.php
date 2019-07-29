<?php
namespace App\services\renders;


class TmplRenderServices implements IRenderService
{
    public function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/../views/' . $template . '.php';
        return ob_get_clean();
    }
}