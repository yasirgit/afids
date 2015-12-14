<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<?php use_helper('jQuery'); ?>
<table class="pass">
    <?php if(isset($message)){?>
<tr>
    <td colspan="4"><?php echo $message;?></td>
</tr>
    <?php }?>
    <?php
$pilot_req = PilotRequestPeer::retrieveByPK($pilot_req_id);
                      #get passengers assigned to this pilot date

                      if(isset($pilot_req) && $pilot_req instanceof PilotRequest){
                        if($pilot_req->getGroupCampId()){
                          $camp_id = $pilot_req->getGroupCampId();

                          $pilot = PilotPeer::getByMemberId($pilot_req->getMemberId());
                          
                          #get Missions which has selected Camp
                          if(isset($camp_id) && $pilot){
//                            $camp_pilot_passengers = CampPilotPassengerPeer::getByCampPilot($camp_id, $pilot_req->getMemberId());
//                            foreach ($camp_pilot_passengers as $cpp){


                            $passengers = array();
                            $missions = MissionPeer::getByCampId($camp_id);
                            foreach ($missions as $miss){
                              $legs = MissionLegPeer::getbyMissId($miss->getId());
                              if(isset($legs) && $legs[0]->getPilotId()==$pilot->getId()
                                      && $miss->getMissionDate('Ymd')==$flight_date)
                                $passengers[$miss->getPassengerId()] = $miss;
                            }
                            foreach ($passengers as $cpp){

                                $pass = $cpp->getPassenger();
                              if($pass)$person = $pass->getPerson();
?>
                                <tr>
                        <td>
                           <?php if(isset($person)):?>
                            <?php echo $person->getLastName().' '.$person->getFirstName()?>
                           <?php endif?>
                        </td>
                        <td>
                        <?php if(isset($person)):?>
                            <?php echo $person->getCity().' '.$person->getState().' '.$person->getAddress1()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($pass)):?>
                            <?php echo $pass->getWeight()?> lbs
                           <?php endif?>
                        </td>
                        <td class="aa">
                         <?php if(isset($pass)):?>
                        <a href="#" class="action-remove" onclick="getID($('#div_id').val(), <?php echo $pilot_req->getMemberId()?>, <?php echo $pilot_req->getId()?>); removePassenger(<?php echo $pass->getId()?>);">
                                remove
                        </a>
                        <?php endif?>
                        </td>
                                </tr>

<?php                       }
                          }
                        }
                      }
?>
</table>
