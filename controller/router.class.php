<?php
  class router{
    /*
    * @the registry
    *
    */

    private $registry;


    /*
    * @the controller path
    */
    private $path;
    private $args = array();
    public $file;
    public $controller;
    public $action;
    function __construct($registry){
      $this->registry = $registry;

    }


  }

?>
