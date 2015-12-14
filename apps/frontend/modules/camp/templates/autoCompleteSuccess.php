<?php if(isset($backs)):?> 
<?php  echo var_dump($new);?>
    <ul>
        <?php foreach ($backs as $back):?>
          <li>
            <?php echo $back?>
          </li>
        <?php endforeach;?>
    </ul>
<?php else:?>
<ul>
    <?php foreach ( $results as $key => $value ): ?>
      <li id="<?php echo $key ?>"><?php echo $value ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif?>
<?php if(isset($new) && $new == true):?>
    <ul>
          <li>
            <?php echo $new?>
          </li>
    </ul>
<?php endif?>
