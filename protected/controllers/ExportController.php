<?php

class ExportController extends Controller
{
	public function actionIndex()
	{
		$fields = array('id', 'prod_name','short_description','detail','price','in_stock','min_stock','feature','status');
    	$converted = "`".implode("`, `",$fields)."`";
    	$sql = "SELECT {$converted} FROM `tbl_product`";
    	$data = Product::model()->findAllBySql($sql);
    	// XlsExporter::downloadXls('report', $data,'', true, $fields);
    	$this->render('index',array('data'=>$data, 'fields'=>$fields));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
