<?php
 	error_reporting(0);
	$d->reset();
	$sql = "select photo from #_background where type='logo-desktop' limit 0,1";
	$d->query($sql);
	$logo_desktop = $d->fetch_array();

	$d->reset();
	$sql = "select photo from #_background where type='logo-mobile' limit 0,1";
	$d->query($sql);
	$logo_mobile = $d->fetch_array();

	$d->reset();
	$sql="select ten$lang as ten,link,id,photo from #_slider where hienthi=1 and type='social' order by stt,id desc"; 
	$d->query($sql);
	$social=$d->result_array();

	$d->reset();
	$sql="select ten$lang as ten,mota$lang as mota,id,photo from #_slider where hienthi=1 and type='info-head' order by stt,id desc"; 
	$d->query($sql);
	$infoHead=$d->result_array();

	
?>
<div id="header">
	<div class="top_head">
		<div class="container">
			<div class="h-item float-left"><i class="fa fa-phone"></i> <span><?=$company['dienthoai']?></span></div>
			<div class="h-item float-left"><i class="fa fa-envelope"></i> <span><?=$company['email']?></span></div>
		    <div id="h-social">
	          <?php foreach($social as $k=>$v){?>
	              <a href="<?=$v['link']?>" title="<?=$v['ten']?>"><img src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a>
	          <?php }?>
	        </div>
	        <div id="search" class="float-right">
	            <input type="text" name="keyword" id="keyword" onKeyPress="doEnter(event,'keyword');" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}">
	            <i class="fa fa-search" onclick="onSearch(event,'keyword');"></i>
	            <div class="clear"></div>
	        </div><!---END #search-->
		    <div class="clear"></div> 
		</div>
	</div>
	<div class="menu_main">
		<div class="container">
		    <div id="menu">
		    	<div class="logo_head">
				    <a href=""></a>
				    <img src="<?=_upload_hinhanh_l.$logo_desktop['photo']?>" class="logo-desktop" alt="<?=$company['ten']?>" onError="this.src='http://placehold.it/200x75';" height="60" />
				</div>
			    <?php include _template."layout/menu_top.php";?>
		    </div><!---END #menu-->
		    <div>
				<?php include _template."layout/menu_mobi.php";?>
		    </div><!---END #menu_mobi-->
		</div>
	</div>
</div>
<div class="shop_cart">
	<a href="gio-hang.html" title="Giỏ hàng">
		<span class="icon-cart"></span><span class="num-cart"><?=get_total();?></span>
	</a>
</div>
<!--Tim kiem-->
<script language="javascript"> 
    function doEnter(evt){ 
    var key;
    if(evt.keyCode == 13 || evt.which == 13){
        onSearch(evt);
    }
    }
    function onSearch(evt) {            
    
            var keyword = document.getElementById("keyword").value;
            if(keyword=='' || keyword=='<?=_nhaptukhoatimkiem?>...')
            {
                alert('<?=_chuanhaptukhoa?>');
            }
            else{
                location.href = "tim-kiem.html&keyword="+keyword;
                loadPage(document.location);            
            }
        }       
</script>   
<!--Tim kiem-->