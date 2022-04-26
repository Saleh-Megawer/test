<?php 



/**
 * Encrypt Text
 */


function encrypt($textplain)
{
   return openssl_encrypt($textplain, 'aes-128-cbc', 'KEY_FOR_ENCRYPT', 0, '1234567891011121');
}



function decrypt($textplain)
{
   return openssl_decrypt($textplain, 'aes-128-cbc', 'KEY_FOR_ENCRYPT', 0, '1234567891011121');
}




function hash_pass($pass)
{
    return password_hash($pass,PASSWORD_DEFAULT);
}