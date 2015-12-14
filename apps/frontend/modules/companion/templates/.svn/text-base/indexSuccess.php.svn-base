<?php use_helper('Javascript', 'Form') ?>
<div class="person-view"> 
<h2>Companion List</h2>
</div>
<!--  Search companion-->
  <div class="missions-available">
    <form id="filter_form" method="post" action="<?php echo url_for('@default_index?module=companion')?>">
    <input type="hidden" name="filter" value="1"/>
    <fieldset>
      <div class="missions-available-filter">
        <div class="bg">
          <div class="characteristic_clean">
            <div class="holder">
              <div>
                <label for="ff_firstname">First Name</label>
                <!--<input type="text" class="text" value="<?php echo $firstname?>" id="ff_firstname" name="firstname"/>-->
                <?php echo input_auto_complete_tag('firstname', $firstname == '*' ? '' : $firstname,
                                      'companion/autoCompleteFirst',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator',
                                      )
                                       ); ?>
                                        <span id="person_indicator" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

                <br clear="left"/>
                <label for="ff_lastname">Last Name</label>
                <!--<input type="text" class="text" value="<?php echo $lastname?>" id="ff_lastname" name="lastname"/>-->
                <?php echo input_auto_complete_tag('lastname', $lastname == '*' ? '' : $lastname,
                                      'companion/autoCompleteLast',
                                      array('autocomplete' => 'off', 'class'=>'text narrow','style'=>'200px'),
                                      array(
                                      'use_style'    => true,
                                      'indicator'    =>'person_indicator1',
                                      )
                                       ); ?>
                                        <span id="person_indicator1" style="display:none"><?php echo image_tag('/images/loading.gif')?></span>

              </div>
               <div>
                <label for="ff_name">Companion Name</label>
                <input type="text" class="text" value="<?php echo $name?>" id="ff_name" name="name"/>
                <br clear="left"/>
                <label for="ff_relationship">Relationship to Passenger</label>
                <input type="text" class="text" value="<?php echo $relationship?>" id="ff_relationship" name="relationship"/>
              </div>
            </div>
            <input type="submit" value="Find"/>
            <?php echo link_to('reset', '@default_index?module=companion&filter=1')?>
          </div>
          <input type="submit" class="hide" value="submit"/>
        </div>
      </div>
    </fieldset>
  </form>
  </div>
  
<?php if ( isset($pager) &&$pager->getNbResults()) {?>
<div class="pager">
  Companion per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=companion&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=companion')?>">
      <?php echo link_to('Previous', '@default_index?module=companion&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=companion&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=companion&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>


<table class="mission-request-table">
<thead>
  <tr>
    <td>FirstName</td>
    <td>LastName</td>
    <td>Name</td>
    <td>Relationship</td>
    <td>Date of birth</td>
    <td>Action</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($companions as $companion): ?>
  <?php $pass_id = $companion->getPassengerId()?>
  <?php if($pass_id):?>
        <?php $person_id = PassengerPeer::retrieveByPK($pass_id)->getPersonId();?>
        <?php $person  = PersonPeer::retrieveByPK($person_id);?>
  <?php endif;?>
  <tr>
    <td class="cell-1">
        <?php if(isset($person)):?><?php echo $person->getFirstName()?><?php endif;?>
    </td>
    <td class="cell-2">
        <?php if(isset($person)):?><?php echo $person->getLastName()?><?php endif;?>
    </td>
    <td class="cell-1"><?php if($companion->getName()):?><?php echo $companion->getName()?><?php endif;?></td>
    <td class="cell-1">
    <?php if($companion->getRelationship()):?>
          <?php echo $companion->getRelationship();?>
    <?php else:?>
     --
    <?php endif;?>
    </td>
     <td class="cell-2">
    <?php if($companion->getDateOfBirth()):?>
          <?php echo $companion->getDateOfBirth();?>
    <?php endif;?>
    </td>
    <td class="cell-1">
        <?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?><a class="link-edit" href="<?php echo url_for('@companion_edit?id='.$companion->getId())?>">edit</a><?php endif;?>
        
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>

<div class="pager">
  Companion per page:
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, '@default_index?module=companion&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('@default_index?module=companion')?>">
      <?php echo link_to('Previous', '@default_index?module=companion&page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@default_index?module=companion&page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@default_index?module=companion&page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>

