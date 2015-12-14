<?php

class ContactType extends BaseContactType
{
  public function  __toString() {
    return $this->getContactTypeDesc();
  }
}
