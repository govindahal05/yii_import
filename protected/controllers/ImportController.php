<?php

class ImportController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
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
	public function actionUpload()
	{
		/*if(isset($_POST['csvUpload'])){
			// var_dump($_FILES);EXIT;
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["csvfile"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
			    $check = getimagesize($_FILES["csvfile"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
		}*/
// print_r($_FILES);exit;
$csv = array();
if($_FILES['csv']['error'] == 0){
    $name = $_FILES['csv']['name'];
    $ext = strtolower(end(explode('.', $_FILES['csv']['name'])));
    $type = $_FILES['csv']['type'];
    $tmpName = $_FILES['csv']['tmp_name'];
    $headings = array('id','name','age','location');
     /*echo "<pre>";
     print_r($heading);
     echo "</pre>";
*/
    if($ext === 'csv'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            set_time_limit(0);
            $row = 0;
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $col_count = count($data);
            	$i = 0;
				foreach($headings as $heading){
				     	$csv[$row][$heading] = $data[$i];
				     	 $i++;
				     }
				    
                /*$csv[$row]['col1'] = $data[0];
                $csv[$row]['col2'] = $data[1];*/
                $row++;
            }
            fclose($handle);
        }
        echo "<pre>";
        print_r($csv);
        echo "</pre>";

    }
}	
}
	public function actionCsv()
	{
		 if(isset($_POST["Import"])){
		
		$filename=$_FILES["file"]["tmp_name"];		
 
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         { 
	           $sql = "INSERT into employeeinfo (emp_id,firstname,lastname,email,reg_date) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"index.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"index.php\"
					</script>";
				}
	         }
			
	         fclose($file);	
		 }
	}
	}
	public function actionGet()
	{
		function get_all_records(){
    $con = getdb();
    $Sql = "SELECT * FROM employeeinfo";
    $result = mysqli_query($con, $Sql);  
 
 
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
             <thead><tr><th>EMP ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Registration Date</th>
                        </tr></thead><tbody>";
 
 
     while($row = mysqli_fetch_assoc($result)) {
 
         echo "<tr><td>" . $row['emp_id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['reg_date']."</td></tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}
}
}

	public function actionImport(){
	echo "here in import controller import function";
		  $model = new Registration;
    //$file = CUploadedFile::getInstance($model,'csv_file');
    if(isset($_POST['Registration']))
    {
        $model->attributes=$_POST['Registration'];
        if(!empty($_FILES['Registration']['tmp_name']['csv_file']))
        {
            $file = CUploadedFile::getInstance($model,'csv_file');


            $fp = fopen($file->tempName, 'r');
            if($fp)
            {
                //  $line = fgetcsv($fp, 1000, ",");
                //  print_r($line); exit;
                $first_time = true;
             do {
                if ($first_time == true) {
                    $first_time = false;
                    continue;
                }
                    $model = new Registration;
                    $model->firstname = $line[0];
                    $model->lastname  = $line[1];

                    $model->save();

                }while( ($line = fgetcsv($fp, 1000, ";")) != FALSE);
                $this->redirect('././index');

            }
            //    echo   $content = fread($fp, filesize($file->tempName));

        }



    }


    $this->render('import', array('model' => $model) );

	}
    public function actionPhpimport(){

    if(isset($_POST["Import"]))
    {
        echo $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
        {
           $file = fopen($filename, "r");
            $count = 0;                                     
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $count++;                                      
                if($count>1){                                
                  $sql = "INSERT into prod_list_1(p_bench,p_name,p_price,p_reason) values ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]')";
                  mysql_query($sql);
                }                                              // add this line
            }
            fclose($file);
            echo 'CSV File has been successfully Imported';
        }
        else
            echo 'Invalid File:Please Upload CSV File';
        }
         $this->render('import');
    }
    public function actionImportCSV()
    {
       $model=new UserImportForm;

       if(isset($_POST['UserImportForm']))
         {

           $model->attributes=$_POST['UserImportForm'];

           if($model->validate())
             {

              $csvFile=CUploadedFile::getInstance($model,'file');  
              $tempLoc=$csvFile->getTempName();

                $sql="LOAD DATA LOCAL INFILE '".$tempLoc."'
                    INTO TABLE `tbl_user`
                    FIELDS
                        TERMINATED BY ','
                        ENCLOSED BY '\"'
                    LINES
                        TERMINATED BY '\n'
                     IGNORE 1 LINES
                    (`name`, `age`, `location`)
                    ";

                $connection=Yii::app()->db;
                $transaction=$connection->beginTransaction();
                    try
                        {

                            $connection->createCommand($sql)->execute();
                            $transaction->commit();
                        }
                        catch(Exception $e) // an exception is raised if a query fails
                         {
                            print_r($e);
                            exit;
                            $transaction->rollBack();

                         }
                  $this->redirect(array("user/index"));
             }
         }  

       $this->render("importcsv",array('model'=>$model));
    }
    public function actionImportsubject(){
        if(!isset($_POST["Import"])){
            $this->render('import');
        }
        else{
            if (!($_FILES["file"]["type"] == "application/vnd.ms-excel")){
                Yii::app()->user->setFlash('notcsv','Please! Import CSV file only');
                $this->render('import');
            }
            else{

                    /*echo "<pre>";
                    print_r($labels);
                    echo "</pre>"; */
                    /*foreach($labels as $label){
                        echo $i." ".$label."<br>";
                        $i++;
                    }*/
                    
                    /*echo "<pre>";
                    print_r($emapData);
                    echo "</pre>"; */
                   /* echo $arraysAreEqual = ($labels == $emapData);
                    echo $arraysAreEqual = ($labels === $emapData);
                    exit;*/
                    // var_dump($_FILES);exit;
                $filename = $_FILES['file']['tmp_name'];
                $model = new UserImportForm;
                $labels= $model->attributeLabels();
                /*echo "label";
                var_dump($labels);echo "<br>";*/
                echo $filename;
                $file = fopen($filename, "r");
                $emapData = fgetcsv($file, 10000, ",");
                /*echo "imported data";
                var_dump($emapData);
                exit;   */

                if($labels !== $emapData){
                    Yii::app()->user->setFlash('notmachheading','Please! Import Valid CSV file with valid headings');
                    $this->render('import');
                }
                else{   
                    while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
                    {
                        $attribute = array(
                        $labels[0]=>$emapData[0], 
                        $labels[1]=>$emapData[1], 
                        $labels[2]=>$emapData[2], 
                        $labels[3]=>$emapData[3], 
                        $labels[4]=>$emapData[4], 
                        $labels[5]=>$emapData[5], 
                        $labels[6]=>$emapData[6],
                        $labels[7]=>$emapData[7],
                        $labels[8]=>$emapData[8],
                        $labels[9]=>$emapData[9],
                        $labels[10]=>$emapData[10],
                        $labels[11]=>$emapData[11],
                        $labels[12]=>$emapData[12],
                        $labels[13]=>$emapData[13],
                        $labels[14]=>$emapData[14],
                        $labels[15]=>$emapData[15],
                        $labels[16]=>$emapData[16],
                        $labels[17]=>$emapData[17],
                        $labels[18]=>$emapData[18],
                        $labels[19]=>$emapData[19],
                        $labels[20]=>$emapData[20],
                        $labels[21]=>$emapData[21],
                        $labels[22]=>$emapData[22],
                        $labels[23]=>$emapData[23]
                    );
                   /* $model = new Product;
                    $model->attributes=$attribute;
                    echo 'validae '.$model->validate($attribute);exit;*/
                        /*echo "<PRE>";
                        print_r($attribute);
                        echo "</PRE>";
*/
                      $command = Yii::app()->db->createCommand();
                        if(! $command->insert('tbl_product', $attribute))
                        {
                            echo "<script type=\"text/javascript\">
                                    alert(\"Invalid File:Please Upload CSV File.\");
                                    window.location = \"index.php\"
                                </script>";
                        }
                    }
                    fclose($file);
                    echo "<script type=\"text/javascript\">
                            alert(\"CSV File has been successfully Imported.\");
                            window.location = \"index.php\"
                        </script>";
                    $this->render('import');
                    }
                }      
            }
        }
    }

