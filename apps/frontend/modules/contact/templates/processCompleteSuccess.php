<h2>Process Contact Request Complete</h2>
<br/>
The contact request has been processed. the Contact ID assigned is:
<?php echo $contact_id?>
<br/><br/>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Volunteer'), false)){ ?>
<?php echo link_to('Process Another Request', 'contact/listRequest')?>
<?php } ?>