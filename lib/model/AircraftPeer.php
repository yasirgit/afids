<?php

class AircraftPeer extends BaseAircraftPeer
{
  public static function getPager(
  $max = 10,
  $page = 1,
  $make = null,
  $model = null,
  $name = null
  )
  {
    $c = new Criteria();

    if ($make) $c->add(self::MAKE , $make.'%', Criteria::LIKE);
    if ($model) $c->add(self::MODEL , $model.'%', Criteria::LIKE);
    if ($name) $c->add(self::NAME , $name.'%', Criteria::LIKE);

    $c->addAscendingOrderByColumn(self::MODEL);

    $pager = new sfPropelPager('Aircraft', $max);
    $pager->setCriteria($c);
    $pager->setPage($page);
    $pager->init();
    return $pager;
  }
  
  public static function getForSelectParent()
  {
    $c = new Criteria();

    $c->addAscendingOrderByColumn(self::MAKE);
    $c->addAscendingOrderByColumn(self::MODEL);

    $aircrafts = self::doSelect($c);
    $arr = array();
    $arr[0] = '-- select --';

    foreach ($aircrafts as $aircraft)
    {
      $arr[$aircraft->getId()] = $aircraft->getName();
    }
    return $arr;
  }

  public static function getOnlyMakes()
  {
    $c = new Criteria();
    $c->addAscendingOrderByColumn(self::MAKE);
    //$c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    $makes = self::doSelect($c);
    $arr = array();

    foreach ($makes as $make)
    {
      $arr[$make->getMake()] = $make->getMake();
    }
    return $arr;
  }

  public static function getOnlyModels($make="")
  {
    $c = new Criteria();
    if($make) $c->add(self::MAKE, $make);
    $c->addAscendingOrderByColumn(self::MODEL);
    //$c->addAscendingOrderByColumn(self::DISPLAY_NAME);

    $models = self::doSelect($c);
    $arr = array();

    foreach ($models as $model)
    {
      $arr[$model->getModel()] = $model->getModel();
    }
    return $arr;
  }
  public static function getPilotsThatFlySpecificAircraft($max = 10, $page = 1, $make = null, $model = null,
  $name = null)
  {
  	if(intval($page) < 1)
  	{
  		$page = 1;
  	}
  	if(intval($max) < 1)
  	{
  		$max = 1;
  	}
    $conn = Propel::getConnection(self::DATABASE_NAME);
    
    // Get total pages    
    $query = "SELECT COUNT(*) AS count FROM aircraft INNER JOIN afa_leg ON ( aircraft.id = afa_leg.aircraft_id AND aircraft.name = '".$name."' AND afa_leg.pilot_name IS NOT NULL) GROUP BY afa_leg.pilot_name";
    $statement = $conn->prepare($query);
    $statement->execute();
    $count = array();
  	while ($row = $statement->fetch()){
      $count[] = $row;
    }    
    
    $query = "SELECT COUNT(afa_leg.pilot_name) AS total_times, afa_leg.day_phone, afa_leg.night_phone, afa_leg.aircraft_id, afa_leg.pilot_name, aircraft.name
FROM aircraft INNER JOIN afa_leg ON ( aircraft.id = afa_leg.aircraft_id AND aircraft.name = '".$name."' AND afa_leg.pilot_name IS NOT NULL) GROUP BY afa_leg.pilot_name LIMIT ".($page -1)* $max.",".$max;    
    $statement = $conn->prepare($query);
    $statement->execute();
	$array = array();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
      $array[] = $row;
    }    
    return array($array, $count);
  }
}
