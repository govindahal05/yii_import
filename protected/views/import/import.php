 <?php
/* @var $this ImportController */
$this->breadcrumbs=array('Import',);
?>
<h1>Import | Products</h1>

 <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'registration-form',
         'enableAjaxValidation'=>true,
             'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )); 

            <div>
        <?php echo $form->labelEx($model,'csv_file'); ?>
        <?php echo $form->fileField($model,'csv_file'); ?>
        <?php echo $form->error($model, 'csv_file'); ?>
    </div>
        <hr>
        <?php  echo CHtml::submitButton('Upload CSV',array("class"=>"")); ?>
        <?php echo $form->errorSummary($model); ?>
    </div>

        $this->endWidget();
