<?php
    class ErrorView {
        
        public function loadView() {
            include_once "Pages/Error/Templates/Header.Error.php";
            include_once "Pages/Error/Error.php";
            include_once "Pages/Error/Templates/Footer.Error.php";
        }
    }
    
?>