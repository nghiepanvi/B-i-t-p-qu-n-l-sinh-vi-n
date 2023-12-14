<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	border-style: solid;
	border-width: 0px;
}
.auto-style2 {
	border-style: solid;
	border-width: 1px;
}
.auto-style3 {
	color: #0F0E0E;
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FAFA0D;
}
</style>
</head>

<body>

<form action="XoaSV.php" method="post" name="XoaSinhVien">
	Mã sinh viên: <input name="txtMaSV" type="text" />
	<input name="OK" type="submit" value="Xác nhận xoá" /></form>
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
$MaSV = ""; // Khởi tạo biến
if(isset($_POST['txtMaSV']))
	{
		$MaSV=$_POST['txtMaSV'];
	}
//Tìm xem mã sinh viên nhập vào có trong CSDL không?
$tim = "select * from student where TT ='{$MaSV}'";
$kqTim=mysqli_query($conn,$tim);
$sodong=mysqli_num_rows($kqTim); 
if($sodong>0)
{
	$caulenh1="DELETE FROM studen WHERE TT='{$MaSV}'";
	$queryXoa=mysqli_query($conn,$caulenh1);
	echo "Xoá thành công";
	
}
else
	echo "Không có sinh viên nào có mã ";	
?>	
<table cellpadding="0" cellspacing="0" class="auto-style1" style="width: 100%">
	<tr>
		<td class="auto-style3"><strong>Mã sinh viên</strong></td>
		<td class="auto-style3"><strong>Họ và tên</strong></td>
		<td class="auto-style3"><strong>Ngày sinh</strong></td>
		<td class="auto-style3"><strong>Giới tính</strong></td>
		<td class="auto-style3"><strong>Quê quán</strong></td>
	</tr>
	<?php
	$caulenh2="select * from student";
	$ketqua=mysqli_query($conn,$caulenh2);
	while($dong=mysqli_fetch_assoc($ketqua))
	{
	?>
	<tr>
		<td class="auto-style2"><?php echo $dong['TT']?></td>
		<td class="auto-style2"><?php echo $dong['Full_name']?></td>
		<td class="auto-style2"><?php echo $dong['birth_date']?></td>
		<td class="auto-style2"><?php echo $dong['Gender']?></td>
		<td class="auto-style2"><?php echo $dong['adress']?></td>
	</tr>
	<?php
	}
	?>
</table>

</body>

</html>
