<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
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

//Lấy dữ liệu từ Form
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['txtMaSV']))
		$MaSV=$_POST['txtMaSV'];
		
	if(isset($_POST['txtHoTen']))
		$HoTen=$_POST['txtHoTen'];
	
	if(isset($_POST['txtNgaySinh']))
		$NgaySinh=$_POST['txtNgaySinh'];
	
	if(isset($_POST['cbGioiTinh']))
		$GioiTinh=$_POST['cbGioiTinh'];
	
	if(isset($_POST['txtQueQuan']))
		$QueQuan=$_POST['txtQueQuan'];
/*
	echo $MaSV;
	echo $HoTen;
	echo $NgaySinh;
	echo $GioiTinh;
	echo $QueQuan;
*/	

//Kiểm tra thông tin đã nhập đầy đủ chưa?
if((empty($MaSV))||(empty($HoTen))||(empty($NgaySinh))||(empty($GioiTinh))||(empty($QueQuan)))
{
	echo "Vui lòng nhập đầy đủ thông tin!!!";
}
else
{
	//Nếu thông tin đầy đủ thì thực hiện việc thêm dữ liệu vào CSDL
	$sql="INSERT INTO SinhVien(MaSV, HoTen, NgaySinh, GioiTinh, QueQuan) VALUES ('{$MaSV}','{$HoTen}','{$NgaySinh}','{$GioiTinh}','{$QueQuan}')";
	$truyvan=mysqli_query($ketnoi,$sql);
	if($truyvan==true)
	{
		echo "Thêm sinh viên thành công!!!";
	}
	else
	{
		echo "Không thể thêm được sinh viên, vui lòng thử lại";
	}
}


}
?>
<form action="ThemSV.php" method="post" name="ThemSV">

	<table cellpadding="0" cellspacing="0" style="width: 100%">
		<tr>
			<td style="width: 127px">Mã sinh viên</td>
			<td><input name="txtMaSV" style="width: 120px" type="text" />&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 127px">Họ và tên:</td>
			<td><input name="txtHoTen" style="width: 192px" type="text" />&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 127px">Ngày sinh:</td>
			<td><input name="txtNgaySinh" type="text" />&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 127px">Giới tính</td>
			<td><select name="cbGioiTinh">
			<option selected="selected">---Chọn giới tính---</option>
			<option value="Nam">Nam</option>
			<option value="Nữ">Nữ</option>
			</select>&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 127px">Quê quán:</td>
			<td><input name="txtQueQuan" style="width: 189px" type="text" />&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 127px">
			<input name="OK" type="submit" value="Xác nhận" />&nbsp;</td>
			<td><input name="CANCEL" type="reset" value="Thử lại" />&nbsp;</td>
		</tr>
	</table>

</form>

</body>

</html>
