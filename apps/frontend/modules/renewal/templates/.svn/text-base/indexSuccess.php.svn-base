<?php /* if($sf_user->hasFlash('success')):?>

<h2>Process Member Application Completed</h2>
The membership application has been processed. the Member ID assigned is:
<?php echo $member_id;?>
<br />
<br />
<?php endif;*/?>
<h2>New Member Renewal</h2>

<p>To process completed renewals, click on the "Process" link in the
"Action" column.<p/>
<p>For incomplete applications, click on the applicant's email address to send him
or her an email with a paper application form as a follow up. Otherwise, click
on the "remove" link to simply process the incomplete application without
sending an email.</p>

The following applications have not been processed:

<?php if ($pager->getNbResults()) {?>
<div class="pager">
  Application per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'renewal/index?max='.$v);
  }?>
  <div style="float:right;">
    <form action="<?php echo url_for('renewal/index')?>">
      <?php echo link_to('Previous', 'renewal/index?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" style="height: 16" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'renewal/index?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'renewal/index?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<a href="#addpassenger-popup" id="add_new_passenger" class="open-popup"></a>
<table class="mission-request-table">
  <thead>
    <tr>
      <td>Id</td>
      <td>Date</td>
      <td>Name</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($application_temp_list as $application_temp): ?>
    <tr>
      <td align="center"><?php echo $application_temp->getId();?></td>
      <td><?php echo $application_temp->getApplicationDate('n/j/Y g:i a') ?></td>
      <td>
        <strong>
          <a href="member/view?id=<?php echo $application_temp->getMemberId();?>">
          <?php echo $application_temp->getFirstName() ?>
          <?php echo $application_temp->getLastName() ?>
          </a>
        </strong>
        <br/>
        <?php echo $application_temp->getApplicantPilot() ? 'Pilot' : 'Non-pilot'?>
        <br/>
        <?php if ($application_temp->getSpousePilot()) echo 'Spouse: Pilot'?>
      </td>
        <?php if ($application_temp->getIsComplete() > 0) {?>
                <td><?php echo $application_temp->getEmail() ?></td>
        <?php }else{?>
                <td>
                    <a href="#" onclick="jQuery('#add_new_passenger').click(); 
                        jQuery('input[name=to]').val('<?php echo $application_temp->getEmail()?>');
                        jQuery('input[name=email]').val('<?php echo $application_temp->getEmail()?>');
                        jQuery('input[name=id]').val('<?php echo $application_temp->getId()?>');
                        return false;">
                    <?php echo $application_temp->getEmail() ?>
                    </a>
                </td>
                                       
        <?php }?>
      <td>
        <?php if ($application_temp->getIsComplete() > 0) {?>
          <?php echo link_to('Process', 'renewal/processStep1?id='.$application_temp->getId(), array('class' => 'action-edit'))?>
        <?php }else{?>
          Incomplete
        <?php }?>
        <?php echo link_to('View', 'renewal/show?id='.$application_temp->getId(), array('class' => 'action-view'))?>
        <?php echo link_to('Remove', 'renewal/delete?id='.$application_temp->getId(), array('class' => 'action-remove', 'method' => 'delete', 'confirm' => 'Are you sure?'))?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="pager">
  Application per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'renewal/index?max='.$v);
  }?>
  <div style="float:right;">
    <form action="<?php echo url_for('renewal/index')?>">
      <?php echo link_to('Previous', 'renewal/index?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" style="height: 16" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'renewal/index?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', 'renewal/index?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

 <?php slot('popup') ?>
   <div class="add-passenger" id="addpassenger-popup" style="display: none; z-index: 1001; position: absolute; left: 400px; top: 145px; ">
     <div class="holder">
        <div class="bg">
          <div id="passenger_form">
              <h3>Email Applicant and Remove from List</h3><br>
              <form action="<?php echo url_for('renewal/sendMail') ?>" method="post" id="mail_form">
                  <input name="id" type="hidden" value="" size="70"/>
                  <table width="100%" cellpadding="5">
                  <tr>
                      <td width="15%">To:
                      </td>
                      <td>
                          <input name="to" disabled value="" size="70"/>
                          <input type="hidden" name="email" id="email"  value="" size="70"/>
                      </td>
                  </tr>
                  <tr>
                      <td>Subject:
                      </td>
                      <td><input type="text" name="subject" value="Incomplete Application" size="70"/>
                      </td>
                  </tr>
                  <tr>
                      <td>Note:
                      </td>
                      <td><textarea name="body" cols="70" rows="5">
Your application was not completed.We are going to close this application and you will need to start a new one.

Regards,
Angel Flight West</textarea>
                      </td>
                  </tr>
                  <tr>
                      <td>
                      </td>
                      <td>
                        <div class="form-submit">
                              <a href="#" onclick="jQuery('#mail_form').submit(); return false;" class="btn-action"><span>Send</span><strong>&nbsp;</strong></a>
                              <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
                        </div>
                      </td>
                  </tr>
              </table>
              </form>
          </div>
        </div>
     </div>
   </div>
<?php end_slot() ?>