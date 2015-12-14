<?php

class Person extends BasePerson
{
  /**
   * (non-PHPdoc)
   * @see angelflight/lib/model/om/BasePerson#save($con)
   */
  public function save(PropelPDO $con = null)
  {
    if ($this->isColumnModified(PersonPeer::PASSWORD)) {
      $this->setPassword($this->encryptPassword($this->getPassword()));
    }
    
    parent::save($con);
  }
  
  /**
   * Validates if the password matches
   * @param string $password
   * @return bool
   */
  public function isPassword($password)
  {
    return $this->getPassword() == $this->encryptPassword($password);
  }
  
  /**
   * Any password encryption algorithm can be found here
   * @param string $password
   * @return string Encrypted password
   */
  private function encryptPassword($password)
  {
    return md5($password);
  }
  
  public function getName()
  {
    return $this->getFirstName().' '.$this->getLastName();
  }

  public function getLocation()
  {
    return $this->getCity().', '.$this->getState();
  }

  /**
   * @return Member
   */
  public function getMember()
  {
    $c =  new Criteria();
    $c->add(MemberPeer::PERSON_ID, $this->getId());

    return MemberPeer::doSelectOne($c);
  }
}
