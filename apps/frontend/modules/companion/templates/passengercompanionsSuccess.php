<?php $companions = $passenger->getCompanions();?>
<?php if (count($companions) == 0):?>
  <?php echo '<span id="no_companion">Passenger doesn\'t have any companion</span>'?>
<?php else:?>
  <table class="companion-table" id="companions">
    <thead style="<?php if (count($companions) == 0) echo 'display:none;'?>">
      <tr>
        <td class="cell-1">Companion</td>
        <td>Relationship</td>
      </tr>
    </thead>
    <tbody id="companion-table-companions-tbody">
      <?php foreach ($companions as $companion)
        {?>
        <tr>
          <td class="cell-1">
            <input type=checkbox name="companions[]" id="companion_<?php echo $companion->getId()?>" value="<?php echo $companion->getId()?>" <?php if (isset($selected_companions) && in_array($companion->getId(), $selected_companions)) echo 'checked'?>/>
            <label for="companion_<?php echo $companion->getId()?>"><?php echo $companion->getName()?></label>
          </td>
          <td class="cell-2"><?php echo $companion->getRelationship()?></td>
        </tr>
    <?php }?>
    </tbody>
  </table>
<?php endif?>
<br clear="all"/>
<br clear="all"/>

