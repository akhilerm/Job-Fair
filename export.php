<?php
	session_create();
	if (session_check()==true)
	{ 
		if (isset($_SESSION['LoggedINAdmin']))
		{	
			$company_id = $_POST['cmpID'];
    		$select = "SELECT user.name,course.course_name,user.email,user.phone,user.trans_id from course,user,applied where applied.student_id=user.id and course.id=user.course and applied.company_id = $company_id";
			$export = mysqli_query ($con, $select );
			$fields = mysqli_num_fields ( $export );
			for ( $i = 0; $i < $fields; $i++ )
			{
			    $header .= mysql_field_name( $export , $i ) . "\t";
			}
			while( $row = mysql_fetch_row( $export ) )
			{
			    $line = '';
			    foreach( $row as $value )
			    {                                            
			        if ( ( !isset( $value ) ) || ( $value == "" ) )
			        {
			            $value = "\t";
			        }
			        else
			        {
			            $value = str_replace( '"' , '""' , $value );
			            $value = '"' . $value . '"' . "\t";
			        }
			        $line .= $value;
			    }
			    $data .= trim( $line ) . "\n";
			}
			$data = str_replace( "\r" , "" , $data );
			if ( $data == "" )
			{
			    $data = "\n(0) Records Found!\n";                        
			}
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=export.xls");
			header("Pragma: no-cache");
			header("Expires: 0");
			print "$header\n$data";
		}
		else
			header("location:index.php");
	}
	else
		header("location:index.php");
?>