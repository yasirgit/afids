<?php use_helper('Form', 'Object', 'jQuery')?>

<h2>Mission Orientation Pilots</h2>
<?php if ($sf_user->hasCredential(array('Administrator','Staff'), false)) {?>
      <?php echo link_to('Add MOP', 'pilot/mopAdd'); ?>
<?php }?>
<div>
  <br/>
  <form action="<?php echo url_for('pilot/mopDirectory')?>">
    Region
    <?php echo select_tag('wing_id', objects_for_select($wings, 'getId', 'getName', $wing_id))?>
    <input type="submit" value="Get List" id="mop_form_submit"/>
  </form>
</div>

<?php if ($wing_id && $pager->getNbResults()) {?>
<div class="pager">
  <div>
    <form action="<?php echo url_for('pilot/mopDirectory')?>">
      <?php echo link_to('Previous', 'pilot/mopDirectory?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'pilot/mopDirectory?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'pilot/mopDirectory?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>

<table class="mission-request-table">
  <thead>
    <tr>
      <td>Pilot</td>
      <td>Contact</td>
      <td></td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pilots as $pilot) {
      /* @var $pilot Pilot */
      $member = $pilot->getMember();
      $person = $member->getPerson();
    ?>
    <tr>
      <td>
        <strong><?php echo link_to($person->getName(), 'pilot/view?id='.$pilot->getId())?></strong><br/>
        <?php echo $person->getAddress1().' '.$person->getAddress2()?><br/>
        <?php echo $person->getCity().', '.$person->getState().' '.$person->getZipcode()?>
      </td>
      <td>
        <?php
        if ($person->getDayPhone()) echo 'Day: '.$person->getDayPhone().' '.$person->getDayComment().'<br/>';
        if ($person->getEveningPhone()) echo 'Eve: '.$person->getEveningPhone().' '.$person->getEveningComment().'<br/>';
        if ($person->getMobilePhone()) echo 'Mobile: '.$person->getMobilePhone().' '.$person->getMobileComment().'<br/>';
        if ($person->getFaxPhone1()) echo 'Fax1: '.$person->getFaxPhone1().' '.$person->getFaxComment1().'<br/>';
        if ($person->getPagerPhone()) echo 'Pager: '.$person->getPagerPhone().' '.$person->getPagerComment().'<br/>';
        if ($person->getEmail()) echo 'Email: '.mail_to($person->getEmail());
        ?>
      </td>
      <td>
        SEI: <?php echo $pilot->getSeInstructor() ? $pilot->getSeInstructor() : 'No'?><br/>
        MEI: <?php echo $pilot->getMeInstructor() ? $pilot->getMeInstructor() : 'No'?>
      </td>
      <td>  
          <center>
                 <?php if ($sf_user->hasCredential( array( 'Administrator'), false)):?>
                        <?php echo link_to('remove', 'pilot/mopDelete?id='.$pilot->getId(), array('method' => 'delete', 'confirm' => 'Are you sure to remove this pilot from MOP list?', 'class' => 'action-remove'));?>                                                    
                  
                    <ul class="status-list">
                        <li>
                            <?php if($pilot->getMopActiveStatus() == 0):?>
                                <a href="" onclick="onActive(<?php echo $pilot->getId() ?>); return false;">Activate</a>
                            <?php else:?>
                              <a href="" onclick="onDeActive(<?php echo $pilot->getId() ?>); return false;">De-activate</a>
                            <?php endif?>
                        </li>                  
                    </ul>
                  <?php endif;?>
          </center>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php echo $pager->getNbResults()?> members selected according to these criteria<br/>
<?php echo jq_link_to_function('search again', "document.location=''")?>
<?php }?>
<div id="on_accept_container1" class="on-accept-dialog" style="display:none">
       Do you wish, to show this MOP on pilot view?
     <br />
</div>

<div id="on_decline_container1" class="on-decline-dialog" style="display:none">
       Are you sure, to hide this MOP from pilot view?
      <br />
</div>

<script type="text/javascript">
    function onActive(pilot_id)
    {      
      
      jQuery('#on_accept_container1').dialog({
      autoOpen: false,
      width: 350,
      buttons: {
          "Ok": function() {
            jQuery.ajax({
                url: "/pilot/active",
                data : ({ id: pilot_id }),
                success: function(){
                    window.location.href = window.location.href;
                }
                });
            jQuery(this).dialog("close");
          },
          "Cancel": function() {
            jQuery(this).dialog("close");
          }
        },
       title: "MOP hide/show on pilot view",
       hide: "slide",
       modal: true,
       show: 'slide'
    });
      jQuery('#on_accept_container1').dialog('open');
      return false;
    }

    function onDeActive(pilot_id)
    {
       
      
      jQuery('#on_decline_container1').dialog({
      autoOpen: false,
      width: 350,
      buttons: {
          "Ok": function() {
            jQuery.ajax({
                url: "/pilot/deactive",
                data : ({ id: pilot_id }),
                success: function(){
                    window.location.href = window.location.href;
                }
                });
            jQuery(this).dialog("close");
          },
          "Cancel": function() {
            jQuery(this).dialog("close");
          }
        },
       title: "MOP hide/show on pilot view",
       hide: "slide",
       modal: true,
       show: 'slide'
    });
      jQuery('#on_decline_container1').dialog('open');
      return false;
    }

</script>
