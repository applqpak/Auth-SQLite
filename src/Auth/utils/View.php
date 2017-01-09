<?php

  include 'Controller.php';

  $controller = new Controller();

  if((isset($_REQUEST['action'])) && (isset($_REQUEST['username'])) && (isset($_REQUEST['password'])))
  {
      if($controller->{strtolower($_REQUEST['action'])}($_REQUEST['username'], $_REQUEST['password']))
      {
          echo 'true';
          return;
      }
      echo 'false';
      return;
  }
