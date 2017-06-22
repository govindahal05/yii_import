 <?php
/* @var $this ImportController */
$this->breadcrumbs=array('Import',);
?>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container"> 
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Import Excel To Mysql Database Using PHP</a>
 
            </div>
        </div>
    </div>
 
    <div id="wrap">
    <div class="container">
        <div class="row">
            <div class="span3 hidden-phone"></div>
            <div class="span6" id="form-login">
                <form class="form-horizontal well" action="http://localhost/notsboltsscrews/index.php?r=import/importsubject" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Import CSV/Excel file</legend>
                        <div style="text-align: center;font-size: 25px;">
                            <?php 
                                if( Yii::app()->session['error_file']){ 
                                echo  "<label>".Yii::app()->session['error_file']."</label>";
                                unset(Yii::app()->session['error_file']);
                                }else{
                                    echo "";
                                } ?>
                        </div>
                        <div class="control-group">
                            <div class="control-label">
                                <label>CSV/Excel File:</label>
                            </div>                            
                            <div class="controls">                            
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>
 
                        <div class="control-group">
                            <div class="controls">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="span3 hidden-phone"></div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Semester</th>
                </tr>   
            </thead>
        </table>
    </div>
 
    </div>
 
  
