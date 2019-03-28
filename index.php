<?php
    /**
    *This is "Moon Developers" Web Page with the MVC's paradigm
    *this is our main page in where our clients are going to know about us
    *and they could contact us
    *
    *Moondev Web Page v1.0 (BETA)
    *Developed by: Mario Roberto Vanegas
    *
    *STARTED:
    *March 20th, 2019
    *Wednesday - 17:24
    */

    include_once 'Config/General.php';
    session_start();

    $url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

    if ($url == "/") {
        require_once __DIR__ . '/Models/Home.Model.php';
        require_once __DIR__ . '/Views/Home.View.php';
        require_once __DIR__ . '/Controllers/Home.Controller.php';

        $homeView = new HomeView();
        $homeModel = new HomeModel();
        $homeController = new HomeController($homeModel, $homeView);

        echo $homeController->loadView();
    } else {
        $requiredController = $url[0];
        $requiredAction = isset($url[1])? $url[1] : '';
        $requiredParams = array_slice($url, 2);
        $controllerRoute = __DIR__ . '/Controllers/' . ucfirst($requiredController) . '.Controller.php';

        if (file_exists($controllerRoute)) {
            require_once __DIR__ . '/Models/' . ucfirst($requiredController) . '.Model.php';
            require_once __DIR__ . '/Controllers/' . ucfirst($requiredController) . '.Controller.php';
            require_once __DIR__ . '/Views/' . ucfirst($requiredController) . '.View.php';

            //Creamos los nombres de las clases a partir de la URL
            $modelName = ucfirst($requiredController) . 'Model';
            $controllerName = ucfirst($requiredController) . 'Controller';
            $viewName = ucfirst($requiredController) . 'View';

            //Creamos los objetos de las clases anteriores

            $controllerObject = new $controllerName(new $modelName, new $viewName);

            //Si existen parametros dentro del metodo llamado
            if (!empty($requiredAction)) {
                if (!empty($requiredParams[1])) {
                    //Entonces llamamos el método por medio de la vistas
                    //Llamada dinámica de la vistas
                    print $controllerObject->$requiredAction($requiredParams[0], $requiredParams[1]);
                } else if (!empty($requiredParams[0])) {
                    print $controllerObject->$requiredAction($requiredParams[0]);
                } else {
                    print $controllerObject->loadView($requiredAction);
                }
            } else {
                //Si no, solo llamamos el objeto vista
                print $controllerObject->loadView();
            }
        } else {
            //Si no existe el controlador, significa que la página no existe, por tanto mostrmos error

            require_once __DIR__ . '/Models/Error.Model.php';
            require_once __DIR__ . '/Controllers/Error.Controller.php';
            require_once __DIR__ . '/Views/Error.View.php';

            $notFoundModel = New ErrorModel();
            $notFoundView = New ErrorView();
            $notFoundController = New ErrorController($notFoundModel, $notFoundView);

            print $notFoundController->loadView();
        }
    }
?>
