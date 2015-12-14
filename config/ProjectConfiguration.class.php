<?php

# FROZEN_SF_LIB_DIR: D:\wamp\bin\php\php5.2.9-2\PEAR\symfony

require_once dirname(__FILE__).'/../lib/symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
     date_default_timezone_set("America/Phoenix");
    // for compatibility / remove and enable only the plugins you want
    $this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
  }
}
