<?php
    namespace Controllers;

    use DAO\CellphoneRepository as CellphoneRepository;
    use Models\Cellphone as Cellphone;
    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."add-cellphone.php");
        }     
        
        public function cellphonesList(){
            $cr = new CellphoneRepository();
            require_once(VIEWS_PATH."cellphone-list.php");
        }

        public function addCellphone(){
            require_once(VIEWS_PATH."add-cellphone.php");
        }
    }
?>