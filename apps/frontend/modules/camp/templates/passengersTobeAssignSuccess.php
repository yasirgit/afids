                  <table>
                    <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Location</th>
                      <th>Weights</th>
                      <th>Comments</th>
                      <th>Distance</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $camps_missions = MissionPeer::getByCampId($camp_id);
                    $linked_passengers = array();
                    $passengers = array();
                    $cc = 0;
                    foreach ($camps_missions as $miss){
                      $legs = MissionLegPeer::getbyMissIdNoPilotId($miss->getId());
                      if($legs && isset ($legs) && $miss->getMissionDate('Ymd')==$flight_date){
                          $passengers[$cc] = $miss->getPassengerId();
                          $cc++;
                      }
                    }
                    if(isset($passengers)){
                     for($u=0;$u<count($passengers);$u++){
                        //if passenger is linked and listed already, dont show
                        $print = true;
                        foreach ($linked_passengers as $key => $value){
                            if($passengers[$u]==$value) {
                                $print = false;
                                break;
                            }

                        }
                        if($print){
                            //$assigned_pass = CampPilotPassengerPeer::getByCamp($camp_id);

                            $pass = PassengerPeer::retrieveByPK($passengers[$u]);

                            $camp_passenger = CampPassengerPeer::retrieveByPK($camp_id, $passengers[$u]);
                            $passenger_link = null;
                            if($camp_passenger && $camp_passenger->getLink()!=null){
                                $passenger_link = PassengerPeer::retrieveByPK($camp_passenger->getLink());
                            }

                            $person = $pass->getPerson();?>

                       <tr id="<?php echo $person->getId();?>">
                        <td <?php if($passenger_link) echo 'rowspan=2 valign=middle'?>>
                       <input type="hidden" id="person_id" name="person_id" value="<?php echo $person->getId()?>"/>
                            <a href="javascript:submitAssignPass(<?php echo $passengers[$u]?>)" class="link-assign" id="<?php echo $passengers[$u]?>"></a></td>
                        <td>
                           <?php if(isset($person)):?>
                            <?php echo $person->getLastName().' '.$person->getFirstName()?>
                           <?php endif?>
                        </td>
                        <?php if($passenger_link){?>
                        <td rowspan="2">
                                    <?php echo image_tag('u31.png', 'width:10px; height:5px;')?>
                        </td>
                        <?php }else{?>
                        <td>
                        </td>
                        <?php }?>
                        <td>
                        <?php if(isset($person)):?>
                            <?php echo $person->getCity().' '.$person->getState().' '.$person->getAddress1()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($pass)):?>
                            <?php echo $pass->getWeight()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($camp_passenger)):?>
                            <?php echo $camp_passenger->getNote()?>
                           <?php endif?>
                        </td>
                        <td>
                      </tr>
<!-- if passenger is linked with another passenger, show linked pass -->
<?php
                       if($passenger_link){
                         $camp_passenger_link = CampPassengerPeer::retrieveByPK($camp_id, $passenger_link->getId());
                         $person = $passenger_link->getPerson();
                         $linked_passengers[$passenger_link->getId()] = $passenger_link->getId();
                         ?>

                       <tr id="<?php echo $person->getId();?>">
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
                         <?php if(isset($passenger_link)):?>
                            <?php echo $passenger_link->getWeight()?>
                           <?php endif?>
                        </td>
                        <td>
                         <?php if(isset($camp_passenger_link)):?>
                            <?php echo $camp_passenger_link->getNote()?>
                           <?php endif?>
                        </td>
                        <td>
                        </td>
                      </tr> 
<!-- -->
                        <?php   };//end if?>
                        <?php   };//end if print?>
                        <?php   };//end for?>
                     <?php };?>
                    </tbody>
                  </table>
