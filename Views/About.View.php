<?php
    class AboutView {
        
        public function loadView() {
            include_once "Pages/About/Templates/Header.About.php";
            //include_once "Pages/Vectores/Logo.php";
            include_once "Pages/Menus/Mainmenu.php";
            include_once "Pages/About/About.php";
            include_once "Pages/Footer/MainFooter.php";
            include_once "Pages/About/Templates/Footer.About.php";
        }
    }
    
?>