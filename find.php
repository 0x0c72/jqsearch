<?php
	define("HOST", "localhost");
	define("USER", "shenk");
	define("PW", "\$henkan72");
	define("DB", "jqsearch");

	$connect = mysqli_connect(HOST, USER, PW, DB)
	or die('Could not connect to mysql server.' );

	$term = strip_tags(substr($_POST['search_term'],0, 100));
	$term = mysqli_real_escape_string($connect, trim($term));

	$sql = "select name,phone
	from directory
	where name like '%$term%'
	or phone like '%$term%'
	order by name asc";	

	$result = mysqli_query($connect, $sql);

	$string = '';

	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_object($result)){
	    $string .= "<b>".$row->name."</b> - ";
	    $string .= $row->phone."</a>";
	    $string .= "<br/>\n";
	  }

	}else{
	  $string = "No matches!";
	} 

	echo $string;
?>