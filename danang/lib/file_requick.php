<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);

	#Thông tin
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi,slogan$lang as slogan,diachi2$lang as diachi2 from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();

	$d->reset();
	$sql = "select * from #_anhnen where type='background' limit 0,1"; 
	$d->query($sql);
	$row_bg = $d->fetch_array();

	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi,slogan$lang as slogan,diachi2$lang as diachi2 from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();

	#Gọi ngôn ngữ
	$lang_default = array("","en");
	if(!isset($_SESSION['lang']) or !in_array($_SESSION['lang'], $lang_default))
	{
		$_SESSION['lang'] = $company['lang_default'];
	}
	$lang=$_SESSION['lang'];
	require_once _source."lang$lang.php";

	$breadcumbs[]= array('',_trangchu);
	switch($com)
	{
		case '':
		case 'index':
			$title = $company['title'];
			$title_cat = $company['title'];
			$source = "index";
			$template = "index";
			break;
		case 'san-pham':
			$type = "san-pham";
			$title = _sanpham;
			$title_cat = _sanpham;
			$source = "product";
			$breadcumbs[]= array('san-pham.html',_sanpham);
			$template = isset($_GET['id']) ? "product_detail" : "product";
			break;
		case 'tim-kiem':
			$type = "san-pham";
			$title = _ketquatimkiem;
			$title_cat = _ketquatimkiem;
			$source = "search";
			$template = "product";
			break;
		
		case 'ajax': 
			$source = "ajax";
			break;
		
		case 'tin-tuc':
			$type = "tin-tuc";
			$title = _tintuc;
			$title_cat = _tintuc;
			$source = "news";
			$breadcumbs[]= array('tin-tuc.html',_tintuc);
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		case 'dich-vu':
			$type = "dich-vu";
			$title = _dichvu;
			$title_cat = _dichvu;
			$source = "news";
			$breadcumbs[]= array('dich-vu.html',_dichvu);
			$template = isset($_GET['id']) ? "dichvu_detail" : "dichvu";
			break;
		case 'gioi-thieu':
			$type = "gioi-thieu";
			$title = _gioithieu;
			$title_cat = _gioithieu;
			$source = "about";
			$breadcumbs[]= array('gioi-thieu.html',_gioithieu);
			$template = "about";
			break;
		
		case 'lien-he':
			$type = "lien-he";
			$title = _lienhe;
			$title_cat = _lienhe;
			$breadcumbs[]= array('lien-he.html',_lienhe);
			$source = "contact";
			$template = "contact";
			break;

		case 'dk-dai-ly':
			$type = "dk-dai-ly";
			$title = _dkdaily;
			$title_cat = _dkdaily;
			$breadcumbs[]= array('dk-dai-ly.html',_dkdaily);
			$source = "dklamdaily";
			$template = "dklamdaily";
			break;
		case 'thanh-toan':
			$type = "thanh-toan";
			$title = "Thanh toán";
			$title_cat = "Thanh toán";
			$breadcumbs[]= array('thanh-toan.html',"Thanh toán");
			$source = "about";
			$template = "about";
			break;
		case 'ho-tro-khach-hang':
			$type = "ho-tro-khach-hang";
			$title = _hotrokhachhang; 
			$title_cat = _hotrokhachhang;
			$source = "news";
			$breadcumbs[]= array('ho-tro-khach-hang.html',_hotrokhachhang);
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		case 'thanh-cong':
			if(isset($_SESSION['thanhcong'])){ 
				$breadcumbs[]= array('thanh-cong.html',"Thành công");
				$title = _donhanghoantat;
				$title_cat = _donhanghoantat;
				$template = "thanhcong";
				$type = "giohang";
			}else{
			    transfer(_chuamuasanpham."<br/>"._camon."!!!.", "index.html");
			}
			break;
		case 'gio-hang':
			$breadcumbs[]= array('gio-hang.html',_giohang);
			$type = "giohang";
			$title = _giohang;
			$title_cat = _giohang;
			$source = "giohang";
			$template = "giohang";
			break;	
/*		case 'thanh-toan':
			$type = "thanhtoan";
			$title = _thanhtoan;
			$title_cat = _thanhtoan;
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;*/
		case 'ngonngu':
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
						case '':
							$_SESSION['lang'] = '';
							break;
						case 'en':
							$_SESSION['lang'] = 'en';
							break;
						default: 
							$_SESSION['lang'] = '';
							break;
					}
			}
			else{
				$_SESSION['lang'] = '';
			}
		redirect($_SERVER['HTTP_REFERER']);
		break;	
										
		default: 
			$breadcumbs[]= array('',_khongtimthaytrang);
			$source = "index";
			$template = "index";
			$title_cat = _khongtimthaytrang;
			break;
	}
	
	if($source!="") include _source.$source.".php";	
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}

	$arr_animate =array("bounce","flash","pulse","rubberBand","shake","swing","tada","wobble","jello","bounceIn","bounceInDown","bounceInLeft","bounceInRight","bounceInUp","bounceOut","bounceOutDown","bounceOutLeft","bounceOutRight","bounceOutUp","fadeIn","fadeInDown","fadeInDownBig","fadeInLeft","fadeInLeftBig","fadeInRight","fadeInRightBig","fadeInUp","fadeInUpBig","fadeOut","fadeOutDown","fadeOutDownBig","fadeOutLeft","fadeOutLeftBig","fadeOutRight","fadeOutRightBig","fadeOutUp","fadeOutUpBig","flip","flipInX","flipInY","flipOutX","flipOutY");	
?>