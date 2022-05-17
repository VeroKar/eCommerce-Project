<?php

    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['user_username'])){
          return true;
        } else {
          return false;
        }
      }

      function getAdminAccess() {
        if (isLoggedIn()) {
          $controller = new Controller;
          $access = $controller->model('OwnerModel');
          $access2 = ($access->getAccess())->isAdmin;
          if ($access2 == "1") {
            return true;
          }
          else {
            return false;
          }
        }
        else {
          return false;
        }
      }
  
?>