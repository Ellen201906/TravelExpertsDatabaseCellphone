﻿<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="search.css">
    <title>Travel Experts Database System</title>
   <title>Database Select Example</title>

   <style>
   body{
 	  background-image:url("maxresdefault.jpg");
	  margin-top:30px;
	  background-repeat: no-repeat;  
      background-size: cover;   
      }
   </style>
</head>


<?php
     //get value of id to updating
     $fieldname=array_keys($_GET)[0]; 
     $id=array_values($_GET)[0]; 
     end($_GET); 
     $key = key($_GET); 
	  $value = end($_GET); 
	 $tablename=$key;
	  $oldid=$value;
	
	   include 'dbcon.php';
   	 
    //select table and update id
   $result = mysqli_query($dbh, "SELECT * FROM $tablename");   
   $sql="UPDATE $tablename SET $fieldname = '$id' WHERE $fieldname = $oldid";
 
    $result = mysqli_query($dbh, $sql);
    //if ($result)
	//{
	// print("Record was updated");
	//}
	//else
	//{
	// print("No success");
	//}
   
   
    // update other columns
   $j=count($_GET)-1;
   $i=1;
	
	while ($i<$j)
	 {
	$k1= (array_keys($_GET)[$i]);	
	$v1=(array_values($_GET)[$i]);
	$sql = "UPDATE $tablename SET $k1='$v1' where $fieldname=$id"; 
	 $result = mysqli_query($dbh, $sql); 
	 $i=$i+1;
	 } 
 
   if ($result)
	{
	 print("All fields have been updated");
	}
	else
	{
	 print("No success,please make sure all field must be filled");
	}
	
	//print table after updating
	 print '<h2 style="text-align:center">'.$tablename.'</h2>';
        $result = mysqli_query($dbh, "SELECT * FROM $tablename");
    $fieldinfo=mysqli_fetch_field($result);
	$id=$fieldinfo->name;
    //print $id;
	 $result = mysqli_query($dbh, "SELECT * FROM $tablename");
     
       print "<table class='table table-bordered table-hover'>";
  
    while( $fieldinfo=mysqli_fetch_field($result))
    {
	     print ("<th>$fieldinfo->name</th>");
	  }
   while ($row = mysqli_fetch_row($result))
   {
	   print("<tr>");
	  foreach ($row as $col)
	  {
	     print("<td>$col</td>");
	  }
	  print("</tr>");
   }
   print("</table>");


?>
<script>
                function select() {
                    var qq = window.open('index.php', '_self', 'width=1300,height=1200,menubar=yes,toolbar=yes, status=yes,scrollbars=yes');       
            }
    
   


            </script>

 <button type="button" class="btn btn-outline-success" onclick="select()" id="myButton">back to main menu</button>



</body>
</html>