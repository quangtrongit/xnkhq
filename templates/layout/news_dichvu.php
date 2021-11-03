<?php 

$d->reset();
$sql="select ten$lang as ten,mota$lang as mota, tenkhongdau, photo from #_news where hienthi=1 and type='dich-vu' and hienthi=1 and noibat=1  order by stt,id desc";
$d->query($sql);
$bangtin = $d->result_array();
 ?>
<div class="w_dichvu" id="dich-vu">
	<div class="container">
		<div class="tieude_gc mb-40">
			<span>Dịch Vụ Nỗi Bật</span>
		</div>
		<p class="sub_tieude_gc">Các dịch vụ mà chúng tôi cung cấp</p>
		<div class="sl_news">
			<?php for($i=0,$count = count($bangtin);$i<$count;$i++){ ?>
				<div class="pn-15  ">
					<div class="item item_news wow fadeIn" data-wow-duration="1s">
						<a href="dich-vu/<?=$bangtin[$i]['tenkhongdau']?>.html"></a>
						<div class="item_img">
							<img src="thumb/480x320x1x90/<?=_upload_tintuc_l.$bangtin[$i]['photo']?>" alt="<?=$bangtin[$i]['ten']?>"  onError="this.src='http://placehold.it/480x320';"  />
						</div> 
						<?php /* ?><!-- <div class="new_time">
				            <span class="day"><?=date('d',$v['ngaytao'])?></span>
				            <span class="month"><?=date('M',$v['ngaytao'])?></span>
				        </div> --><?php */ ?>
						<h4 class="item_name"><?=$bangtin[$i]['ten']?></h4>
						<div class="item_content">
				            <?=catchuoi($bangtin[$i]['mota'],150)?>
				        </div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
 </div> 
