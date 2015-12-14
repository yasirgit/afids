<?php

class PasswordRequestPeer extends BasePasswordRequestPeer
{
  /**
   * @param string $token
   * @return PasswordRequest
   */
  public static function getByToken($token)
  {
    $c = new Criteria();
    $c->add(self::TOKEN, $token);
    
    return self::doSelectOne($c);
  }
}
