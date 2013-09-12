<?php
class module_syllabus_ok
{
  function run(){

  		if($_POST){
			print_r($_POST);
  		}
	 $data = k::load('syllabus')->getData();
	 
	}
  
  
}