<? 
	include 'pdf.php';
	$data = Array
	(
		0 => Array
			(
				'id' => 1,
				'title' => '菜单',
				'pid' => 0,    
				'icon' => '',
				'status' => 1,
			),
		1 => Array
			(
				'id' => 2,
				'title' => '菜单2',
				'pid' => 1,          
				'icon' => '',
				'status' => 1,
			),
	);
	$pdf = new pdf();
	$pdf->outpdf($data,'haha.pdf');