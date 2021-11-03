<?php 

	$d->reset();
    $sql = "select photo from #_background where type='logo-footer'";
    $d->query($sql);
    $logo_footer = $d->fetch_array();

	$d->reset();
	$sql = "select ten$lang as ten,noidung$lang as noidung from #_about where type='text-nhantin' limit 0,1";
	$d->query($sql);
	$text_nhantin = $d->fetch_array();

 ?>

<div id="w_nhantin">
<div class="container">
	<div class="row align-items-center">
		<div class="col-12 col-md-6 col-lg-4">
			<div class="logo_footer wow fadeIn" data-wow-duration="1s"><img src="<?=_upload_hinhanh_l.$logo_footer['photo']?>" alt="<?=$company['ten']?>" height="65"></div>
		</div>
		<div class="col-12 col-md-6 col-lg-4">
			<div class="ten_nhantin wow fadeIn" data-wow-duration="1s"><?=$text_nhantin['ten']?></div>
			<div class="noidung_nhantin wow fadeIn" data-wow-duration="1s"><?=$text_nhantin['noidung']?></div>
		</div>
		<div class="col-12 col-md-12 col-lg-4">
			<form name="frm_nhantin" id="frm_nhantin" method="post" action="index.html" class="wow fadeIn" data-wow-duration="1s">
				<input class="form-control" type="email" id="email_nhantin" name="email_nhantin" value="" placeholder="Email*" />
				<input class="mybtn btn-do" type="submit" id="submit_nhantin" name="submit_nhantin" value="Gửi thông tin" onclick="return sb_nhantin()" /> 
				<div class="clear"></div>
			</form>
		</div>
	</div>

</div>
</div>



