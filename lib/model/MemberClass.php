<?php

class MemberClass extends BaseMemberClass
{
  public function __toString()
  {
    return (string)$this->getName();
  }
}
