<?php
class APIKeyGenerator
{

/**
*
* @param string $algo The algorithm (md5, sha1, whirlpool, etc)
* @param string $data The data to encode
* @param string $salt The salt (This should be the same throughout the system probably)
* @return string The hashed/salted data
*/
public static function create($algo, $salt)
{

$context = hash_init($algo, HASH_HMAC, $salt);
hash_update($context, substr(sha1(rand()), 0, 30));

return hash_final($context);

}

}