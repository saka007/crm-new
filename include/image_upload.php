<?php
function getExtension($str)
  {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
function imageupload($filename,$filetmp,$folder,$rwidth,$rheight)
{
		 $thumb_image="thumb_".$filename;
         $extension = getExtension($filename);
         $extension = strtolower($extension);
	if(file_exists("../uploads/".$folder."/".$filename))
	{
		$filename=time().'.'.$extension;
		$thumb_image="thumb_".$filename;
	}
	if(is_uploaded_file($filetmp))
		{	
		copy($filetmp,"../uploads/".$folder."/".$filename);
		copy($filetmp,"../uploads/".$folder."/".$thumb_image);
		}
		$thumb_path = "../uploads/".$folder."/".$thumb_image;
		if (($extension == "jpg") || ($extension == "jpeg"))
		{
		$image = imagecreatefromjpeg($thumb_path);
		}
		else if($extension == "png")
		{
		$image = imagecreatefrompng($thumb_path);
		}
		
		$thumb_width = $rwidth;
		$thumb_height = $rheight;
		
		$width = imagesx($image);
		$height = imagesy($image);
		
		$original_aspect = $width / $height;
		$thumb_aspect = $thumb_width / $thumb_height;
		
		if ( $original_aspect >= $thumb_aspect )
		{
		   $new_height = $thumb_height;
		   $new_width = $width / ($height / $thumb_height);
		}
		else
		{
		   $new_width = $thumb_width;
		  $new_height = $height / ($width / $thumb_width);
		}
		
		$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
		imagecopyresampled($thumb,$image,0 - ($new_width - $thumb_width) / 2,0 - ($new_height - $thumb_height) / 2, 0, 0,$new_width, $new_height,$width,$height);
		imagejpeg($thumb, $thumb_path, 80);
		
		return $filename;
}

?>



