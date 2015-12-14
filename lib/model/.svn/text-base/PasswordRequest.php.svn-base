<?php

class PasswordRequest extends BasePasswordRequest
{
  /**
   * (non-PHPdoc)
   * @see angelflight/lib/model/om/BasePasswordRequest#save($con)
   */
  public function save(PropelPDO $con = null)
  {
    # generate new token and save
    $this->setToken(md5($this->getEmail().time()));
    parent::save($con);
  }
}
