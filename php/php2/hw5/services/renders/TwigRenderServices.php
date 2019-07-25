<?php
namespace App\services\renders;


use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

require_once $_SERVER['DOCUMENT_ROOT'] .
    '../../vendor/autoload.php';

class TwigRenderServices implements IRenderService
{
    public function renderTmpl($template, $params = [])
    {
        $loader = new \Twig\Loader\ArrayLoader([$template=>$params]);
        $twig = new \Twig\Environment($loader, $params);
        try {
             return $twig->render($template, $params);
        } catch (LoaderError $e) {
            return $e.' Loader';
        } catch (RuntimeError $e) {
            return $e.' Runtume';
        } catch (SyntaxError $e) {
            return $e.' Syntax';
        }
    }
}