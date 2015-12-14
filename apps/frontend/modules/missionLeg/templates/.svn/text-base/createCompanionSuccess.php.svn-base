<div class="add-mission">
							<?php if(isset($mission) && isset($mission_leg)):?>
							<div class="add-mission-entry">
								<h2>Add Mission</h2>
								<a href="#" class="btn-action-grey"><span>CANCEL</span></a>
								<a href="#" class="btn-action-grey"><span>SAVE DRAFT</span></a>

								<em class="autosave">Autosaved 3:01 PM (0 minutes ago)</em>
							</div>
							<h3>Itinerary #
              <?php 
              if(isset($iti)){
                echo $iti->getId();
              }
              ?>
							Details:</h3>
							<form action="<?php echo url_for('@save_companion')?>" method="post" id="form">
								<fieldset>
									<div class="mission-dtls">
										<dl>
											<dt>Mission Type:</dt>

											<dd>
										  <?php if($iti->getMissionTypeId()):?>
                        <?php $mission_type = MissionTypePeer::retrieveByPK($iti->getMissionTypeId());?>
                        <?php if($mission_type):?>
                           <?php echo $mission_type->getName();?>
                        <?php endif;?>
                      <?php endif;?>
											</dd>
											<dt>Origin</dt>
											<dd><a href="#">
                      <?php if($iti->getOrginCity() || $iti->getOrginState()):?>
                          <?php echo $iti->getOrginCity() .' , '. $iti->getOrginState()?>
                      <?php endif;?>							
											</a></dd>
											<dt>Transportation Type:</dt>
											<dd>
												<select>
													<option>Air Mission</option>

												</select>
												<em class="view-edit"><a href="#">view</a>/<a href="#">edit</a></em>
											</dd>
										</dl>
										<dl>
											<dt>Passenger:</dt>
											<dd>
                       <?php if($iti->getPassengerId()):?>
                                    <?php $passenger = PassengerPeer::retrieveByPK($iti->getPassengerId())?>
                                    <?php if($passenger):?><?php $pass_person = PersonPeer::retrieveByPK($passenger->getPersonId())?><?php endif;?>
                                <?php endif;?>
												<a href="#">
												  <?php if(isset($pass_person)):?>
                             <?php echo $pass_person->getTitle() .' . '.$pass_person->getLastName() .' '.$pass_person->getFirstName()?>
                          <?php endif;?>
												</a>
												<div class="dtl-pop-up">
													<div class="t">&nbsp;</div>
													<div class="c">
													  <?php
                              if($pass_person){
                                if($pass_person->getCity() || $pass_person->getState() || $pass_person->getCountry()){
                                  echo $pass_person->getCity() .' , '. $pass_person->getState() .' , '.$pass_person->getCountry();
                                }
                                if($pass_person->getDayPhone()){
                                  echo $pass_person->getDayPhone().'('.$pass_person->getDayComment().')';
                                }
                                if($pass_person->getEveningPhone()){
                                  echo $pass_person->getEveningPhone().'('.$pass_person->getEveningComment().')';
                                }
                                if($pass_person->getMobilePhone()){
                                  echo $pass_person->getMobilePhone().'('.$pass_person->getMobileComment().')';
                                }
                              }
                              ?>
													</div>
													<div class="b">&nbsp;</div>
												</div>
											</dd>

											<dt>Passenger Type:</dt>
											<dd>
												<a href="#">
											  <?php if($passenger):?>
                            <?php $passenger_type = PassengerTypePeer::retrieveByPK($passenger->getPassengerTypeId())?>
                            <?php if(isset($passenger_type)):?>
                                <?php echo $passenger_type->getName()?>
                            <?php endif;?>
                        <?php endif;?>
												</a>
												<div class="dtl-pop-up">
													<div class="t">&nbsp;</div>
													<div class="c">
														[detailed information]
													</div>

													<div class="b">&nbsp;</div>
												</div>
											</dd>
											<dt>Requester:</dt>
											<dd><a href="#">
											 <?php if($iti->getRequesterId()):?>
                          <?php $requester = RequesterPeer::retrieveByPK($iti->getRequesterId())?>
                          <?php if(isset($requester)):?><?php $person = PersonPeer::retrieveByPK($requester->getPersonId())?><?php endif;?>
                          <?php if(isset($person)):?>
                              <?php echo $person->getTitle() .' . '.$person->getFirstName() .' '.$person->getLastName() ?>
                          <?php endif;?>
                      <?php endif;?>
											</a></dd>
											<dt>Destination:</dt>
											<dd><a href="#">
											   <?php if($iti->getDestCity() || $iti->getDestState()):?>
                          <?php echo $iti->getDestCity() .' , '. $iti->getDestState()?>
                        <?php endif;?>
											</a></dd>

										</dl>
									</div>
									<h3>Previous Companions for <?php echo $pass_person->getLastName() .' ' .$pass_person->getFirstName()?></h3>
									
									<?php $pre_companions = CompanionPeer::getByPassId($passenger->getId());?>
									
									<?php if(isset($pre_companions)):?>
									<table class="companion-table">
										<thead>
											<tr>
												<td class="cell-1">Companion</td>
												<td>Relationship</td>

											</tr>
										</thead>
										<tbody>
										  <?php $count = 0;?>
											<?php foreach ($pre_companions as $com):?>
											 <?php $count++?>
											<?php endforeach;?>
											<?php if(isset($count)):?><input type="hidden" name="max" value="<?php echo $count?>"/><?php endif; ?>
										<?php foreach ($pre_companions as $com):?>
											<tr>
												<td class="cell-1">
													<input type = checkbox checked="checked" name="compare_product_id[]" value="<?php echo $com->getId()?>"/>
													<label for="<?php echo $com->getId()?>"><?php echo $com->getName()?></label>
												</td>
												<td class="cell-2"><?php echo $com->getRelationship()?></td>
											</tr>
											<?php endforeach;?>
										</tbody>
									</table>
									<?php endif;?>
									<div class="add-mission-submit">
										<a href="#" class="btn-action" onclick="$('#submit').click();return false;"><span>Add Selected</span><strong>&nbsp;</strong></a>
										<em>OR</em>
										<?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)):?><a href="<?php echo url_for('@passenger_view?id='.$passenger->getId().'&back='.$mission_leg->getId())?>" class="btn-action"><span>Add New Companion</span><strong>&nbsp;</strong></a><?php endif?>
										<em>OR</em>
										<a href="<?php echo url_for('mission')?>" class="btn-action"><span>Done Adding Companions</span><strong>&nbsp;</strong></a>
									</div>
									<input type="hidden" id="mission_leg" name="mission_leg" value="<?php echo $mission_leg->getId()?>" />
									<input type="submit" class="hide" value="submit" />
								</fieldset>
								<input class="hide" type="submit" value="submit" id="submit"/>
							</form>
							<?php endif?>
						</div>
