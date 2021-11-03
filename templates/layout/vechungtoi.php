<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota,photo from #_slider where type='ve-chung-toi' and hienthi=1 order by stt,id desc"; 
$d->query($sql);
$ar_vechungtoi=$d->result_array();

?>
<div class="vechungtoi">
<div class="container">
	<div class="tieude_gc mb-40">
			<span>Tiêu Chí Hoạt Động Của Chúng Tôi</span>
		</div>
		<p class="sub_tieude_gc mb-15">Mục tiêu của chúng tôi là đồng hành với khách hàng và phấn đấu để thực sự trở thành"Đối tác đáng tin cậy của doanh nghiệp"</p>
	<div class="row"> 
		<?php foreach ($ar_vechungtoi as $value) { ?>
			<div class="col-12 col-md-6 col-lg-3">
				<div class="vechungtoi_item wow fadeInRight" data-wow-duration="1s">
					<div class="vechungtoi_img">
						<img src="<?=_upload_hinhanh_l.$value['photo']?>" alt="<?=$value['ten']?>">
					</div>
					<div class="vechungtoi_mota">
						<h3><?=$value['ten']?></h3>
						<p><?=$value['mota']?></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>