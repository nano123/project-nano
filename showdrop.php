<?php
ob_start();
include_once("databaseconnection.php");
$sql="select * from category order by id desc";
$exe=mysql_query($sql);
//$fetch=mysql_fetch_array($exe);
//print_r($fetch);

?>
<html>
<head>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script src="jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function()
{
	$("#btn").click(function()
	{
		var category=$("#btn").val();
		$.get('actionshowdrop.php',{category:category},function(result)
		{
			$("#btn2").html(result);
		});
	});
	$("#btn2").click(function()
	{
		var subcategory=$("#btn2").val();
		$.get('actionshowdrop.php',{subcategory:subcategory},function(result)
		{
			$("#btn3").html(result);
		});
	});
	
});
</script>
</head>
<body>
<form method="post" action="" name="show">
<table width="100" height="100">
<tr>
	<td>Category</td>
	<td>
		
		<select id="btn" name="category">
		<?php 
		while($fetch=mysql_fetch_array($exe))
		{
		?>
		<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['category'];?></option>
		<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td>SubCategory</td>
	<td>
		<select id="btn2" name="subcategory">
		</select>
	</td>
</tr>
<tr>
	<td>subSubCategory</td>
	<td>
		<select id="btn3" name="subcategory">
		</select>
	</td>
</tr>
	


</table>
</form>
</body>
<html>