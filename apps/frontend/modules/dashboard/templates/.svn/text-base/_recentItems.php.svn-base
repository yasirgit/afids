<?php $recent_items = $sf_data->getRaw('recent_items')?>

<div class="recent-items">
  <h3><span>Your RECENT ITEMS</span></h3>
  <div class="frame">
    <ul>
      <?php $i = 0;?>
      <?php foreach ($recent_items as $recent_item) { $i++;?>
      <li <?php if ($i%2==0) echo 'class="alt"'?>>
        <?php $photo = ($recent_item[1] && file_exists(sfConfig::get('sf_web_dir').'/images/recent_items/'.$recent_item[1].'.png')) ? $recent_item[1].'.png' : 'default.png' ?>
        <img alt="ico" src="/images/recent_items/<?php echo $photo?>">
        <?php echo link_to($recent_item[0], $recent_item[2])?>
      </li>
      <?php }?>
    </ul>
  </div>
</div>