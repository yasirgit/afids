<?php

class VocationClass extends BaseVocationClass
{
  public function __toString()
  {
    return (string)$this->getName();
  }
}
