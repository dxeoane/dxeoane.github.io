<?php
  /*
      error_reporting(0); 
      $key = hash('sha256', 'Clave secreta', true); 
      $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
              'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
              'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
              'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
              'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
              'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n";
      $encryptedcbc = mcrypt_cbc(MCRYPT_RIJNDAEL_128,$key,$data,MCRYPT_ENCRYPT);
      echo base64_encode($encryptedcbc); 
  */
  error_reporting(0); 
  if ($cipher = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '')) {
    $key = hash('sha256', 'Clave secreta', true); 
    $iv = "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0";
    $data = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n".
            'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234867890'."\n";
    if (mcrypt_generic_init($cipher, $key, $iv) >= 0) { 
      $data = mcrypt_generic($cipher,$data);     
      echo base64_encode($data);
      mcrypt_generic_deinit($cipher);
    }    
    mcrypt_module_close($cipher);
  }
	