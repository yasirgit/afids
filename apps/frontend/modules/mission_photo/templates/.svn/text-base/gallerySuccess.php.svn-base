<?php use_helper("jQuery")?>
<div id="photo_gallery_popup_div">
<fieldset>
   <legend>Mission Photo Gallery</legend>
   <?php echo jq_javascript_tag()?>
      jQuery(document).ready(
         function(){                        
            jQuery(".open-popup").click(
               function(index){
                  var img_src = jQuery(this).children(":nth-child(1)").attr('src');
                  img_src = img_src.split("/");
                  img_src = img_src[img_src.length -1];
                  jQuery("#gallery-image").attr("src", "/uploads/mission_photo/display/" + img_src);
                  jQuery('#gallery-image_pop_up').dialog({
                       buttons: {
                           "Close": function() {
                             jQuery(this).dialog("close");
                           }
                       },
                       title: "Big Image",
                       width: 550,
                       hide: "slide",
                       modal: true,
                       show: 'slide'
                  });
                  jQuery('#gallery-image_pop_up').dialog("open");
               }
            );
         });      
<?php jq_end_javascript_tag()?>
    <ul class="gallery">
    <?php
    foreach ($mission_photo_gallery as $value):
        $photo_path = '/uploads/mission_photo/display/'.$value->getPhotoFilename();
        $thumb_path = '/uploads/mission_photo/thumbnails/'.$value->getPhotoFilename();
        if(file_exists(sfConfig::get("sf_upload_dir")."/mission_photo/thumbnails/".$value->getPhotoFilename())):
        ?>
          <li>
             <a href="#pht" class="open-popup">
                  <img src="/uploads/mission_photo/thumbnails/<?php echo $value->getPhotoFilename() ?>" />
              </a>
          </li>
    <?php endif;?>
    <?php endforeach;?>
    </ul>
    <strong><?php echo link_to('Back', '/mission_photo')?></strong>
</fieldset>

<div class="pager">
  Photos per page:
  <?php $max_array = array(5, 10, 20, 30, 40); ?>
  <?php foreach ($max_array as $i => $v) {
    if ($i) echo ' | ';
    echo link_to_if($max != $v, $v, 'mission_photo/gallery?page='.$pager->getPage().'&max='.$v);
  }?>
  <div>
    <form action="<?php echo url_for('mission_photo/gallery')?>">
      <?php echo link_to('Previous', 'mission_photo/gallery?page='.$pager->getPreviousPage()."&max=".$max, array('class' => 'btn-pager-prev'))?>
       <input type="hidden" name="max"  value="<?php echo $max?>"/>
      <input type="text" name="page" class="active-page" value="<?php echo $pager->getPage()?>"/>
      <strong>of <?php echo link_to($pager->getLastPage(), 'mission_photo/gallery?page='.$pager->getLastPage()."&max=".$max)?></strong>
      <?php echo link_to('Next', 'mission_photo/gallery?page='.$pager->getNextPage()."&max=".$max, array('class' => 'btn-pager-next'))?>
      <input type="submit" class="hide"/>
    </form>
  </div>
</div>
</div>
<div id="gallery-image_pop_up" style="text-align:center">
   <img id="gallery-image" width="500" src="">
</div>