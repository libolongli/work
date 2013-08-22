<?php
/**
module_folder_file
*/

class module_index_index 
{

function run()
{
$t=new tpl();
$t->assign('a','it works');

$t->assign('ds',array('ff1','ff2'));


$t->display('index');
//echo 'it works  ......';
}


}

