<?php use_helper('jQuery'); ?>
<?php use_helper('Form');
?>
<h2>Members Needing a Badge or Notebook</h2>
<p>
The following are the members who need Notebooks or Badges:
</p>
 <?php if ($pager->getNbResults()) {?>
<div class="pager">
  <div>
    <form action="<?php echo url_for('@member_needsbn')?>">
      <?php echo link_to('Previous', '@member_needsbn?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@member_needsbn?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@member_needsbn?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<br/>

<div id="body_part">
<table class="member-table">
<thead>
  <tr>
    <td>Member External ID</td>
    <td>Name/Address</td>
    <td>Notebook</td>
    <td>Badge</td>
  </tr>
</thead>
<tbody>
  <?php foreach ($members as $member): ?>
  <tr>
    <td class="cell-1">
        <?php if($member->getExternalId()){?><a href="<?php echo url_for('@member_view?id='.$member->getId())?>"><?php echo $member->getExternalId()?></a>
        <?php }else{
                echo $member->getExternalId();
        }?>
    </td>
    <td class="cell-2">
        <?php 
        $person = PersonPeer::retrieveByPK($member->getPersonId());
        echo $person->getName()?>
        <?php if($person->getAddress1()){echo '<br/>'.$person->getAddress1();}?>
        <?php if($person->getAddress2()){echo '<br/>'.$person->getAddress2();}?>
        <?php if($person->getCity()){echo '<br/>'.$person->getCity();}?>
        <?php if($person->getState()){echo '<br/>'.$person->getState();}?>
        <?php if($person->getZipcode()){echo '<br/>'.$person->getZipcode();}?>
        <?php if($person->getCountry()){echo '<br/>'.$person->getCountry();}?>
        
    </td>
    <td class="cell-3">
        <?php
    if($member->getBadgeMade()){
        echo '<br/>'.$member->getBadgeMade('m/d/Y');
    } else {?>
        <table width="50%" align="center">
            <tr>
                <td class="cell-10">
        <a href="<?php echo url_for('@member_update_bn?id='.$member->getId().'&type=b')?>" class="btn-dtls" onclick=""><span>Done</span></a>
                </td>
            </tr>
        </table>
    <?php }?>
    </td>
    <td class="cell-3">
    <?php
    if($member->getNotebookSent()){
        echo '<br/>'.$member->getNotebookSent('m/d/Y');
    } else {?>
        <table width="50%" align="center">
            <tr>
                <td class="cell-10">
        <a href="<?php echo url_for('@member_update_bn?id='.$member->getId().'&type=n')?>" class="btn-dtls"><span>Done</span></a>
                </td>
            </tr>
        </table>
    <?php }?>
    </td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
</div>

<div class="pager">
  <div>
    <form action="<?php echo url_for('@member_needsbn')?>">
      <?php echo link_to('Previous', '@member_needsbn?page='.$pager->getPreviousPage(), array('class' => 'btn-pager-prev'))?>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), '@member_needsbn?page='.$pager->getLastPage())?></strong>
      <?php echo link_to('Next', '@member_needsbn?page='.$pager->getNextPage(), array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
<?php }?>