<?php
	class module_feed_update{
		function run(){
			k::load('api')->load('feed')->update($_REQUEST);
		}
	}
