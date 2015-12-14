<?php $mission_companions = $sf_data->getRaw('mission_companions')?>

<h2>Edit Mission Companions</h2>

<form method="post" action="<?php echo url_for('mission/saveCompanions?id='.$mission->getId())?>">
  <table class="companion-table">
    <thead>
      <tr>
        <td class="cell-1">Companion</td>
        <td>Relationship</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($companions as $companion) {?>
    <tr>
      <td class="cell-1">
        <input type=checkbox name="companions[]" id="companion_<?php echo $companion->getId()?>" value="<?php echo $companion->getId()?>" <?php if (in_array($companion->getId(), $mission_companions)) echo 'checked'?>/>
        <label for="companion_<?php echo $companion->getId()?>"><?php echo $companion->getName()?></label>
      </td>
      <td class="cell-2"><?php echo $companion->getRelationship()?></td>
    </tr>
    <?php }?>
    </tbody>
  </table>

  <input type="submit" class="hide" id="form_submit"/>
</form>

<a class="btn-action" onclick="$('#form_submit').click(); return false;" href="#"><span>Save</span><strong/></a>

