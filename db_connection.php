<?php

  $server = "localhost";
  $username = "root";
  $password = "Osu!W1ch0";
  $db = "sicli";

  $conn = new mysqli($server, $username, $password, $db);

  if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
