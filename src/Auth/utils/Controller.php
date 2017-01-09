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
          $p = password_hash(
              base64_encode($p),
              PASSWORD_DEFAULT, ['cost' => 9]
          );
          return $this->model->register($u, $p);
      }

      public function login($u, $p)
      {
          $p = base64_encode($p);
          return $this->model->login($u, $p);
      }
  }
