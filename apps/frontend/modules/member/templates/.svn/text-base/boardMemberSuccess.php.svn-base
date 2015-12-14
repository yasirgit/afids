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
<div class="person-view">
 <?php if(!empty($value)){ ?>
<h2><?php echo $title1 ?></h2>
<br>
        <table border="1"  class="boardmember-view-table">
            <thead>
                <tr>
                    <th>Start year</th>
                    <th> End year</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($value as $row){ ?>
                <tr>
                    <td><center><?php echo $row->startyear; ?></center></td>
                    <td><center> <?php echo $row->endyear; ?></center></td>                   
                </tr>
              <?php } ?>
            </tbody>
        </table>
<br>
<?php }?>
<h2><?php echo $title ?></h2>
  <form action="<?php echo url_for('member/boardMember') ?>" method="post" id="b_mem_form">
    <input type="hidden" name="id" value="<?php echo $b_member->getId() ?>" />
    <input type="hidden" name="person_id" value="<?php echo $person->getId() ?>" />
    <input type="hidden" name="referer" value="<?php echo $referer ?>" />
      <fieldset>
      <div class="box">
      <?php if(isset($flag)){?>
          <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('#bmem_startyear').val(<?php  echo $flag; ?>);
                jQuery('#bmem_startyear').attr("disabled", "disabled");
                jQuery('#bmem_endyear').val(<?php  echo $setendyear; ?>);

                jQuery('#bmem_endyear').change(function(){
                    var previousEndYear   = <?php echo $setendyear; ?>;
                    var previousStartYear = <?php echo $flag; ?>;
                    var NewEndYear =  jQuery('#bmem_endyear').val();

                    if( NewEndYear > previousEndYear ){
                        alert('This person has served before !');
                        jQuery('#bmem_endyear').val(previousEndYear) ;
                    }
                    else if( ( NewEndYear <= previousEndYear ) &&  ( NewEndYear >= previousStartYear)){
                            jQuery('#bmem_endyear') = jQuery('#bmem_endyear').val();
                    }
                    else if(  NewEndYear < previousStartYear ){
                        alert(' End year can not be smaller than start year !');
                        jQuery('#bmem_endyear').val(previousEndYear) ;
                    }

                });
            });
          </script>           
      <?php } ?>
      <?php echo $form;?>
      <?php echo $form['_csrf_token'] ?>
      </div>
      </fieldset>
        <div class="form-submit">
         <?php if(isset($flag)){ ?>
            <input type="hidden" name="id" value="<?php echo $ID; ?>" />
            <input type="hidden" name="bmem[startyear]"  value="<?php echo $flag; ?>" />
         <?php } ?>
          <input type="submit" class="hide" id="comp_form_submit"/>
          <a href="#" onclick="$('#b_mem_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
          <a href="<?php echo $referer ?>" class="cancel">Cancel</a>
      </div>
  </form>
  </div>
</div>


