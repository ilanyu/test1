<?php
include 'lib/pclzip.lib.php';
include 'function/common.php';
include 'init.php';

//$srcdocx = "614321����������-- ʵ������3.docx"; //������docx

$srcarr = GetFileArray("workspaces/src/");

$writemd5 = array( //������md5(��д)
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



