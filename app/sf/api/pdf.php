<?php
$path =  dirname(dirname(__FILE__));
require_once($path.'/tcpdf/examples/tcpdf_include.php');
class module_sf_api_pdf{
	private $data;
	private $childtag;
	private $parenttag;
 	private $level;
 	private $filename;
 	private $pid;
 	private $title;
 	private $rdata = array();
 	
 	public function __construct($pid = 0,$childtag='id',$parenttag='pid',$title='title',$content='title',$level = 1){
 		$this->childtag = $childtag;
 		$this->parenttag = $parenttag;
 		$this->content = $content;	
 		$this->title = $title;
 		$this->level = $level;
 		$this->pid = $pid;		
 	}

 	//重新设置参数
 	public function config($pid = 0,$childtag='id',$parenttag='pid',$title='title',$content='title',$level = 1){
 		$this->childtag = $childtag;
 		$this->parenttag = $parenttag;
 		$this->content = $content;	
 		$this->title = $title;
 		$this->level = $level;
 		$this->pid = $pid;	
 	} 

 	public function getData($data){
 		$this->data = $data;
 		$this->teamData($this->pid);
 		return $this->rdata;
 	}

	public function teamData($pid=0){
		foreach ($this->data as $key => $value) {	
			if($value['pid']==$pid){
				$this->level++;
				if(isset($value[$this->content])){
					array_push($this->rdata, array('title'=>$value[$this->title],'content'=>$value[$this->content],'level'=>$this->level));
				}else{
					array_push($this->rdata, array('title'=>$value[$this->title],'level'=>$this->level));
				}	
				$tmpdata = $this->teamData($value[$this->childtag]);
				if(!$tmpdata){
					$this->level--;
					continue;
				}
			}	
		}
		
	}

	public function outpdf($data,$filename){
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor('Nicola Asuni');
		// $pdf->SetTitle('Nanbosoft');
		// $pdf->SetSubject('TCPDF Tutorial');
		$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Nanbosoft", PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}
		
		$pdf->SetFont('stsongstdlight', 'B', 20);	

		$data = $this->getData($data);
	
		
		foreach($data as $key => $value){
			$pdf->AddPage();
			$pdf->Bookmark($value['title'], $value['level'], 0, '', '', array(128,0,0));	
			if(isset($value['content'])){
				$pdf->writeHTMLCell(0, 0, '', '', $value['title'].$value['content'], 0, 1, 0, true, '', true);
			}else{
				$pdf->writeHTMLCell(0, 0, '', '', $value['title'], 0, 1, 0, true, '', true);
			}
		}
		$pdf->AddPage();
		$pdf->Bookmark($value['title'], $value['level'], 0, '', '', array(128,0,0));	
		$pdf->writeHTMLCell(0, 0, '', '', $value['title'], 0, 1, 0, true, '', true);
		$pdf->addTOCPage();

		// write the TOC title
		$pdf->SetFont('stsongstdlight', 'B', 16);
		$pdf->MultiCell(0, 0, 'Table Of Content', 0, 'C', 0, 1, '', '', true, 0);
		$pdf->Ln();

		$pdf->SetFont('stsongstdlight', '', 12);

		// add a simple Table Of Content at first page
		// (check the example n. 59 for the HTML version)
		$pdf->addTOC(1, 'courier', '.', 'INDEX', 'B', array(128,0,0));

		// end of TOC page
		$pdf->endTOCPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output($filename, 'D');
		exit;

	}




	


}