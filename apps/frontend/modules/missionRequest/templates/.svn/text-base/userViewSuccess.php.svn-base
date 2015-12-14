
<div class="person-view">
<h2><?php echo $title?></h2>
<?php if($miss_req):?>
<h3>Mission Request Information</h3>
<?php if ($sf_user->hasCredential(array('Administrator','Staff','Coordinator'), false)):?> <?php echo link_to('edit mission request info', '@um_request_edit?id='.$miss_req->getId(), array('class' => 'link-edit'));?>
<?php endif;?>
<div class="person-info">
<dl class="person-data">
	<dt>Mission Date:</dt>
	<dd><?php echo $miss_req->getApptDate('m/d/Y') ? $miss_req->getApptDate('m/d/Y') : '--'?></dd>
	<dt>Appointment Date:</dt>
	<dd><?php ?></dd>
	<br />
	<dt>Return Date:</dt>
	<dd><?php echo $miss_req->getReturnDate('m/d/Y')?></dd>
	<dt>Orgin:</dt>
	<dd><?php echo $miss_req->getOrginIdent() ? $miss_req->getOrginIdent() : '--'?></dd>
	<dt>Destination:</dt>
	<dd><?php echo $miss_req->getDestIdent() ? $miss_req->getDestIdent() : '--'?></dd>
	<dt>Comment:</dt>
	<dd><?php echo $miss_req->getComment() ? $miss_req->getComment() : '--'?></dd>
	<dt>Processed Date:</dt>
	<dd><?php echo $miss_req->getProcessedDate() ? $miss_req->getProcessedDate() : '--'?></dd>
</dl>
</div>
<h3>Passenger Information</h3>
<div class="person-info">
<dl class="person-data">
	<dt>First Name:</dt>
	<dd><?php echo $miss_req->getPassFirstName()?></dd>
	<dt>Last Name:</dt>
	<dd><?php echo $miss_req->getPassLastName() ?></dd>
	<dt>Illness:</dt>
	<dd><?php echo $miss_req->getIllness() ?></dd>
	<dt>Financial Situation:</dt>
	<dd><?php echo $miss_req->getFinancial() ?></dd>
	<dt>City/Zipcode/State:</dt>
	<dd><?php echo $miss_req->getPassCity()?$miss_req->getPassCity().'/':'--'?><?php echo $miss_req->getPassZipcode()?$miss_req->getPassZipcode().'/':'--'?><?php echo $miss_req->getPassState()?$miss_req->getPassState().'/':'--'?></dd>
	<dt>Address:</dt>
	<dd><?php if ($miss_req->getPassAddress1()) echo $miss_req->getPassAddress1(); else echo '--'?></dd>
	<dd><?php if ($miss_req->getPassAddress2()) echo $miss_req->getPassAddress2(); else echo '--'?></dd>
	<dt>Email:</dt>
	<dd><?php echo $miss_req->getPassEmail()?></dd>
	<dt>Date of birth:</dt>
	<dd><?php if ($miss_req->getPassDateOfBirth()) echo $miss_req->getPassDateOfBirth(); else echo '--';?></dd>
</dl>
<dl class="person-data">
	<dt>Work Phone:</dt>
	<dd><?php echo $miss_req->getPassDayPhone()?></dd>
	<dt>Home Phone:</dt>
	<dd><?php echo $miss_req->getPassEvePhone() ?></dd>
	<dt>Cell Phone:</dt>
	<dd><?php echo $miss_req->getPassMobilePhone() ?></dd>
	<dt>Pager:</dt>
	<dd><?php echo $miss_req->getPassPagerPhone() ?></dd>
	<dt>Other:</dt>
	<dd><?php echo $miss_req->getPassOtherPhone()?></dd>
</dl>
</div>

<h3>Requester Information</h3>
<div class="person-info">
<dl class="person-data">
	<dt>First Name:</dt>
	<dd><?php echo $miss_req->getReqFirstName()?></dd>
	<dt>Last Name:</dt>
	<dd><?php echo $miss_req->getReqLastName() ?></dd>
	<dt>Agency Name:</dt>
	<dd><?php echo $miss_req->getAgencyName() ?></dd>
	<dt>City/Zipcode/State:</dt>
	<dd><?php echo $miss_req->getReqCity()?$miss_req->getReqCity().'/':'--'?><?php echo $miss_req->getReqZipcode()?$miss_req->getReqZipcode().'/':'--'?><?php echo $miss_req->getReqState()?$miss_req->getReqState().'/':'--'?></dd>
	<dt>Address:</dt>
	<dd><?php if ($miss_req->getReqAddress1()) echo $miss_req->getReqAddress1(); else echo '--'?></dd>
	<dd><?php if ($miss_req->getReqAddress2()) echo $miss_req->getReqAddress2(); else echo '--'?></dd>
	<dt>Email:</dt>
	<dd><?php echo $miss_req->getReqEmail()?></dd>
</dl>
<dl class="person-data">
	<dt>Work Phone:</dt>
	<dd><?php echo $miss_req->getReqDayPhone()?></dd>
	<dt>Home Phone:</dt>
	<dd><?php echo $miss_req->getReqEvePhone() ?></dd>
	<dt>Cell Phone:</dt>
	<dd><?php echo $miss_req->getReqMobilePhone() ?></dd>
	<dt>Pager:</dt>
	<dd><?php echo $miss_req->getReqPagerPhone() ?></dd>
	<dt>Other:</dt>
	<dd><?php echo $miss_req->getReqOtherPhone()?></dd>
</dl>
</div>

<h3>Companions</h3>
<div class="person-info"><?php if($miss_req->getCom1Name()):?>
<dl class="person-data">
	<dt>Companion Name 1:</dt>
	<dd><?php echo $miss_req->getCom1Name()?></dd>
	<dt>RelationShip:</dt>
	<dd><?php if($miss_req->getCom1Name()):?><?php echo $miss_req->getCom1Relationship() ?><?php endif ?></dd>
	<dt>Date of birth:</dt>
	<dd><?php echo $miss_req->getCom1DateOfBirth() ?></dd>
	<dt>Weight:</dt>
	<dd><?php if($miss_req->getCom1Weigth() != 0):?><?php echo $miss_req->getCom1Weigth()?><?php endif ?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getCom1Phone()?$miss_req->getCom1Phone().'/':''?><?php echo $miss_req->getCom1Comment()?$miss_req->getCom1Comment().'/':''?></dd>
</dl>
<?php endif;?> <?php if($miss_req->getCom2Name()):?>
<dl class="person-data">
	<dt>Companion Name 2:</dt>
	<dd><?php echo $miss_req->getCom2Name()?></dd>
	<dt>RelationShip:</dt>
	<dd><?php if($miss_req->getCom2Name()):?><?php echo $miss_req->getCom2Relationship() ?><?php endif ?></dd>
	<dt>Date of birth:</dt>
	<dd><?php echo $miss_req->getCom2DateOfBirth() ?></dd>
	<dt>Weight:</dt>
	<dd><?php if($miss_req->getCom2Weigth() != 0):?><?php echo $miss_req->getCom2Weigth()?><?php endif ?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getCom2Phone()?$miss_req->getCom2Phone().'/':''?><?php echo $miss_req->getCom2Comment()?$miss_req->getCom2Comment().'/':''?></dd>
</dl>
<?php endif;?> <?php if($miss_req->getCom3Name()):?>
<dl class="person-data">
	<dt>Companion Name 3:</dt>
	<dd><?php echo $miss_req->getCom3Name()?></dd>
	<dt>RelationShip:</dt>
	<dd><?php if($miss_req->getCom3Name()):?><?php echo $miss_req->getCom3Relationship() ?><?php endif ?></dd>
	<dt>Date of birth:</dt>
	<dd><?php echo $miss_req->getCom3DateOfBirth() ?></dd>
	<dt>Weight:</dt>
	<dd><?php if($miss_req->getCom3Weigth() != 0):?><?php echo $miss_req->getCom3Weigth()?><?php endif ?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getCom3Phone()?$miss_req->getCom3Phone().'/':''?><?php echo $miss_req->getCom3Comment()?$miss_req->getCom3Comment().'/':''?></dd>
</dl>
<?php endif;?> <?php if($miss_req->getCom4Name()):?>
<dl class="person-data">
	<dt>Companion Name 4:</dt>
	<dd><?php echo $miss_req->getCom4Name()?></dd>
	<dt>RelationShip:</dt>
	<dd><?php if($miss_req->getCom4Name()):?><?php echo $miss_req->getCom4Relationship() ?><?php endif ?></dd>
	<dt>Date of birth:</dt>
	<dd><?php echo $miss_req->getCom4DateOfBirth() ?></dd>
	<dt>Weight:</dt>
	<dd><?php if($miss_req->getCom4Weigth() != 0):?><?php echo $miss_req->getCom4Weigth()?><?php endif ?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getCom4Phone()?$miss_req->getCom4Phone().'/':''?><?php echo $miss_req->getCom4Comment()?$miss_req->getCom4Comment().'/':''?></dd>
</dl>
<?php endif;?> <?php if($miss_req->getCom5Name()):?>
<dl class="person-data">
	<dt>Companion Name 5:</dt>
	<dd><?php echo $miss_req->getCom5Name()?></dd>
	<dt>RelationShip:</dt>
	<dd><?php if($miss_req->getCom5Name()):?><?php echo $miss_req->getCom5Relationship() ?><?php endif ?></dd>
	<dt>Date of birth:</dt>
	<dd><?php echo $miss_req->getCom5DateOfBirth() ?></dd>
	<dt>Weight:</dt>
	<dd><?php if($miss_req->getCom5Weigth() != 0):?><?php echo $miss_req->getCom5Weigth()?><?php endif ?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getCom5Phone()?$miss_req->getCom5Phone().'/':''?><?php echo $miss_req->getCom5Comment()?$miss_req->getCom5Comment().'/':''?></dd>
</dl>
<?php endif;?></div>

<h3>Lodging Information</h3>
<div class="person-info">
<dl class="person-data">
	<dt>Name:</dt>
	<dd><?php echo $miss_req->getLodgingName()?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getLodgingPhone().' '. $miss_req->getLodgingPhoneComment()?></dd>
</dl>
</div>
<h3>Facility Information</h3>
<div class="person-info">
<dl class="person-data">
	<dt>Name:</dt>
	<dd><?php echo $miss_req->getFacilityName()?></dd>
	<dt>Phone/Comment:</dt>
	<dd><?php echo $miss_req->getFacilityPhone() .' '. $miss_req->getFacilityPhoneComment()?></dd>
</dl>
</div>
<?php endif;?></div>
