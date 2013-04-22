<?php
session_start();
 
class HelloWorld_Model extends CI_Model {
 
  function save($arg1) {
    $_SESSION['var1'] = $arg1;
  }
 
  function load() {
    return empty($_SESSION['var1']) ? 'default value' : $_SESSION['var1'];
  }
 
}
