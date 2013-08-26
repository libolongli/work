<?php
	class module_feed_update{
		function run(){
			k::load('feed')->update($_REQUEST);
		}
	}
