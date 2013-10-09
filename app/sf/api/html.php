<?php
	class module_sf_api_html{
		function head(){
			$html='
<html>
<head>
<title>&#27169;&#22359;&#30340;&#26550;&#26500;</title>
<style type="text/css">
    span.foldopened { color: white; font-size: xx-small;
    border-width: 1; font-family: monospace; padding: 0em 0.25em 0em 0.25em; background: #e0e0e0;
    VISIBILITY: visible;
    cursor:pointer; }


    span.foldclosed { color: #666666; font-size: xx-small;
    border-width: 1; font-family: monospace; padding: 0em 0.25em 0em 0.25em; background: #e0e0e0;
    VISIBILITY: hidden;
    cursor:pointer; }

    span.foldspecial { color: #666666; font-size: xx-small; border-style: none solid solid none;
    border-color: #CCCCCC; border-width: 1; font-family: sans-serif; padding: 0em 0.1em 0em 0.1em; background: #e0e0e0;
    cursor:pointer; }

    li { list-style: none; }

    span.l { color: red; font-weight: bold; }

    a:link {text-decoration: none; color: black; }
    a:visited {text-decoration: none; color: black; }
    a:active {text-decoration: none; color: black; }
    a:hover {text-decoration: none; color: black; background: #eeeee0; }

</style>
<!-- ^ Position is not set to relative / absolute here because of Mozilla -->
</head>
<body>
';
			return $html;
		}

		function footer(){
			$html='
</body>
</html>
';
			return $html;
		}

		function content($data){
			// print_r($data);exit;
			$html = '';
			foreach($data as $key=>$value){
				$s = '';
				for($i=0;$i<$value['level'];$i++){
					$s.='--';
				}
				$html.="<div>$s{$value['title']}</div>";
			}
			return $html;
		}

		function run($data){
			echo $this->head();
			echo $this->content($data);
			echo $this->footer();
			exit;
		}
	}