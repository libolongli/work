<?
class module_syllabus_add{

function run(){
	$id = k::load('syllabus')->addCourse();
    $tpl = new tpl();
	$tpl->display('add');
}

}