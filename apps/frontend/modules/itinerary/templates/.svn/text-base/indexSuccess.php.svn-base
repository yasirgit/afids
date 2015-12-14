<?php 
use_helper('Form', 'Javascript');
$date_widget = $sf_data->getRaw('date_widget');
use_javascripts_for_form($date_widget);
use_stylesheets_for_form($date_widget);
?>
<?php use_helper('Form');?>
<h2>Itinerary</h2>
<div class="missions-available">
  <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=itinerary')?>">
    <input type="hidden" name="filter" value="1"/>
    <div class="missions-available-filter">
      <div class="bg">
        <div class="characteristic_clean">
          <div class="holder">
            <div>
              <label for="ff_date_req">Date Requested</label>
                <?php echo $date_widget->render('date_req', $date_req);?>
              <br clear="left"/>
              <label for="ff_id">Itinerary Id</label>
              <input type="text" class="text" id="ff_id" name="id"/>
            </div>
            <div>
              <label for="ff_pass_name">Passenger First Name</label>
              <!--<input type="text" class="text" value="<?php //echo $pass_name?>" id="ff_pass_name" name="pass_name"/>-->
              <?php echo input_auto_complete_tag('pass_name', $pass_name == '*' ? '' : $pass_name,
                                      'itinerary/autoCompletePassenger',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
              <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              <br clear="left"/>
              <label for="ff_pass_name">Passenger Last Name</label>
              <!--<input type="text" class="text" value="<?php //echo $pass_name?>" id="ff_pass_name" name="pass_name"/>-->
              <?php echo input_auto_complete_tag('pass_lname', $pass_lname == '*' ? '' : $pass_lname,
                                      'itinerary/autoCompletePassengerLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
              <span id="person_indicator3" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              <br clear="left"/>
            </div>
            <div>
              <label for="ff_requester_name">Requester First Name</label>
              <!--<input type="text" class="text" value="<?php //echo $req_name?>" id="ff_requester_name" name="req_name"/>-->
              <?php echo input_auto_complete_tag('req_name', $req_name == '*' ? '' : $req_name,
                                      'itinerary/autoCompleteRequester',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
              <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              <br clear="left"/>
              <label for="ff_requester_name">Requester Last Name</label>
              <!--<input type="text" class="text" value="<?php //echo $req_name?>" id="ff_requester_name" name="req_name"/>-->
              <?php echo input_auto_complete_tag('req_lname', $req_lname == '*' ? '' : $req_lname,
                                      'itinerary/autoCompleteRequesterLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator4',
                                      )
                                       ); ?>
              <span id="person_indicator4" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>
              <br clear="left"/>
            </div>
          </div>
          <input type="submit" value="Find"/>
          <?php echo link_to('reset', '@default_index?module=itinerary&filter=1')?>
        </div>
        <input type="submit" class="hide" value="submit"/>
      </div>
    </div>
  </form>
</div>
  
<?php if ( isset($pager) && $pager->getNbResults()) {?>
<div class="pager">
  Itinerary per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=itinerary&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=itinerary')?>">
      <?php echo link_to('Previous', '@default_index?module=itinerary&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=itinerary&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=itinerary&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>Date requested</td>
    <td>Mission type</td>
    <td>Passenger</td>
    <td>Requester</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($itinerary_list as $itinerary): ?>
  <tr>
    <td class="cell-1">
        <?php if($itinerary->getDateRequested()):?><?php echo $itinerary->getDateRequested('m/d/y')?><?php endif;?>
    </td>
    <td class="cell-1">
         <?php if($itinerary->getMissionTypeId()):?>
           <?php $miss_type = MissionTypePeer::retrieveByPK($itinerary->getMissionTypeId())?>
           <?php if($miss_type):?>
              <?php echo $miss_type->getName()?>
           <?php endif;?>
         <?php endif;?>
    </td>
     <td class="cell-1">
         <?php if($itinerary->getPassengerId()):?>
            <?php $passenger = PassengerPeer::retrieveByPK($itinerary->getPassengerId())?>
            <?php if($passenger):?>
                <?php $person = $passenger->getPerson();?>
                <?php if($person):?>
                    <?php echo $person->getTitle().' '.$person->getFirstName().' '.$person->getLastName()?>
                <?php endif;?>
             <?php endif;?>
         <?php endif;?>
    </td>
    <td class="cell-1">
         <?php if($itinerary->getRequesterId()):?>
            <?php $requester = RequesterPeer::retrieveByPK($itinerary->getRequesterId())?>
            <?php if($requester):?>
                <?php $person = $requester->getPerson();?>
                <?php if($person):?>
                    <?php echo $person->getTitle().' '.$person->getFirstName().' '.$person->getLastName()?>
                <?php endif;?>
             <?php endif;?>
         <?php endif;?>
    </td>
    <td char="cell-1">
      <ul class="action-list">
        <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) :?><a href="<?php echo url_for('itinerary/detail?id='.$itinerary->getId())?>" class="action-view">details</a><?php endif?></li>
        <li><?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a href="<?php echo url_for('@itinerary_edit?id='.$itinerary->getId())?>" class="action-edit">edit</a><?php endif;?></li>
        <li><?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)):?>
        	<?php echo link_to('remove', '@itinerary_delete?id='.$itinerary->getId(), array('method' => 'delete', 'confirm' => '"Do you really want to remove this itinerary?" Yes / Cancel', 'class' => 'action-remove'));?>
        	<?php endif;?>
        </li>
        <!--<li><?php if($sf_user->hasRights('itinerary_copy')):?><a href="<?php echo url_for('@itinerary_copy?id='.$itinerary->getId().'&type=copy')?>" class="action-copy">copy</a><?php endif?></li>-->
        <li>
            <?php if($itinerary->getCancelItinerary() == 1): ?>
            <a href="javascript:void(0)" id="action-cancel" itineraryid="<?php echo $itinerary->getId()?>" class="action-remove action-cancel">Cancel</a>
                <?php //echo link_to('cancel', 'itinerary/canceItinerary?id='.$itinerary->getId(), array('confirm' => '"Do you really want to cancel this itinerary?" Yes / Cancel', 'class' => 'action-remove action-cancel'));?>
            <?php elseif($itinerary->getCancelItinerary() == 0): ?>
                <?php echo '<font color="red">cancelled</font>';?>
            <?php endif;?>
                 <!--<a href="<?php //echo url_for('itinerary/canceItinerary?id='.$itinerary->getId())?>" class="action-remove">Cancel</a>-->            
            <?php //echo link_to('cancel', 'itinerary/canceItinerary?id='.$itinerary->getId(), array('method' => 'canceItinerary', 'confirm' => '"Do you really want to cancel this itinerary?" Yes / Cancel', 'class' => 'action-remove'));?>
        </li><br>
      </ul>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>
<div id="cancel-ajax-success" style="display:none"></div>
<div class="pager">
  Itinerary per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=itinerary&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=itinerary')?>">
      <?php echo link_to('Previous', '@default_index?module=itinerary&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=itinerary&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=itinerary&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>
<div id="loading-lightbox-overlay" style="display:none;opacity: 0.55; background-color: rgb(0, 0, 0); position: absolute; overflow: hidden; top: 0px; left: 0px; z-index: 100000; width: 976px; height: auto;">
  <span>
         <img id="loading-lightbox-overlay-image" src="/images/ajax-loader.gif">
    </span>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#loading-lightbox-overlay").height((jQuery(document).height() + 175)).width(jQuery(document).width());        
    });
jQuery.fn.center = function () {
        this.css("position","absolute");
        this.css("top", ( jQuery(window).height() - this.height() ) / 2 + jQuery(window).scrollTop() + "px");
        this.css("left", ( jQuery(window).width() - this.width() ) / 2 + jQuery(window).scrollLeft() + "px");
        return this;
}
function isCheckedBoxChecked(){
    var flag = false;
    jQuery('.mailable').each(function(){
        if(jQuery(this).is(':checked')) {
            flag = true;
        }
    });
    return flag;
}
function sendemaileToAllPersonsReelatedToItinerary(){ 
    jQuery.ajax({
                url: '<?php echo url_for('itinerary/cancelItinerary')?>',
                data: jQuery('#persons_emails_form').serialize(),
                dataType: 'html',
                method: 'post',
                success: function(html){
                    window.location.href = window.location.href;
                    jQuery("#loading-lightbox-overlay").hide();
                },
                error:function(){
                    alert('error');
                },
                beforeSend: function(){
                    jQuery("#loading-lightbox-overlay").show();
                }
            });
}

jQuery('.action-cancel').click(function(){
    var itineraryid = jQuery(this).attr("itineraryid");
    jQuery('#loading-lightbox-overlay-image').center();
    jQuery.ajax({
                url: '<?php echo url_for('itinerary/cancel')?>',
                data: {id: itineraryid},
                dataType: 'html',
                method: 'post',
                success: function(html){
                     jQuery("#cancel-ajax-success").html(html);
                     jQuery('#cancel-ajax-success').dialog("open");
                     jQuery("#loading-lightbox-overlay").hide();
                },
                error:function(){
                    alert('error');
                },
                beforeSend: function(){
                    jQuery("#loading-lightbox-overlay").show();
                }
            });
   
  
});
jQuery('#cancel-ajax-success').dialog({
       buttons: {
           "No": function() {
             jQuery(this).dialog("close");
           },
           "Yes" : function(){
              if(isCheckedBoxChecked())
              {
                  jQuery(this).dialog("close");
                  jQuery("#show-alert").hide();
                  sendemaileToAllPersonsReelatedToItinerary();
              }else {
                 jQuery("#show-alert").show();
              }
           }
       },
       title: "Cancel Itinerary",
       width: 850,
       hide: "slide",
       modal: true,
       show: 'slide',
       autoOpen: false
  });  
</script>

