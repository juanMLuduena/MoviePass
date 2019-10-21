<?php namespace DAO;

interface IRepository{

    function add($obj);
    function getAll();
    function saveData();
    function retrieveData();
    function update($data);
    function delete($id);
}



?>