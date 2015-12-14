<?php
//added by Singleton to check the permission for the reports

ini_set('memory_limit', '382M');
require_once(dirname(__FILE__).'/../../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
$context = sfContext::createInstance($configuration);
$user = $context->getUser();

sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
?>
          </div>
          <!--content ends-->
          
          <?php include_partial('global/sidebar');?>

        </div>
        <!--main ends-->
        
        <?php include_partial('global/header');?>
        <?php include_partial('global/footer');?>
        
      </div>
    </div>
  </div>
  <!--wrapper ends-->
  <?php if (has_slot('popup')) include_slot('popup')?>
</body>
</html>

