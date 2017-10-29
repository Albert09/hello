<?php
$days =0;
$path ="path";

// Open the directory
if ($handle = opendir($path))
{
    // Loop through the directory
    while (false !== ($file = readdir($handle)))
    {
        // Check the file we're doing is actually a file
        if (is_file($path.$file))
        {
          $ext = pathinfo($file, PATHINFO_EXTENSION);
         if ($ext == "odt")
         {
         // Check if the file is older than X days old
            if (filemtime($path.$file) < ( time() - ( $days * 24 * 60 * 60 ) ) )
            {
                // Do the deletion
                unlink($path.$file);
            }
        }
    }
}
}
?>
