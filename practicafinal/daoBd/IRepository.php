<?php  namespace daoBd;

interface IRepository{

    function Add($obj);
    function getAll();
    function retrieveData();
    function saveData();
    function read($id); 
}

?>
