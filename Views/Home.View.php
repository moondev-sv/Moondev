<?php
    class HomeView {
        
        public function loadView() {
            include_once "Pages/Home/Templates/Header.Home.php";
            //include_once "Pages/Vectores/Logo.php";
            include_once "Pages/Menus/Mainmenu.php";
            include_once "Pages/Home/Home.php";
            include_once "Pages/Footer/MainFooter.php";
            include_once "Pages/Home/Templates/Footer.Home.php";
        }
    }
    
?>