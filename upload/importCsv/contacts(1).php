<?php
                $paramsArray = array(
                    "table"=>"contacts",
                    "delimiter"=>",",
		    "textDelimiter"=>"\"",
                    "mode"=>2,
                    "perRequest"=>10,
                    "csvKey"=>"1",
                    "tableKey"=>"contact_id",
                    "columns"=>array(
                        "contact_id"=>1, "contact_first"=>2, "contact_last"=>3, "contact_email"=>4, 
                    ),
                );
            ?>