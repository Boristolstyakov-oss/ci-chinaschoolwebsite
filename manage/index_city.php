<?php
	$conn=mysqli_connect("localhost","root","123456","school");
	mysqli_query($conn, "set names utf8");
	$sql="select * from city where fatherid=".$_GET['provinceid'];
	$query=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($query)){
		$city[]=$row;
	}
?>
<select id="city" name="city">
	<option value="0">请选则市</option>
	<?php 
		foreach($city as $k=>$v){
	?>
		<option value='<?php echo $v['cityid']?>'><?php echo $v['city']?></option>
	<?php
		}
	?>
</select>