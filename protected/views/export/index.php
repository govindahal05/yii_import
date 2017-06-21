<?php
/* @var $this ExportController */

$this->breadcrumbs=array(
	'Export',
);
?>
<h1>Product Export</h1>


<?php XlsExporter::downloadXls('report', $data,'', true, $fields);
