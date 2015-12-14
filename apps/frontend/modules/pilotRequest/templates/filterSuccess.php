
<div id="body_part">
  <div class="pilot-request-table">
  <?php if(isset($pilot_requests)):?>
      <table>
        <thead>
          <tr>
            <td class="cell-1">
              <a href="#">Request</a>
            </td>
            <td class="cell-2">
              <a href="#">ID</a>
            </td>
            <td class="cell-3">
              <a href="#">Date</a>
            </td>
            <td class="cell-4">
              <a href="#">Member</a>
            </td>
            <td class="cell-5">
              <a href="#">Type</a>
            </td>
            <td class="cell-6">
              <a href="#">Coordinator</a>
            </td>
            <td>
              <a href="#">Status</a>
            </td>
          </tr>
        </thead>
        <tbody>
         <?php foreach ($pilot_requests as $req):?>
          <tr>
            <td class="cell-1">
              <strong class="date">
                  <?php 
                  if($req->getDate()){
                    echo $req->getDate();
                  }
                  ?>
                  
              </strong>
              <em class="time">12:55:44 PM</em>
            </td>
            <td class="cell-2">
              <dl>
                <dt>I:</dt>
                  <dd>
                    <?php echo $req->getId() ?>
                  </dd>
                <dt>M:</dt>
                  <dd>
                  <?php 
                  if($req->getLegId()){
                    $mission_leg = MissionLegPeer::retrieveByPK($req->getLegId());
                    if(isset($mission_leg)){
                      if($mission_leg->getMissionId()){
                        $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
                        echo $mission->getId().' - '.$mission_leg->getId();
                      }
                    }
                  }
                  ?>
                  </dd>
              </dl>
            </td>
            <td class="cell-3">
                  <?php 
                  if($req->getDate()){
                    echo $req->getDate('m/d/Y');
                  }
                  ?>
            </td>
            <td class="cell-4">
                <?php 
                if($req->getMemberId()){
                  $member = MemberPeer::retrieveByPK($req->getMemberId());
                  if(isset($member)){
                    $person = $member->getPerson();
                    if(isset($person)){
                      echo $person->getTitle().', '.$person->getLastName().' '.$person->getFirstName();
                      echo ' ';
                      if($member->getFlightStatus()){
                        echo $member->getFlightStatus();
                      }
                    }
                  }
                }
                ?>
            </td>
            <td class="cell-5">
              <?php 
              if(isset($member)){
                if($member->getFlightStatus()){
                  echo $member->getFlightStatus();
                }
              }
              ?>
              <em class="type-note">
              <?php if($req->getMissionAssistantWanted() == 1){
                echo 'Mission Requester wanted!.';
              }
              ?>
              </em>
            </td>
            <td class="cell-6">
            <?php 
            if(isset($member)){
              $coordinator = CoordinatorPeer::getByMemberId($member->getId());
              if(isset($coordinator)){
                echo $coordinator->getInitialContact();
              }
            }
            ?>
            </td>
            <td>
              <div class="status">
              <?php 
              $newtimestamp = strtotime("-1 days",strtotime($req->getDate()));
              ?>
                <strong>
                <?php 
                if(date('m/d/y',$newtimestamp) <= $req->getDate()){
                  echo 'New';
                }
                ?>
                </strong>
                <em class="time">
                </em>
                  <ul class="status-list">
                    <li>
                      <a href="<?php echo url_for('@pilot_req_accept?id='.$req->getId())?>">ACCEPT</a>
                    </li>
                    <?php if($req->getOnHold() != 1):?>
                    <li>
                      <a class="status-hold" href="#">PLACE ON HOLD</a>
                    </li>
                    <?php endif;?>
                    <li>
                      <a class="status-process" href="#">PROCESS</a>
                    </li>
                  </ul>
              </div>
            </td>
          </tr>
          <tr class="comment">
            <td class="col-1">Comment:</td>
            <td colspan="6">
            <?php if($req->getComment()):?>
              <div id="<?php echo 'edit_comment'.$req->getId()?>">--<?php echo $req->getComment();?>--</div>
            <?php else:?>
              <div id="<?php echo 'edit_comment'.$req->getId()?>">--Click here leave comment--</div>
            <?php endif?>
              <?php //echo input_in_place_editor_tag('edit_comment'.$req->getId(), 'pilotRequest/saveComment?id='.$req->getId(),array('save_text'=>'Save')) ?>    
            </td>
          </tr>
         <?php endforeach;?>
        </tbody>
      </table>
    <?php endif;?>
  </div>
  </div>
  </div>
  