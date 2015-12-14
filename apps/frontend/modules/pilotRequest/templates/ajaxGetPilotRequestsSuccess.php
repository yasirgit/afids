<?php //use_javascript('ui/ui.core.min.js')?>
<?php //use_javascript('ui/ui.dialog.min.js')?>
<?php //use_javascript('ui/ui.draggable.min.js');?>

<?php use_helper('Form');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>

<?php use_helper('Javascript', 'Form') ?>
<?php use_helper('jQuery', 'Form') ?>

<div class="pilot-requests">
    <div class="pager">
        Pilot Request per page:
        <?php foreach ($max_array as $i => $v) {
            if ($i) echo ' | ';            
            if($max != $v): ?>
        <a href='javascript:void(0)' max ="<?php echo $v?>" page='<?php echo $pager->getPage()?>' onclick='loadPilotRequest(this)'><?php echo $v?></a>
        <?php else:?>
             <?php echo $v?>
        <?php endif;?>
        <?php }?>
        <div>
            <form id="pagination_form" onsubmit="return loadPilotRequest(this);return false;" action="<?php echo url_for('@default_index?module=pilotRequest')?>">
                <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getPreviousPage()?>" onclick="loadPilotRequest(this)" class="btn-pager-prev"><?php echo $pager->getPreviousPage()?></a>
                <input type="text" max="<?php echo $max?>" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
                <input type="hidden" name="max" value="<?php echo $max?>" />
                <strong>of <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getLastPage()?>" onclick="loadPilotRequest(this)"><?php echo $pager->getLastPage()?></a></strong>
                <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getNextPage()?>" onclick="loadPilotRequest(this)" class="btn-pager-next"><?php echo $pager->getNextPage()?></a>
                <input type="submit" class="hide"/>
            </form>
        </div>
    </div>
    <br/>
    <!--  END PAGER-->
    <div id="body_part">
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
                                        if($req->getDate()) {
                                            echo $req->getDate('m/d/Y');
                                        }
                                        ?>
                            </strong>
                            <!-- <em class="time">12:55:44 PM</em>-->
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
                                            $miss_date = null;
                                            if($req->getLegId()) {
                                                $mission_leg = MissionLegPeer::retrieveByPK($req->getLegId());
                                                if(isset($mission_leg)) {
                                                    if($mission_leg->getMissionId()) {
                                                        $mission = MissionPeer::retrieveByPK($mission_leg->getMissionId());
                                                        echo $mission->getId().' - '.$mission_leg->getLegNumber();

                                                        $miss_date = $mission->getMissionDate('m/d/Y');
                                                    }
                                                }
                                            }
                                            ?>
                                </dd>
                            </dl>
                        </td>
                        <td class="cell-3">
                                    <?php
                                    echo $miss_date;
                                    ?>
                        </td>
                        <td class="cell-4">
                                    <?php
                                    if($req->getMemberId()) {
                                        $member = MemberPeer::retrieveByPK($req->getMemberId());
                                        if(isset($member)) {
                                            $person = $member->getPerson();
                                            if(isset($person)) {
                                                echo $person->getTitle().', '.$person->getLastName().' '.$person->getFirstName();
                                                echo ' ';
                                                if($member->getFlightStatus()) {
                                                    echo $member->getFlightStatus();
                                                }
                                            }
                                        }
                                    }
                                    ?>
                        </td>
                        <td class="cell-5">
                                    <?php
                                    if(isset($member)) {
                                        if($member->getFlightStatus()) {
                                            echo $member->getFlightStatus();
                                        }
                                    }
                                    ?>
                            <em class="type-note">
                                        <?php if($req->getMissionAssistantWanted() == 1) {
                                            echo 'Mission Assistant wanted!.';
                                        }
                                        ?>
                            </em>
                        </td>
                        <td class="cell-6">
                                    <?php
                                    if(isset($member)) {
                                        $coordinator = CoordinatorPeer::getByMemberId($member->getId());
                                        if(isset($coordinator)) {
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
                                            if(date('m/d/y',$newtimestamp) <= $req->getDate()) {
                                                echo 'New';
                                            }
                                            ?>
                                </strong>
                                <em class="time">
                                </em>
                                <ul class="status-list">
                                    <li>
                                                <?php if($req->getAccepted()==0):?>
                                        <a href="" onclick="onAccept(<?php echo $req->getId().','.$req->getMemberId()?>); return false;">ACCEPT</a>
                                                <?php else:?>
                                        <a href="" onclick="onDecline(<?php echo $req->getId().','.$req->getMemberId()?>); return false;">DECLINE</a>
                                                <?php endif?>
                                    </li>
                                    <li>
                                                <?php if($req->getOnHold() == 0):?>
                                        <a href="<?php echo url_for('@pilot_req_hold?id='.$req->getId())?>" class="status-hold">PLACE ON HOLD</a>
                                                <?php else:?>
                                        <a href="<?php echo url_for('@pilot_req_hold?id='.$req->getId())?>" class="status-hold">SET NOT HOLD</a>
                                                <?php endif?>
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
    </div>
</div>

<!--  END pilot-request-table-->
<div class="pager">
        Pilot Request per page:
        <?php foreach ($max_array as $i => $v) {
            if ($i) echo ' | ';
            if($max != $v): ?>
                <a href='javascript:void(0)' max ="<?php echo $v?>" page='<?php echo $pager->getPage()?>' onclick='loadPilotRequest(this)'><?php echo $v?></a>
            <?php else:?>
             <?php echo $v?>
            <?php endif;?>
        <?php }?>
        <div>
            <form onsubmit="return loadPilotRequest(this);return false;" action="<?php echo url_for('@default_index?module=pilotRequest')?>">
                <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getPreviousPage()?>" onclick="loadPilotRequest(this)" class="btn-pager-prev"><?php echo $pager->getPreviousPage()?></a>
                <input type="text" max="<?php echo $max?>" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
                <strong>of <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getLastPage()?>" onclick="loadPilotRequest(this)"><?php echo $pager->getLastPage()?></a></strong>
                <a href="javascript:void(0);" max="<?php echo $max?>" page="<?php echo $pager->getNextPage()?>" onclick="loadPilotRequest(this)" class="btn-pager-next"><?php echo $pager->getNextPage()?></a>
                <input type="submit" class="hide"/>
            </form>
        </div>
    </div>
<br/>

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
<div id="result">
</div>

<div id="on_accept_container1" class="on-accept-dialog">
    Do you wish to add this pilot to the mission leg?
    <br />
</div>

<div id="on_accept_container2" class="on-accept-dialog">
    Do you wish to process all outstanding pilot requests?
    <br />
</div>

<div id="on_decline_container1" class="on-decline-dialog">
    Are you sure?
    <br />
</div>

<div id="on_decline_container2" class="on-decline-dialog">
    Do you wish to decline all outstanding pilot requests?
    <br />
</div>

<input type="hidden" value="0" id="leg_id" name="leg_id"/>
<input type="hidden" value="0" id="mem_id" name="mem_id"/>
<!--END PILOT REQ-->
<script type="text/javascript">
    //<![CDATA[

<?php
$dates = array();

if(isset($pilot_reqs)) {
    foreach ($pilot_reqs as $req) {
        $dates[$req->getDate()] = "{$req->getId()} : '{$req->getDate()}'";
    }
}
?>
    var len = <?php echo sizeof($dates) ?>;
    var dates = {<?php echo join(',', $dates)?>};

    var date1 = jQuery('#req_date1').val();
    var date2 = jQuery('#req_date2').val();
    /*
jQuery('#req_date2').change(function(){
  if(jQuery('#req_date1').val() && jQuery('#req_date2').val()){
    var from = jQuery('#req_date1').val();
    var to = jQuery('#req_date2').val();
    jQuery('#start_date').val(from);
    jQuery('#end_date').val(to);
//    jQuery('#form_submit').click();
  }
});

jQuery('#boo').click(function(){
  alert(jQuery('#resutl').html());
});

function filterForm()
{
  jQuery('#body_part').css('opacity', 0.6);
  jQuery.ajax({
    url : '/pilotRequest/filter',
    type: 'POST',
    data: jQuery("#form_filter").serialize(),
    success: function(data){
      jQuery('#body_part').css('opacity', 1).html(data);
    }
  });
}
function timeout_init() {
  timeout = setTimeout('filterForm()', 3000);
}
jQuery('#form_filter input:text').bind('click', function(){
  filterForm();
  timeout_init();
});
jQuery('#form_filter input:checkbox').bind('click', function(){
  filterForm();
});
     */

    function onAccept(leg_id,mem_id)
    {
        jQuery('#leg_id').val(leg_id);
        jQuery('#mem_id').val(mem_id);
        jQuery('#on_accept_container1').dialog('open');
        return false;
    }

    function onDecline(leg_id,mem_id)
    {
        jQuery('#leg_id').val(leg_id);
        jQuery('#mem_id').val(mem_id);
        jQuery('#on_decline_container1').dialog('open');
        return false;
    }

    jQuery('#on_accept_container1').dialog({
        autoOpen: false,
        width: 200,
        buttons: {
            "Ok": function() {
                jQuery.ajax({
                    url: "/pilotRequest/accept",
                    data : ({ id: jQuery('#leg_id').val()})
                });
                jQuery(this).dialog("close");
                jQuery('#on_accept_container2').dialog('open');
            },
            "Cancel": function() {
                jQuery(this).dialog("close");
            }
        }
    });

    jQuery('#on_decline_container1').dialog({
        autoOpen: false,
        width: 200,
        buttons: {
            "Ok": function() {
                jQuery.ajax({
                    url: "/pilotRequest/accept",
                    data : ({ id: jQuery('#leg_id').val()})
                });
                jQuery(this).dialog("close");
                jQuery('#on_decline_container2').dialog('open');
            },
            "Cancel": function() {
                jQuery(this).dialog("close");
            }
        }
    });

    jQuery('#on_accept_container2').dialog({
        autoOpen: false,
        width: 300,
        buttons: {
            "Ok": function() {
                jQuery.ajax({
                    url: "/pilotRequest/acceptAll",
                    data : ({ id: jQuery('#leg_id').val(), member: jQuery('#mem_id').val()}),
                    success: function(){
                        window.location = "/pilotRequest/index";
                    }});
                jQuery(this).dialog("close");
            },
            "Cancel": function() {
                jQuery.ajax({
                    success: function(){
                        window.location = "/pilotRequest/index";
                    }});
                jQuery(this).dialog("close");
            }
        }
    });

    jQuery('#on_decline_container2').dialog({
        autoOpen: false,
        width: 300,
        buttons: {
            "Ok": function() {
                jQuery.ajax({
                    url: "/pilotRequest/declineAll",
                    data : ({ id: jQuery('#leg_id').val(), member: jQuery('#mem_id').val()}),
                    success: function(){
                        window.location = "/pilotRequest/index";
                    }});
                jQuery(this).dialog("close");
            },
            "Cancel": function() {
                jQuery.ajax({
                    success: function(){
                        window.location = "/pilotRequest/index";
                    }});
                jQuery(this).dialog("close");
            }
        }
    });

    jQuery('#req_date1').datepicker();
    jQuery('#req_date2').datepicker();
    jQuery('#miss_date1').datepicker();
    jQuery('#miss_date2').datepicker();
    //]]>
</script>
