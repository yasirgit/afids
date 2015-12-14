<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<div class="passenger-form">
<div class="person-view">
<h2><?php echo $title ?></h2>
<form action="<?php echo url_for('@fund_create') ?>" method="post"
	id="fund_form"><input type="hidden" name="id"
	value="<?php echo $fund->getId() ?>" /> <input type="hidden"
	name="referer" value="<?php echo $referer ?>" /> <br />
<div class="box">
<div class="wrap"><?php echo $form['fund_desc']->renderLabel(); ?> <?php echo $form['fund_desc']->render(); ?>
<?php echo $form['fund_desc']->renderError(); ?> <?php echo $form['_csrf_token'] ?>
</div>
<input type="hidden" value="<?php echo $referer?>" id="back" name="back" />
<div class="form-submit"><a href="#"
	onclick="$('#fund_form').submit(); return false;" class="btn-action"><span>Save</span><strong>&nbsp;</strong></a>
<a href="<?php echo url_for($referer) ?>" class="cancel">Cancel</a></div>
</div>
</form>
</div>
</div>
