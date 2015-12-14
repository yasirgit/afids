<ul id="test">
<?php foreach ($passengers as $passenger):?>
  <?php if(isset($passenger)):?>
          <li id="<?php echo $passenger->getId()?>" value="<?php echo $passenger->getLodgingName()?>" class="<?php echo $passenger->getLodgingName()?>">
                  <?php echo str_replace($keyword,'<b>'.$keyword.'</b>', $passenger->getLodgingName())?>
          </li>
          <!--<?php //if($passenger->getId()):?>
              <input type="hidden" value="<?php //echo $passenger->getId()?>" id="lod" name="passenger_id"/>
              <?php //endif?>-->
  <?php endif?>
<?php endforeach;?>
</ul>

