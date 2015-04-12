<?php
include 'lib/pclzip.lib.php';
include 'function/common.php';
include 'init.php';

//$srcdocx = "614321——李鹏飞-- 实践任务3.docx"; //待处理docx

$srcarr = GetFileArray("workspaces/src/");

$writemd5 = array( //白名单md5(大写)
    "C18210FAECFF8DF008CE38D228A6D3EC",
    "683BF7DFA3D6C476FE2FEFD12B6DC5C7",
);

$count = count($srcarr);
for ($i = 0; $i < $count; $i++)
{
    
    $randomstr = RandomDateStr();
    
    $pz = new PclZip("workspaces/src/" . $srcarr[$i]);
    $pz -> extract(PCLZIP_OPT_PATH, "workspaces/unzip/" . $randomstr . "/");
    
    file_number("workspaces/unzip/" . $randomstr . "/word/media/",$srcarr[$i],$writemd5);
    
    deleteDir("workspaces/unzip/" . $randomstr . "/");
}



