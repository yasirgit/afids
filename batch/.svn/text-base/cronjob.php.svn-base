<?php

	ini_set('memory_limit', '382M');
	require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
	
	$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
	sfContext::createInstance($configuration);	
	sfContext::getInstance()->getController()->sendEmail('email', 'sendBulkQueueEmail');