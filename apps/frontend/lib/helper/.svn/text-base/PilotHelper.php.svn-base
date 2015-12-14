<?php
function distance($src_lat, $src_lng, $dst_lat, $dst_lng)
{
  return round(
    acos(
      sin(deg2rad($src_lat))
      *
      sin(deg2rad($dst_lat))
      +
      cos(deg2rad($src_lat))
      *
      cos(deg2rad($dst_lat))
      *
      cos(deg2rad($src_lng) - deg2rad($dst_lng))
   ) * (180*60) / pi()
  );
}

function efficiency($home_lat, $home_lng, $src_lat, $src_lng, $dst_lat, $dst_lng)
{
  $home_lat = (float)$home_lat;
  $home_lng = (float)$home_lng;
  $src_lat = (float)$src_lat;
  $src_lng = (float)$src_lng;
  $dst_lat = (float)$dst_lat;
  $dst_lng = (float)$dst_lng;
  
  $src2dst = distance($src_lat, $src_lng, $dst_lat, $dst_lng);
  $home2dst = distance($home_lat, $home_lng, $dst_lat, $dst_lng);
  $home2src = distance($home_lat, $home_lng, $src_lat, $src_lng);
  return ceil($src2dst / ($src2dst + $home2dst + $home2src) * 200);
}