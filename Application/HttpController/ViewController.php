<?php

namespace App\HttpController;

abstract class ViewController extends AbstractController{

    protected $TemplateViews = ROOT . '/Templates/';
    protected $TemplateCache = ROOT . '/Temp/TplCache';

    function View($tplName, $tplData = [])
    {
        $blade = new Blade([$this->TemplateViews], $this->TemplateCache);
        $viewTemplate = $blade->render($tplName, $tplData);
        $this->response()->write($viewTemplate);
    }


}



?>