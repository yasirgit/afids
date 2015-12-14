
<ul>
    <?php foreach ($airports as $airport):?>
      <li>
        <?php echo $airport->getName ()?>
      </li>
    <?php endforeach;?>
</ul>