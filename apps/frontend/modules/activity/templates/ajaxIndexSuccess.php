<?php use_helper('Date');
/* @var $activity Activity */?>
<ul>
  <?php foreach ($activities as $i => $activity){?>
  <li id="sidebar_activity_<?php echo $activity->getId()?>" <?php if ($i%2) echo 'class="alt"'?>>
    <a class="btn-close" href="#" onclick="sidebarHideActivity(<?php echo $activity->getId()?>); return false;">Close</a>
    <div class="wrap">
      <p><?php echo $activity->getContent(ESC_RAW)?></p>
      <em class="time"><?php echo time_ago_in_words($activity->getCreatedAt('U'))?></em>
    </div>
  </li>
  <?php }?>

  <?php /*
  <li class="alt">
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p><a href="#">Mission #125,334</a> has been cancelled</p>

      <em class="time">2 minutes ago</em>
    </div>
  </li>
  <li>
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p>Brock Landry has sent available missions to the California, South Wing.</p>

      <em class="time">10 minutes ago</em>
    </div>
  </li>
  <li class="alt">
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p><a href="#">Mission #125,334</a> has been cancelled</p>

      <em class="time">2 minutes ago</em>
    </div>
  </li>
  <li>
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p>Brock Landry has sent available missions to the California, South Wing.</p>

      <em class="time">10 minutes ago</em>
    </div>
  </li>
  <li class="alt">
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p><a href="#">Mission #125,334</a> has been cancelled</p>

      <em class="time">2 minutes ago</em>
    </div>
  </li>
  <li>
    <a class="btn-close" href="#">Close</a>
    <div class="wrap">
      <p>Brock Landry has sent available missions to the California, South Wing.</p>

      <em class="time">10 minutes ago</em>
    </div>
  </li>
  */?>
</ul>