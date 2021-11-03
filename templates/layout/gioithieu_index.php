
<?php 
$d->reset();
$sql="select ten$lang as ten,mota$lang as mota,noidung$lang as noidung from #_about where type='text-gioi-thieu'"; 
$d->query($sql);
$text_gt=$d->fetch_array();
if($text_gt['noidung'] != ''){
?> 
	<div id="gioi-thieu2" class="w_dichvu" >
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="1s">
					<div class="tieude_gc mb-40">
						<span>Xuất Nhập Khẩu Hoa Quả Sơn</span>
					</div>
					<div class="container1">
						<div id="text_seo">
					<div class="content">
						<?=$text_gt['noidung']?>
					</div>
				</div>
				<div id="btn_xemthem">
				<div class="btn_xemthem-click"><a href="gioi-thieu.html"><button>Xem thêm >> </button></a></div>
			</div>
			</div>

						
		</div>
			<div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="1s">
				<?php 
				$d->reset();
				$sql="select ten$lang as ten,link,photo from #_slider where hienthi=1 and type='slider2'  order by stt,id desc";
				$d->query($sql);
				$bangtin = $d->result_array();
				 ?>
			<div class="sl_fade">
			<?php for($i=0,$count_bangtin = count($bangtin);$i<$count_bangtin;$i++){ ?>
				<div class="gt_img">
				<div class="pn-15">
						<!-- <a href="/<?=$bangtin[$i]['']?>.html""></a> -->
						<div class="item_img">
							<img src="thumb/600x400x1x90/<?=_upload_hinhanh_l.$bangtin[$i]['photo']?>" alt="<?=$bangtin[$i]['ten']?>"  onError="this.src='http://placehold.it/600x400';"  />
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
	</div>
</div>
<?php } ?>