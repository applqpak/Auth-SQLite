<?php

  include 'Model.php';

  class Controller
  {
      private $model;

      public function __construct()
      {
          $this->model = new Model();
      }

      public function register($u, $p)
      {
          $p = base64_encode(
            md5($p)
          );
          return $this->model->register($u, $p);
      }

      public function login($u, $p)
      {
          $p = base64_encode(
              md5($p)
          );
          return $this->model->login($u, $p);
      }
  }
