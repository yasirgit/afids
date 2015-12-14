<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<div class="pilot-requests">
  <h2>Pilots Requests</h2>
  <div class="filtering">
    <form action="#" id="filter_form" method="post">
      <fieldset>
        <div class="holder">
           <label for="form-item-1">Request Date Range</label>
           <?php echo $date_widget->render('req_date1', $req_date1);?>
           <strong class="to">to</strong>
          <?php echo $date_widget->render('req_date2', $req_date2);?>
        </div>
         <div class="holder">
           <label for="form-item-2">Mission Date Range</label>
           <input id="req_date2" class="text" type="text"/>
           <strong class="to">to</strong>
           <input type="text" class="text" title="mission-date-range"/>
        </div>
        <div class="holder alt">
          <label>Show:</label>
          <ul class="display-choice">
            <li>
              <input id="form-item-3" type="checkbox" checked="checked"/>
              <label for="form-item-3">Not Processed</label><b></b>
            </li>
            <li>
              <input id="form-item-4" type="checkbox" checked="checked"/>
              <label for="form-item-4">On Hold</label>
            </li>
            <li>
              <input id="form-item-5" type="checkbox" checked="checked"/>
              <label for="form-item-5">Processed</label>
            </li>
          </ul>
        </div>
        <input class="hide" type="submit" value="submit"/>
      </fieldset>
    </form>
  </div>
<!--  END filtering-->
  <div class="pager">
    <div>
      <a class="btn-pager-prev" href="#">Previous</a>
      <span class="active-page">1</span>
      <strong>
      of
      <a href="#">12</a>
      </strong>
      <a class="btn-pager-next" href="#">Next</a>
    </div>
  </div>
<!--  END PAGER-->
  <div class="pilot-request-table">
  <?php if(isset($pilot_reqs)):?>
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
         <?php foreach ($pilot_reqs as $req):?>
          <tr>
            <td class="cell-1">
              <strong class="date">
                  <?php 
                  if($req->getDate()){
                    echo $req->getDate('m/d/Y');
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
                      <a href="#">ACCEPT</a>
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
              <?php echo input_in_place_editor_tag('edit_comment'.$req->getId(), 'pilotRequest/saveComment?id='.$req->getId(),array('save_text'=>'Save')) ?>    
            </td>
          </tr>
         <?php endforeach;?>
        </tbody>
      </table>
    <?php endif;?>
  </div>
  
  
<!--  END pilot-request-table-->
  <div class="pager">
    <div>
      <a class="btn-pager-prev" href="#">Previous</a>
      <span class="active-page">1</span>
      <strong>
      of
      <a href="#">12</a>
      </strong>
      <a class="btn-pager-next" href="#">Next</a>
    </div>
  </div>
</div>

  <?php 
  echo jq_form_remote_tag(array(
  'update'  => 'result',
  'url'     => 'missionRequest/ajax',
  'method'  => 'post',
  ), array(
  'id'    => 'form',
  'style' => 'display:block;'
  ));
  ?> 
    <input type="hidden" value="" id="start_date" name="start_date"/>
    <input type="hidden" value="" id="end_date" name="end_date"/>
    <input type="submit" class="hide" id="form_submit"/>
</form>

<div id="result"">
</div>
<!--END PILOT REQ-->
<script type="text/javascript">
//<![CDATA[

<?php
$dates = array();

if(isset($pilot_reqs)){
  foreach ($pilot_reqs as $req){
    $dates[$req->getDate()] = "{$req->getId()} : '{$req->getDate()}'";
  }
}
?>
var len = <?php echo sizeof($dates) ?>;
var dates = {<?php echo join(',', $dates)?>};

var date1 = jQuery('#req_date1').val();
var date2 = jQuery('#req_date2').val();

jQuery('#req_date2').change(function(){
  if(jQuery('#req_date1').val() && jQuery('#req_date2').val()){
    var from = jQuery('#req_date1').val();
    var to = jQuery('#req_date2').val();
    jQuery('#start_date').val(from);
    jQuery('#end_date').val(to);
    jQuery('#form_submit').click();
  }
});
jQuery('#boo').click(function(){
  alert($('#resutl').html());
});
//]]>
</script>
