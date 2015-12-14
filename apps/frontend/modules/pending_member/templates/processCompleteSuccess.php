<h2>Process Member Application Complete</h2>
The membership application has been processed. the Member External ID assigned is:
<?php if(isset($member_id)) echo $member_id; else echo '--'; ?>
<br />
<?php echo link_to('Process Another Application', 'pending_member/index')?>