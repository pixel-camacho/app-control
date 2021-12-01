<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
use Dompdf\Dompdf;
use Exception;

class Reports extends BaseController
{

	public  function __construct()
	{
		$this->multifuncionales = model('MultifuncionalModel');
		$this->refacciones = model('RefaccionModel');
		$this->tonner = model('TonnerModel');
		$this->report = model('ReportModel');
		$this->session = session();
	}

	public function index()
	{
		$data = [];
		$data['catalogos'] = ['Multifuncionales','Refacciones','Tonner'];
		$data['title'] = 'This is Report';
		$data['reports'] = $this->report->findAll();
		
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

	private function requestPath($id){

		$reporte = $this->report->find($id);
		return $reporte['path'];
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

			$pathPDF = $ruta.'reporte_de-'.$info_request['catalogo'].'-'.date('Y-m-d').'.pdf';
			$data = ['catalogo' => $info_request['catalogo'],'name' => null,'fecha_creacion' => date('Y-m-d'), 'path' => $pathPDF];

			if(!file_put_contents($pathPDF,$pdf)):
				$this->session->setFlashdata('error','ha ocurrido un problema creadon el pdf');
			    return redirect('reports');
			endif;

			if(!$this->report->insert($data)):
				$this->session->setFlashdata('error','Problemas en la creacion');
			    return redirect('reports');
			endif;

			$this->session->setFlashdata('success','Reporte generado');
			return redirect('reports');

		}catch(Exception $e){

		}
		//$file_pdf->stream("reporte.pdf", array("Attachment" => 0));

	}

	public  function delete(){
		
	  $id = $_POST['id'];
	  $path = $this->requestPath($id);


	  if(!$id):
		$this->session->setFlashdata('error','Problemas eliminando reporte');
		return redirect('reports');
	  endif;

	  if(!$this->report->delete($id)):
		$this->session->setFlashdata('error','Problemas eliminando reporte');
		return redirect('reports');
	  endif;

	  if(!unlink($path)):
		$this->session->setFlashdata('error','Problemas eliminando reporte');
		return redirect('reports');
	  endif;

	  $this->session->setFlashdata('success','Registro Eliminado');
		return redirect('reports');

	}
}
