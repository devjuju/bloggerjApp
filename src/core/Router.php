<?php

namespace App\Core;

use App\Controllers\HomeController;
use App\Core\Request;

class Router
{
    protected $routes;
    public function run(): void
    {

        $request = new Request();
        try {
            if ($request->get('action')) {

                $routes = $request->get('action');
                switch ($routes) {

                    case 'home':
                        $home = new HomeController();
                        $home->home();
                        break;

                    default:
                        break;
                }
            } else {
                $home = new HomeController();
                $home->home();
            }
        } catch (\Exception $ex) {
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();

            require('../templates/error.php');
        }
    }
}
