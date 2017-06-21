<?php
/* @var $this ImportController */
$this->breadcrumbs=array('Import',);
?>
<h1>Import | Products</h1>

<div class="form">
<form action="http://localhost/notsboltsscrews/index.php?r=import/upload" enctype="multipart/form-data" method="post">
	<div class="label">
		<label>Input Your CSV</label>
		<input type="file" name="csv">
	</div>
	<div class="submit">
		<input type="submit" name="csvUpload" value="csvUpload">
	</div>
</form>
</div><!-- form -->
