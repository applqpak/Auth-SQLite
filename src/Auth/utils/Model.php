<?php

  class Model
  {
      private $db;

      public function __construct()
      {
          $this->db = new PDO('sqlite:users');
          $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      public function register($u, $p)
      {
          $this->db->prepare('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY AUTOINCREMENT, username VARCHAR NOT NULL, password VARCHAR NOT NULL);')->execute();
          $stmt    = $this->db->prepare('SELECT password FROM users WHERE username=:username;');
          $stmt->bindValue(':username', $u);
          $stmt->execute();
          $results = $stmt->fetchAll();
          if(count($results) >= 1)
          {
              return false;
          }
          $stmt = $this->db->prepare('INSERT INTO users(username, password) VALUES(:username, :password);');
          $stmt->bindValue(':username', $u);
          $stmt->bindValue(':password', $p);
          $stmt->execute();
          return true;
      }

      public function login($u, $p)
      {
          $this->db->prepare('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY AUTOINCREMENT, username VARCHAR NOT NULL, password VARCHAR NOT NULL);')->execute();
          $stmt    = $this->db->prepare('SELECT password FROM users WHERE username=:username;');
          $stmt->bindValue(':username', $u);
          $stmt->execute();
          $results = $stmt->fetchAll();
          if(count($results) >= 1)
          {
              foreach($results as $row)
              {
                  if(password_verify($p, $row['password']))
                  {
                      return true;
                  }
              }
          }
          return false;
      }
  }
