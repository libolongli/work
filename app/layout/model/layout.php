<?php
	class k_model_layout_layout{
		function render($template){
			$form = <<<HTML
		 	<!-- Date: 2013-08-25 -->
		<link href="images/css/w2ui-1.2.min.css" type="text/css" rel="stylesheet" />
		<link href="images/css/naobo.css" type="text/css" rel="stylesheet" />
		<link href="images/css/n_from.css" type="text/css" rel="stylesheet" />
	    <link href="images/css/metallic.css" type="text/css" rel="stylesheet" />
		<link href="images/css/fullcalendar.css" type="text/css" rel="stylesheet" />
		<link href="images/css/fullcalendar.print.css" type="text/css" rel="stylesheet" />
	</head>
	<body>	
		<div class="n_cont_view_c">	
			<div id="from_mandatory_table" class="n_cont_view_c_v"></div>
		</div>
	</body>
	<script src="images/js/jquery-1.8.3.min.js" type="text/javascript"></script>
	<script src="images/js/w2ui-1.2.min.js" type="text/javascript"></script>
	<script src="images/js/Validform_v5.3.2.js" type="text/javascript"></script>
	<script src="images/js/zebra_datepicker.js" type="text/javascript" ></script>
	<script src="images/js/n_from.js" type="text/javascript"></script>	
	<script src="images/js/fullcalendar.js" type="text/javascript"></script>	
	<script src="images/js/jquery-ui.custom.min.js" type="text/javascript"></script>
	<script src="images/js/calendar-widget.js" type="text/javascript"></script>	
	
HTML;
			$list =<<<HTML
		<meta name="author" content="Administrator" />
		<link rel="stylesheet" href="images/css/w2ui-1.2.min.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
		<script type="text/javascript" src="images/js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="images/js/w2ui-1.2.min.js"></script>
		<script src="images/js/fullcalendar.js" type="text/javascript"></script>	
		<script src="images/js/jquery-ui.custom.min.js" type="text/javascript"></script>	
		<!-- Date: 2013-08-15 -->
	</head>
	<body>
		<div id="grid" style="width: 100%; height: 400px;"></div>	
	</body>		
HTML;
			echo $$template;
		}
	}
