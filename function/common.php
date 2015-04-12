<?php
function RandomDateStr()
{
    return date("YmdHis") . rand(1000, 9999);
}

function file_number($directory = '',$name,$writemd5)
{
    $number = 0;
    if(!empty($directory))
    {
        $handle = opendir($directory);
        $file_array = array();
        while (false != ($file = readdir($handle)))
        {
            if($file == '.' || $file == '..')
            {
                continue;
            }
            $md5 = md5_file($directory . $file);
            if (!file_exists("workspaces/log/" . $md5) || in_array(strtoupper($md5), $writemd5))
            {
                file_put_contents("workspaces/log/" . $md5, $name);
            }
            else
            {
                $srcmd5 = file_get_contents("workspaces/log/" . $md5);
                $fp = fopen("workspaces/log.txt","a");
                fwrite($fp, $name . "|" . $srcmd5 . "\r\n" . $md5 . "|" . $file . "|" . $number . "\r\n");
                fclose($fp);
            }
            $file_array[$number++] = $file;
        }
    }
    closedir($handle);
    return $number;
}

function deleteDir($dir) {
    if (substr($dir, -1) != '/')
        $dir .= '/';
    if (is_dir($dir)) {
        if ($dp = opendir($dir)) {
            while (($file = readdir($dp)) !== false) {
                if (is_dir($dir . $file) && $file != '.' && $file != '..') {
                    deleteDir($dir . $file);
                } else {
                    if (!is_dir($dir . $file))
                        unlink($dir . $file);
                }
            }
        }
        closedir($dp);
        rmdir($dir);
    }
}

function GetFileArray($directory = '')
{
    $number = 0;
    if(!empty($directory))
    {
        $handle = opendir($directory);
        $file_array = array();
        while (false != ($file = readdir($handle)))
        {
            if($file == '.' || $file == '..')
            {
                continue;
            }
            $file_array[$number++] = $file;
        }
    }
    closedir($handle);
    return $file_array;
}