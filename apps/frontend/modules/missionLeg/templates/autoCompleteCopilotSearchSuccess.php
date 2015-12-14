<ul>
<?php foreach($pilots as $key):?>
    <li id="<?php echo $key['id']?>"><?php echo $key['first_name']." ".$key['last_name'];?></li>
<?php endforeach;?>
</ul>
