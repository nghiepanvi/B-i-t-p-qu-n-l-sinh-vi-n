<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	color: #F31B1B;
	font-size: large;
}
.auto-style2 {
	text-align: center;
}
.auto-style3 {
	border-style: solid;
	border-width: 0px;
}
.auto-style4 {
	border-style: solid;
	border-width: 1px;
}
.auto-style5 {
	border-style: solid;
	border-width: 1px;
	background-color: #FAFA0D;
}
.auto-style6 {
	color: #0A0A0A;
	border-style: solid;
	border-width: 1px;
	background-color: #FAFA0D;
}
.auto-style7 {
	color: #0F0E0E;
}
.auto-style8 {
	color: #0F0E0E;
	border-style: solid;
	border-width: 1px;
	background-color: #FAFA0D;
}
</style>
</head>

<body class="auto-style1">
<?php
//Kết nối CSDL
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	
//Truy vấn bảng Sinh viên
$caulenh="select * from student";
$ketqua=mysqli_query($conn,$caulenh);

?>

<div class="auto-style2">
	<strong>DANH SÁCH SINH VIÊN
<br />
	</strong>
	<table cellpadding="0" cellspacing="0" class="auto-style3" style="width: 100%">
		<tr>
			<td class="auto-style6" style="height: 22px"><strong>Mã sinh viên</strong></td>
			<td class="auto-style8" style="height: 22px"><strong>Họ và tên</strong></td>
			<td class="auto-style5" style="height: 22px"><span class="auto-style7"><strong>Ngày sinh</strong></td>
			<td class="auto-style8" style="height: 22px"><strong>Giới tính</strong></td>
			<td class="auto-style6" style="height: 22px"><strong>Quê Quán</strong></td>
			
		</tr>
		<?php
		while($dong=mysqli_fetch_assoc($ketqua))
		{
		?>
		<tr>
			<td class="auto-style4"><?php echo $dong['TT']?></td>
			<td class="auto-style4"><?php echo $dong['Full_name']?></td>
			<td class="auto-style4"><?php echo $dong['birth_date']?></td>
			<td class="auto-style4"><?php echo $dong['Gender']?></td>
			<td class="auto-style4"><?php echo $dong['adress']?></td>
		</tr>
		<?php
		}
		?>
		
	</table>
</div>
</body>

</html>
