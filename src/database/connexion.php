<?php
session_start();

function connectToDB(){
  $db = new PDO('mysql:host=localhost;dbname=mmi-champs;charset=UTF8;port=3306', 'root', '');
  return $db;
}
