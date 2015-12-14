<div class="preferences" style="width:325px;">
  <div class="frame">
    <div class="bg">
      <div class="holder">
        <h4>Person Record 
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)) {?>
          <a class="action-view" href="<?php echo url_for('@person_view?id='.$person->getId())?>">View</a>
        <?php }?>
        </h4>
        <?php echo ($person->getTitle()?$person->getTitle().'. ':'').$person->getName()?><br/>
        <?php echo ($person->getCity()?$person->getCity().', ':'').$person->getState()?><br/>
        <?php echo $person->getCountry()?>
      </div>
    </div>
  </div>
</div>

<div class="passenger-form">
    <div class="boardmember-view">
	<h2><?php echo $title ?></h2>
        <br>
        <table border="1"  class="boardmember-view-table">
            <thead>
                <tr>
                    <th>Start year</th>
                    <th>End year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($value as $row){ ?>
                <tr>
                    <td><center><?php echo $row->startyear; ?></center></td>
                    <td><center> <?php echo $row->endyear; ?></center></td>
                    <td><center>
                         <?php if ($sf_user->hasCredential(array('Administrator'), false)) { ?>
                            <a href="#" class="link-de-activate"><?php echo link_to('de-activate','@board_delete?id='.$row->id,array('post' => true , 'confirm' => 'Are you sure want to de-activate' )) ?></a>
                         <?php } ?>
                    </center></td>
                </tr>
              <?php } ?>
            </tbody>
        </table>
	  
	<div class="form-submit">        
		<a href="<?php echo url_for('@person_view?id='.$person->getId()) ?>" class="cancel">Cancel</a>
	</div>	
    </div>
</div>



