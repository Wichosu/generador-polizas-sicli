<?php
  namespace Helpers;

  if(!function_exists('encrypt')) {
    function encrypt($folio) {
      $metodo = "AES-256-CBC";
      $llave = hash('sha256', 'LEON ES EL HIJO MAS BONITO DEL MUNDO');
      $iv = substr(hash('sha256', '07.0216171089'), 0, 16);
  
      $output = openssl_encrypt($folio, $metodo, $llave, 0, $iv);
  
      $output = base64_encode($output);
  
      $resto1 = substr($output, 0, 7);
      $resto2 = substr($output, 7, 5);
      $resto3 = substr($output, 12, 8);
      $resto4 = substr($output, 20, 6);
      $resto5 = substr($output, 26, 6);
  
      $folio_interno = $resto1 . '-' . $resto2 . '-' . $resto3 . '-' . $resto4 . '-' . $resto5;
  
      return $folio_interno;
    }
  }
