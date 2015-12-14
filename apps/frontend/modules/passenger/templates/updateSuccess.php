<div class="person-view"> 
<h2><?php echo $title.' -- '.$sub_title ?></h2>
</div>
  <form action="<?php echo url_for('@passenger_step1') ?>" id="sample" method="post">
        <input type="hidden" name="id" value="<?php echo $passenger->getId() ?>" />
        <input type="hidden" name="referer" value="<?php echo $referer ?>" /> 
        
         <div id="step1" class="step">  
          <table>
                 <?php echo $form;?>
                 <?php echo $form['_csrf_token'] ?>
           </table>    
         </div>  
         
         <div id="step2" class="step">  
         
         </div>
         
         <div id="step3" class="step">  
                  <input id="name" name="name" class="text" />
                          <input id="submit" type="submit" value="Sample"/> 
         </div>
  </form>
<script type="text/javascript">
//<![CDATA[
var step1 = $('#step1');
var step2 = $('#step2');
var step3 = $('#step3');

$(function() {
  $("#pass1_date_of_birth").datepicker();
});
//]]>
</script>

