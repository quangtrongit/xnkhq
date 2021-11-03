<?php 


	$d->reset();
	$sql = "select ten$lang as ten,mota$lang as mota,id,tenkhongdau from #_product_danhmuc where hienthi=1 and type='san-pham' and noibat=1 order by stt,id desc";
	$d->query($sql); 
	$danhmuc_id=$d->result_array();
?>

<div class="w_dichvu pb-0">
<div class="container">
<?php for($i=0;$i<count($danhmuc_id);$i++){
	$d->reset();
 	$sql="select *,ten$lang as ten from table_product where hienthi=1 and id_danhmuc='".$danhmuc_id[$i]['id']."' and type='san-pham' and noibat=1 order by stt,id desc limit 0,6";
 	$d->query($sql); 
 	$product=$d->result_array();

?>
   	<h2 class="tieude_gc">
      <span><?=$danhmuc_id[$i]['ten']?></span>
    </h2>
    <?php if($danhmuc_id[$i]['mota'] != '') { 
      echo '<p class="sub_tieude_gc">'.nl2br($danhmuc_id[$i]['mota']).'</p>'; 
      } 
  ?>
    <div class="row">
<?php for($j=0,$count_product=count($product);$j<$count_product;$j++){	?>
    <div class="col-lg-4 col-sm-4 col-12 mb-30">
        <div class="item item_sanpham wow fadeIn" data-wow-duration="1s">
            <div class="item_img hover_sang border_vien">
                <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">
                  <img src="thumb/480x320x1x90/<?=_upload_sanpham_l.$product[$j]['photo']?>" alt="<?=$product[$j]['ten']?>"  onError="this.src='http://placehold.it/400x400';"  />
                </a>
                
            </div>
            <h3 class="item_name">
              <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><?=$product[$j]['ten']?></a>
            </h3>
            <div class="item_gia">
              <?php
               	if($product[$j]['giakm']!=0){
               		echo '<span class="del-gia">'.number_format($product[$j]['gia'],0, ',', '.').'<sup>đ</sup> / <span>Tấm</span></span>';
               		echo '<span class="gia-ban">'.number_format($product[$j]['giakm'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Tấm</span>';
               	}else{
               		if($product[$j]['gia']!=0){
               			echo '<span class="gia-ban">'.number_format($product[$j]['gia'],0, ',', '.').'<sup>đ</sup></span> / <span class="txt_xanh">Tấm</span>';
               		}else{
               			echo '<a href="lien-he.html" class="gia-ban">'._lienhe.'</a>';
               		}
                }
              ?>
            </div>
            <?php /* ?><div class="item_button">
                <div class="cart">
                    <button class="add-cart active" onclick="return addCart1(<?=$product[$j]['id']?>,'<?=$product[$j]['ten']?>')" data-id="<?=$product[$j]['id']?>" data-name="<?=$product[$j]['ten']?>">
                        <i class="fa fa-cart-plus"></i><span class="mobi_none"> <?=_themvaogio?></span>
                    </button> 
                </div>
            </div><?php */ ?>
        </div><!---END .item-->
    </div><!---END .col-->
<?php } ?>
</div><!---END row-->

<?php }?>

</div>
</div>

