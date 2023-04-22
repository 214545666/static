<?php
header('Access-Control-Allow-Origin:*');
date_default_timezone_set('Asia/Shanghai');
header('Server-Time:'.date("m.d"));
if (date("m.d") == "03.05") {
    $path = "img_rice";
}
else if (date("m.d") == "04.16") {
    $path = "img_nice";
} 
else if (date("y") == "2023" && date("m") == "04" && date("d") > 21) {
    $path = "img_b70";
} 
else if (date("m.d") == "05.01") {
    $path = "img_b70";
} 
else {
    $path = "img";
}
header("Content-type: image/jpeg");
$url = './' . getRandomfile($path);
readfile ($url);

function getfilecounts($filePath)
{
    $dir = './' . $filePath;
    $handle = opendir($dir);
    $i = 0;
    while (false !== $file = (readdir($handle))) {
        if ($file !== '.' && $file != '..') {
            $i++;
        }
    }
    closedir($handle);
    return $i;
}

function getRandomfile($filePath)
{
    $trueFileNum = rand(1, getfilecounts($filePath));
    $dir = './' . $filePath;
    $handle = opendir($dir);
    $i = 0;
    while (false !== $file = (readdir($handle))) {
        if ($file !== '.' && $file != '..') {
            $i++;
            if ($i == $trueFileNum) {
                $trueFile = $file;
            }
        }
    }
    closedir($handle);
    return $filePath . "/" . $trueFile;
}
?>