<?php 
/* @var $contact_request ContactRequest*/
?>

<h2>Contact Request View</h2>
<div class="person-view"> 
  <h3>Personal Information</h3>
  <div class="person-info"> 
    <dl class="person-data">
      <dt>Name:</dt>
      <dd>
        <?php echo ($contact_request->getTitle()?$contact_request->getTitle():'').' '.$contact_request->getFirstName().' '.$contact_request->getLastName()?>      </dd>
       
      <dt>Address:</dt>
      <dd>
        <?php
          echo $contact_request->getAddress1()?$contact_request->getAddress1():'--'.'<br/>';
          echo $contact_request->getAddress2()?$contact_request->getAddress2():'--';
        ?>
      </dd>

      <dt>City:</dt>
      <dd>
        <?php echo $contact_request->getCity()?$contact_request->getCity():'--'?>
      </dd>
      
      <dt>State:</dt>
      <dd>
        <?php echo $contact_request->getState()?$contact_request->getState():'--'?>
      </dd>
       
      <dt>Zip Code:</dt>
      <dd>
        <?php echo $contact_request->getZipcode()?$contact_request->getZipcode():'--'?>
      </dd>
       
      <dt>Country:</dt>
      <dd>
        <?php echo $contact_request->getCountry()?$contact_request->getCountry():'--'?>
      </dd>

      <dt>Email:</dt>
      <dd>
        <?php echo $contact_request->getEmail() ? $contact_request->getEmail() : '--'?>
      </dd>
    </dl>
    <div class="person-contacts">
      <table>
        <thead>
          <tr>
            <td colspan="2">Phone Number(s)</td>
            <td>Comment</td>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td class="cell-1" width="100">Work:</td>
            <td class="cell-2">
              <?php echo $contact_request->getDayPhone() ? $contact_request->getDayPhone() : '--'?>
            </td>
            <td>
              <?php echo $contact_request->getDayComment() ? $contact_request->getDayComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Home:</td>
            <td>
              <?php echo $contact_request->getEvePhone() ? $contact_request->getEvePhone() : '--'?>
            </td>
            <td>
              <?php echo $contact_request->getEveComment() ? $contact_request->getEveComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Cell:</td>
            <td>
              <?php echo $contact_request->getMobilePhone() ? $contact_request->getMobilePhone() : '--'?>
            </td>
            <td>
              <?php echo $contact_request->getMobileComment() ? $contact_request->getMobileComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Pager:</td>
            <td>
              <?php echo $contact_request->getPagerPhone() ? $contact_request->getPagerPhone() : '--'?>
            </td>
            <td>
              <?php echo $contact_request->getPagerComment() ? $contact_request->getPagerComment() : '--'?>
            </td>
          </tr>
          <tr>
            <td class="cell-1">Fax:</td>
            <td>
              <?php echo $contact_request->getFaxPhone() ? $contact_request->getFaxPhone() : '--'?>
            </td>
            <td>
              <?php echo $contact_request->getFaxComment() ? $contact_request->getFaxComment() : '--'?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
        </div>
  <div>
  <h3>Contact Information</h3>
    <dl class="person-data">
        <dt class="dt1">Ref Source:</dt>
        <dd><?php echo $contact_request->getRefSourceId()?RefSourcePeer::retrieveByPK($contact_request->getRefSourceId()):'--' ?></dd>
      <dt class="dt1">Send Application Format:</dt>
              <dd><?php echo $contact_request->getSendAppFormat()?$contact_request->getSendAppFormat():'--'; ?></dd>
      <dt class="dt1">Comment:</dt>
              <dd><?php echo $contact_request->getComment()?$contact_request->getComment():'--'; ?></dd>
      <dt class="dt1">Contact Type:</dt>
      <dd><?php echo $contact_request->getContactTypeId()?ContactTypePeer::retrieveByPK($contact_request->getContactTypeId()):'--'; ?></dd>
      <dt class="dt1">Letter to Send:</dt>
              <dd><?php echo $contact_request->getLetterToSend()?$contact_request->getLetterToSend():'--'; ?></dd>
      <dt class="dt1">Letter Sent:</dt>
              <dd><?php echo $contact_request->getLetterSentDate('m/d/Y')?$contact_request->getLetterSentDate('m/d/Y'):'--'; ?></dd>
      <dt class="dt1">Request Date:</dt>
                <dd><?php echo $contact_request->getRequestDate()?$contact_request->getRequestDate('m/d/Y'):'--'; ?></dd>
      <dt class="dt1">Session Id:</dt>
                <dd><?php echo $contact_request->getSessionId()?$contact_request->getSessionId():'--'; ?></dd>
      <dt class="dt1">IP Address:</dt>
                <dd><?php echo $contact_request->getIpAddress()?$contact_request->getIpAddress():'--'; ?></dd>
    </dl>
  </div>
</div>

