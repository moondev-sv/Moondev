<?php
    class ErrorController {
        
        private $model;
        private $view;

        function __construct($model, $view) {
            $this->model = $model;
            $this->view = $view;
        }

        public function loadView($requiredAction = false) {
            if (!$requiredAction) {
                $this->view->loadView();
            } else {
                $this->view->$requiredAction();
            }
        }
    }
    
?>