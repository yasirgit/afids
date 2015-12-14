<?php

class RefSource extends BaseRefSource
{
  public function __toString()
  {
    return (string)$this->getSourceName();
  }
}
