﻿<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>add new package</title>
    <style>

        input{font-size:20px}
		body{
 	      background-image:url("maxresdefault.jpg");
	     margin-top:30px;
	    background-repeat: no-repeat;  
      background-size: cover;   
      }
       
    </style>
	

</head>
<body>
    //connect to database
		<?php
		//the "@" suppresses error messages
     include 'dbcon.php';
   //get fieldname and tablename;the value of id
  
   $fieldname=array_keys($_GET)[0]; 
   print $fieldname;
   $tablename=array_keys($_GET)[1];
    print $fieldname.' table';
   $id=array_values($_GET)[0];
   print $id;
  
   $result = mysqli_query($dbh, "SELECT * FROM $tablename where $fieldname=$id");  
   print '<h2 >'.$tablename.'</h2>';
   //mysqli_field_seek($result,0);
   //$fieldinfo=mysqli_fetch_field($result);
   //$firstfield=$fieldinfo->name;
     print ' <form method="get" action="dbupdate2.php">';    

	   //print record agent want to update
	  $row = mysqli_fetch_row($result);
     $i=0;
      while( $fieldinfo=mysqli_fetch_field($result))
    {
		 $fieldname=$fieldinfo->name;
        print "<input autofocus value='$row[$i]' required type='text' name='$fieldname'>$fieldname</input>'";
	   //print "<input autofocus value='$row[$i]' required type='text' name='.$fieldname.'>$fieldname.";
	   print "<br>";
	   $i=$i+1;
	   //print $i;
	  }
	      
       print "<input  type='text'  value='$id' name='$tablename'><button   style='width:100px;height:40px;color:green' onclick='submitForm()'>submit</button></input>";
	  print "Reminder:all field must be filled!";
	  print  '</form>';

	  ?>



<script>
			function submitForm() {
			if (confirm("Are you sure you want to submit?")){
			document.forms[0].submit();
			}
			}
		</script>

</body>
</html>





