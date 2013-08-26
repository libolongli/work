<?php
	class module_msg_update{
		function run(){
			k::load('msg')->update($_REQUEST);
		}
	}
