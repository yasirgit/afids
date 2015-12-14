<ul>
  <?php foreach ($idents as $ident):?>
  <li id="<?php echo 'ident_'.$ident->getIdent()?>">
          <?php echo str_replace("'","\"",str_ireplace($keyword,'<b>'.$keyword.'</b>', $ident->getIdent()));?>
  </li>
  <?php endforeach;?>
</ul>