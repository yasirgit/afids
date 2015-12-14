<?php use_stylesheets_for_form($form);?>
<?php use_javascripts_for_form($form);?>

<div class="passenger-form">
  <div class="person-view">
    <h2><?php echo $title ?></h2>
    
    <form action="<?php echo url_for('@afaOrg_create') ?>" method="post" id="afa_form">
      <input type="hidden" name="id" value="<?php echo $afa->getId() ?>" />
     <?php echo $form['_csrf_token'] ?>
      <input type="hidden" name="referer" value="<?php echo $referer ?>" />
          <div class="box">
             <div class="wrap">
               <?php echo $form['name']->renderLabel()?>
               <?php echo $form['name']->render(); ?>
               <?php echo $form['name']->renderError(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['org_phone']->renderLabel()?>
               <?php echo $form['org_phone']->renderError(); ?>
               <?php echo $form['org_phone']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['phone_number1']->renderLabel()?>
               <?php echo $form['phone_number1']->renderError(); ?>
               <?php echo $form['phone_number1']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['phone_number2']->renderLabel()?>
               <?php echo $form['phone_number2']->renderError(); ?>
               <?php echo $form['phone_number2']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['home_page_url']->renderLabel()?>
               <?php echo $form['home_page_url']->renderError(); ?>
               <?php echo $form['home_page_url']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['org_fax']->renderLabel()?>
               <?php echo $form['org_fax']->renderError(); ?>
               <?php echo $form['org_fax']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['ref_contact_name']->renderLabel()?>
               <?php echo $form['ref_contact_name']->renderError(); ?>
               <?php echo $form['ref_contact_name']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['ref_contact_email']->renderLabel()?>
               <?php echo $form['ref_contact_email']->renderError(); ?>
               <?php echo $form['ref_contact_email']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['vpo_soap_server_url']->renderLabel()?>
               <?php echo $form['vpo_soap_server_url']->renderError(); ?>
               <?php echo $form['vpo_soap_server_url']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['vpo_request_post_email']->renderLabel()?>
               <?php echo $form['vpo_request_post_email']->renderError(); ?>
               <?php echo $form['vpo_request_post_email']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['vpo_user_id']->renderLabel()?>
               <?php echo $form['vpo_user_id']->renderError(); ?>
               <?php echo $form['vpo_user_id']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['vpo_user_password']->renderLabel()?>
               <?php echo $form['vpo_user_password']->renderError(); ?>
               <?php echo $form['vpo_user_password']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['vpo_org_id']->renderLabel()?>
               <?php echo $form['vpo_org_id']->renderError(); ?>
               <?php echo $form['vpo_org_id']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['afids_requester_user_name']->renderLabel()?>
               <?php echo $form['afids_requester_user_name']->renderError(); ?>
               <?php echo $form['afids_requester_user_name']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['afids_requester_password']->renderLabel()?>
               <?php echo $form['afids_requester_password']->renderError(); ?>
               <?php echo $form['afids_requester_password']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['afids_soap_server_url']->renderLabel()?>
               <?php echo $form['afids_soap_server_url']->renderError(); ?>
               <?php echo $form['afids_soap_server_url']->render(); ?>
             </div>
             <div class="wrap">
               <?php echo $form['afids_request_post_email']->renderLabel()?>
               <?php echo $form['afids_request_post_email']->renderError(); ?>
               <?php echo $form['afids_request_post_email']->render(); ?>
             </div>
             
             <div class="form-submit">
                <a href="#" onclick="$('#afa_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
                <a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a>
             </div>
      </div>
    </form>
  </div>
</div>
