<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf;
use Exception;

class Reports extends BaseController
{

	public  function __construct()
	{
		$this->multifuncionales = model('MultifuncionalModel');
		$this->refacciones = model('RefaccionModel');
		$this->tonner = model('TonnerModel');
		$this->session = session();
	}

	public function index()
	{
		$data = [];
		$data['catalogos'] = ['Multifuncionales','Refacciones','Tonner'];
		$data['title'] = 'This is Report';
		
		echo view('layout/header',$data);
		echo view('report/index');
		echo view('layout/footer');
	}

	private function catalogoSolicitado($catalogo)
	{
		$result_catalogo = null;

		if($catalogo == 'Multifuncionales'):
			$result_catalogo = $this->multifuncionales->getAllComputers();
		elseif ($catalogo == 'Refacciones'):
			$result_catalogo = $this->refacciones->getAllParts();
		else:
			$result_catalogo = $this->tonner->getAllTonners();
		endif;

	       return $result_catalogo;
	}

	private function generar_string_pdf($catalogo){

		$file_pdf = new Dompdf();
		$file_pdf->loadHtml(view('report/pdf_view',['equipos'  => $this->catalogoSolicitado($catalogo),
	                                                'catalogo' => $catalogo]));
		$file_pdf->setPaper('A4', 'portrait');
		$file_pdf->render();
		$pdf = $file_pdf->output();

		return $pdf;
	}

	public  function generate(){

		$info_request = $_POST;
        $ruta = 'assets/report/'; 

		if(trim($info_request['catalogo']) == ''):
			$this->session->setFlashdata('error','Favor de selecciona un catalogo');
			return redirect('reports');
		endif;

		$pdf = $this->generar_string_pdf($info_request['catalogo']);

		try{

			if(!file_put_contents($ruta.'reporte-de-'.$info_request['catalogo'].'-'.date('Y-m-d').'.pdf',$pdf)):
				$this->session->setFlashdata('error','ha ocurrido un problema creadon el pdf');
			    return redirect('reports');
			endif;

			$this->session->setFlashdata('success','Reporte generado');
			return redirect('reports');

		}catch(Exception $e){

		}
		//$file_pdf->stream("reporte.pdf", array("Attachment" => 0));

	}
}
