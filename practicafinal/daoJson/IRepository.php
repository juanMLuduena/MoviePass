<?php  namespace daoJson;

interface IRepository{

    function Add($obj);
    function getAll();
    function saveData();
    function retrieveData();
    function read($id);
  
}

?>
