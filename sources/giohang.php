<?php  if(!defined('_source')) die("Error");
if(isAjaxRequest()){
	include _template."giohang_tpl.php";
	die;
}else{

	if(count($_SESSION['cart'])>0)
	{
		$d->reset();
		$sql_thanhpho = "select id,ten from #_place_city where hienthi=1 order by stt,id asc";
		$d->query($sql_thanhpho);
		$thanhpho = $d->result_array();	

		$d->reset();
		$sql_banner = "select photo from #_background where type='logo-mobile' limit 0,1";
		$d->query($sql_banner);
		$row_banner = $d->fetch_array();

		$d->reset();
		$sql_thongtin_user = "select * from #_user where id='".$_SESSION['login']['id']."'";
		$d->query($sql_thongtin_user);
		$thongtin_user = $d->fetch_array();
		

	if(!empty($_POST['email'])){	
		
		$httt=$_POST['httt'];
		$giaphi=$_POST['phigiaohang'];
		$ngaygiao=$_POST['ngaynhan'];
		$hoten=$_POST['hoten'];
		$dienthoai=$_POST['dienthoai'];
		$diachi=$_POST['diachi'];
		$email=$_POST['email'];
		$noidung=$_POST['noidung'];
		$thanhpho=$_POST['thanhpho'];
		$quan=$_POST['quan'];
		$httt=$_POST['httt'];
		$phuong=$_POST['phuong'];
		$ip = 0;
		$id_user = $_SESSION['login']['id'];
		$tinh_ht=get_tinh($thanhpho);
		$quan_ht=get_quan($quan);	
		//validate dữ liệu
		$hoten = trim(strip_tags($hoten));
		$dienthoai = trim(strip_tags($dienthoai));	
		$diachi = trim(strip_tags($diachi));	
		$email = trim(strip_tags($email));	
		$noidung = trim(strip_tags($noidung));	

	//	$hoten = mysqli_real_escape_string($hoten);
		//$dienthoai = mysqli_real_escape_string($dienthoai);
		//$diachi = mysqli_real_escape_string($diachi);
		//$email = mysqli_real_escape_string($email);
		//$noidung = mysqli_real_escape_string($noidung);	
		$tonggia = get_order_total();					

		$ngaydangky = time();
		$ngaycapnhat = time();
		$nguongoc = '0';
		
		
		$coloi=false;		
		if ($hoten == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		} 
		if ($dienthoai == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		}
		if ($thanhpho == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		}
		if ($quan == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		}
		if ($diachi == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		}
		if ($httt == NULL) { 
			transfer(_chuanhapduthongtin, "index.html");
		}
		if ($coloi==FALSE) 
		{
			#Mẫu mã đơn hàng VD:05032016NN101
			$donhangmau = date('dmY').'NN';

			#Kiểm tra mã đơn hàng lớn nhất trong ngày
			$d->reset();
			$sql = "select id,madonhang from #_donhang where madonhang like '$donhangmau%' order by id desc limit 0,1";
			$d->query($sql);
			$max_order = $d->fetch_array();
			
			#Nếu không tồn tại đơn hàng nào trong ngày hôm nay
			if(empty($max_order['id']))
			{
				$songaunhien = 101;
			}
			else
			{
				(int)$songaunhien =  substr($max_order['madonhang'],10)+1;
			}
			$mahoadon = date('dmY').'NN'.$songaunhien;
			$sql = "INSERT INTO  table_donhang (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,thanhpho,quan,phuong,noidung,ngaytao,tinhtrang,nguongoc,ngaycapnhat,htgh,ip,export,id_user,phivanchuyen) 
			  VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','$httt','$tonggia','$thanhpho','$quan','$phuong','$noidung','$ngaydangky','1','$nguongoc','$ngaycapnhat','$htgh','$ip','1','$id_user','$giaphi')";	
			
			
		/* lưu đơn hàng */
		$d->reset();
		$data_donhang['madonhang'] = $madonhang;
		$data_donhang['hoten'] = $hoten;
		$data_donhang['dienthoai'] = $dienthoai;
		$data_donhang['diachi'] = $diachi;
		$data_donhang['email'] = $email;
		$data_donhang['httt'] = $httt;
		$data_donhang['tonggia'] = $tonggia;
		$data_donhang['thanhpho'] = $thanhpho;
		$data_donhang['quan'] = $quan;
		$data_donhang['phuong'] = $phuong;
		$data_donhang['noidung'] = $noidung;
		$data_donhang['ngaytao'] = $ngaydangky;
		$data_donhang['tinhtrang'] = 1;
		$data_donhang['nguongoc'] = $nguongoc;
		$data_donhang['ngaycapnhat'] = $ngaycapnhat;
		$data_donhang['htgh'] = $htgh;
		$data_donhang['ip'] = $ip;
		$data_donhang['export'] = 1;
		$data_donhang['id_user'] = $id_user;
		$data_donhang['phivanchuyen'] = $giaphi;
		$d->setTable('donhang');
		$order_insert = $d->insert($data_donhang);
			
		}		
		
		if(($order_insert))#Nếu insert bảng đơn hàng thành công
		{
			
			if(is_array($_SESSION['cart']))
			{
				$max = count($_SESSION['cart']);
				$co = true;
				foreach($_SESSION['cart'] as $k=>$v){
					
					$pid=$v['productid'];
					$q=$v['qty'];
					$size=$v['size'];
					$mausac=$v['color'];
					$pmasp=get_code($pid);					
					$pname=get_product_name($pid,$lang);
					$info=getProductInfo($pid);
					$pphoto=get_product_photo($pid);
					$pgia = $info['gia']; 
					$pgiakm = $info['giakm']; 
					$image =$info['photo'];
					$ptonggia = get_price($pid)*$q;
					$pgiamua=get_price($pid);
					
					if($q==0) continue;
					$sql = "INSERT INTO  table_chitietdonhang (madonhang,masp,ten,gia,soluong,tonggia,photo,ngaytao,id_sanpham,size,mausac,httt) 
						  VALUES ('$mahoadon','$pmasp','$pname','$pgiamua','$q','$ptonggia','$image','$ngaydangky','$pid','$size','$mausac','$httt')";			
					
					$d->reset();
					$data_donhangchitiet['madonhang'] = $mahoadon;
					$data_donhangchitiet['masp'] = $pmasp;
					$data_donhangchitiet['ten'] = $pname;
					$data_donhangchitiet['gia'] = $pgiamua;
					$data_donhangchitiet['soluong'] = $q;
					$data_donhangchitiet['tonggia'] = $ptonggia;
					$data_donhangchitiet['photo'] = $image;
					$data_donhangchitiet['ngaytao'] = $ngaydangky;
					$data_donhangchitiet['id_sanpham'] = $pid;
					$data_donhangchitiet['size'] = $size;
					$data_donhangchitiet['httt'] = $httt;
					$d->setTable('chitietdonhang');
					$d->insert($data_donhangchitiet);
					
					
					if(($data_donhangchitiet)==true)
					{
						$co = true;
					}	
					else
					{
						
						transfer(_chuaduocgui."<br>"._dienthongtin."<br>"._camon, "thanh-toan.html");
					}
				}
				if($co == true)
				{
					#Thông tin công ty
					$sql_company = "select * from #_company limit 0,1";
					$d->query($sql_company);
					$company= $d->fetch_array();	
					
					include_once "phpMailer/class.phpmailer.php";	
					$mail = new PHPMailer();
					$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
					$mail->Host       = $ip_host;   // tên SMTP server
					$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
					$mail->Username   = $mail_host; // SMTP account username
					$mail->Password   = $pass_mail; 
					/*$mail->SMTPSecure   = 'ssl';  
					$mail->Port   = 465; */
			
					//Thiết lập thông tin người gửi và email người gửi
					$mail->SetFrom($mail_host,$company['ten']);
					
					//Thiết lập thông tin người nhận
					$mail->AddAddress($company['email'], $company['ten']);
					if($company['email2'] !=''){
						$mail->AddAddress($company['email2'], $company['ten']);
					}
					$mail->AddAddress($email, $hoten);
					
					
					//Thiết lập email nhận email hồi đáp
					//nếu người nhận nhấn nút Reply
					$mail->AddReplyTo($email,'Đơn hàng từ '.$hoten);
					/*=====================================
					 * THIET LAP NOI DUNG EMAIL
					*=====================================*/
					//Thiết lập tiêu đề
					$mail->Subject    = "Đơn hàng từ ".$hoten;
					$mail->IsHTML(true);
					//Thiết lập định dạng font chữ
					$mail->CharSet = "utf-8";
					$header.='<table width="100%" border="0" style="border-collapse: collapse;"><tr><td colspan="6"><table style="width:100%;background: #a5a2a2; color: #FFF"><tr>';
			$header.='<td style="padding:7px; text-align:left;width:50%;">';
			$header.='<img src="http://'.$config_url.'/'._upload_hinhanh_l.$row_banner['photo'].'" alt="'.$company['ten'].'" style="margin-left:10px;" height="50"  />';
			$header.='</td>';
			$header.='<td style="padding:7px; text-align:right;">';
			$header.='<p><img src="http://'.$config_url.'/images/phone.png" style="margin-right:10px;" />';
			$header.='<strong style="">Hotline:</strong>';
			$header.='<strong style="color:#FF0;display:block;">'.$company['dienthoai'].'</strong>';
			$header.='</p>';
			$header.='</td>';
			$header.='</tr></table></td></tr>';
            //END Header mail
            $footer = '';
            ///Footer mail
            $footer.='<tr><td colspan="6"><table style="width:100%;border-top:1px solid #CCC; background: #a5a2a2; color: #FFF"><tr>';
			$footer.='<td style="padding:7px; text-align:center;width:20%;">';
			$footer.='<img src="http://'.$config_url.'/'._upload_hinhanh_l.$row_banner['photo'].'" alt="'.$company['ten'].'" height="60" />';
			$footer.='</td>';
			$footer.='<td style="padding:7px; text-align:left;width:80%"><p class="alviss_footer"><b>'.$company['ten'].'</b><br>
			Địa chỉ: '.$company['diachi'].'<br/>			
			Điện thoại: '.$company['dienthoai'].'<br/>			
			Email: '.$company['email'].'<br/>
			Website: '.$company['website'].'<br/>
			<br></p>';
			$footer.='</td>';
			$footer.='</tr></table></td></tr></table>';
            //END footer mail
			$body = '<tr><td colspan="5">
				<p>Cảm ơn quý khách đã đặt hàng dưới đây là thông tin đơn hàng của quý khách:</p></td></tr>
							 
				  <tr style="height:40px; padding:10px;">
					<td colspan="2" style="line-height:40px;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">Mã đơn hàng: <b>' .$mahoadon. '</b></td>
					<td colspan="3" style="border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;line-height:25px;">
						<table>
						<tr><td>Ngày đặt hàng: <b>' . date('d/m/Y H:i:s', time()) . '</b><td></tr>
						<tr><td>Trạng thái đơn hàng: Mới đặt<td></tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td colspan="5" style="line-height:25px;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">
						<table><tr><td><b>THÔNG TIN KHÁCH HÀNG</b></td></tr>
						<tr><td>Họ tên: ' . $_POST['hoten']. '</td></tr>
						<tr><td>Địa chỉ: ' .$diachi.'-'.$quan_ht.'-'.$tinh_ht.'</td></tr>
						<tr><td>Điện thoại: ' . $_POST['dienthoai']. '</td></tr>
						<tr><td>Email: ' . $_POST['email']. '</td>
						<tr><td>Hình thức thanh toán: ' .getHTTTById( $_POST['httt']). '</td></tr></table>
					</td>					
				  </tr>				 				 
						<tr>
							<td style="text-align:center;width:10%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Hình ảnh</b></td>
							<td style="text-align:center;width:30%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Tên sản phẩm</b></td>							
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Giá</b></td>
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Số lượng</b></td>
							<td style="text-align:center; width:20%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><b>Thành tiền</b></td>
						</tr>';
			## Tao du lieu don hang				
				$max=count($_SESSION['cart']);
					foreach($_SESSION['cart'] as $k=>$v){
					$pid=$v['productid'];
					$q=$v['qty'];
					$s=$v['size'];
					$info=getProductInfo($pid);
					$mausac=$v['color'];					
					$pname=get_product_name($pid,$lang);	
					if($q==0) continue;
					
					 $body.='<tr>
							<td style="width:10%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;"><img src="http://'.$config_url.'/thumb/200x150x1x90/'._upload_sanpham_l.$info['photo'].'" height="100"/></td>
							<td style="width:30%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">
								<table>
									<tr><td>' . $info['ten'.$lang] . '</td></tr>';
									/* if($s!=''){
										$body.='<tr><td> Màu :' .getColorById($mausac). '</td></tr>';}
									if($mausac!=''){
										$body.='<tr><td> Kích thước :' . getSizeById($size). '</td></tr>';}
										*/
								$body.='</table>
							</td>							
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . number_format(get_price($pid), 0, ',', '.') . '&nbsp;VNĐ</td>
							<td style="text-align:center;width:15%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . $q . '</td>
							<td style="text-align:center; width:20%;border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;">' . number_format(get_price($pid) * $q, 0, ',', '.') . '&nbsp;VNĐ</td>
						</tr>';

		}


		 $body.='<tr><td colspan="5" style="text-align:right; border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;" >Tổng cộng: <b>' . number_format(get_order_total(), 0, ',', '.') . '&nbsp;VNĐ</b></td></tr>';   

        $body.='<tr><td colspan="5" style="text-align:right; border: 1px solid #E9E9E9;padding: 5px;background-color: #FFF;" >Tổng thanh toán: <b>' . number_format(get_order_total(),0, ',', '.') . '&nbsp;VNĐ</b></td></tr>';

			$body1 = '<table>';
			$body1 .= '<tr><th>Nội dung:</th><td>'.$noidung.'</td></tr>';
			$body1 .= '</table>';

			$body2 = $header.$body.$body1.$footer;
			
				   #------------Chi tiết đơn hàng---------------------
						$mail->Body = $body2;
						if($mail->Send())
						{
							unset($_SESSION['cart']);
							$_SESSION['thanhcong']=$mahoadon;
							redirect("thanh-cong.html");

						}
						else
							
							transfer(_xinloiquykhach."<br>"._hethongbiloixinthulai, "index.html");
						}
            }
			else{
				transfer(_donhangchuacosanpham."<br>"._chonsanphamdemuahang."<br>"._camon, "index.html");
			}
		}
		else
			
			transfer(_xinloiquykhach."<br>"._hethongbiloixinthulai, "index.html");	
		}
	}

	else
	{
		transfer(_chuamuasanpham."<br/>"._camon."!!!.", "index.html");
	}
}
	
?>