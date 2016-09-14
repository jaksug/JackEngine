<?php

/**
 * @author Boomer
 * @copyright 2013
 */

$dir = "gambar/";

// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $images = array();

        while (($file = readdir($dh)) !== false) {
            if (!is_dir($dir.$file)) {
                $images[] = $file;
            }
        }

        closedir($dh);

        print_r($images);
    }
}

?>