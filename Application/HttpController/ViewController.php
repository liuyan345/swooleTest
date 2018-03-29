<?php

namespace App\HttpController;

use EasySwoole\Core\Http\AbstractInterface\Controller;
use Jenssegers\Blade\Blade;

abstract class ViewController extends Controller{

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