<?php 
$d->reset();
        $sql = "select id,ten$lang as ten,tenkhongdau from #_product_danhmuc where hienthi=1 order by stt, id desc ";
        $d->query($sql);
        $array_danhmuc = $d->result_array();

        $d->reset();
        $sql = "select id,ten$lang as ten,tenkhongdau,mota from #_news where hienthi=1 and type='dich-vu' order by stt, id desc ";
        $d->query($sql);
        $arr_dichvu = $d->result_array();
        //    echo "<pre>";
        //     print_r($arr_dichvu);
        // echo "</pre>";
 ?>
<script language="javascript"> 
    function doEnter2(evt){
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch2(evt);
	}
	}
	function onSearch2(evt) {
			var keyword2 = document.getElementById("keyword2").value;
			if(keyword2=='' || keyword2=='<?=_nhaptukhoatimkiem?>...')
			{
				alert('<?=_chuanhaptukhoa?>');
			}
			else{
				location.href = "tim-kiem.html&keyword="+keyword2;
				loadPage(document.location);
			}
		}
</script>
<!--Tim kiem-->

<div class="header"><a href="javascript:void(0)" class="action_menu">
    <span class="s1"></span>
    <span class="s2"></span>
    <span class="s3"></span>
</a>
</div>
<nav id="menu_mobi" class="menu_overlay">
    <div class="text-center caption_menu">Menu</div>
    <ul>
        
    	<li id="search_mobi">
            <input type="text" name="keyword2" id="keyword2" onKeyPress="doEnter2(event,'keyword2');" value="<?=_nhaptukhoatimkiem?>..." onclick="if(this.value=='<?=_nhaptukhoatimkiem?>...'){this.value=''}" onblur="if(this.value==''){this.value='<?=_nhaptukhoatimkiem?>...'}">
            <i class="fa fa-search" aria-hidden="true" onclick="onSearch2(event,'keyword2');"></i>
    	</li><!---END #search-->
        
        <li class="no-border">
            <a class="ac <?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href="index.html"><?=_trangchu?></a>
            
            <?php /* ?>
            <div class="lienket_nn">
                <a href="index.php?com=ngonngu&lang="><img src="images/vi.png" alt="Tiếng Việt" /></a>
                <a href="index.php?com=ngonngu&lang=en"><img src="images/en.png" alt="Tiếng Anh" class="mr-0" /></a>
            </div>
            <?php */ ?>
        </li>
        
       <li><a class="ac <?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a></li>

        <li><a class="ac <?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?><i class="fa fa-angle-right"></i>
        <ul class="menu_sanpham">
            
                <?php
                foreach ($array_danhmuc as $value) {
 
                ?>
                <li>
                    <a class="ac" href="san-pham/<?=$value['tenkhongdau']?>"><?=$value['ten']?></a>
                </li>
                <?php
                }
                ?>
           </ul></a>

        </li>
        
        <li><a class="ac <?php if($_REQUEST['com'] == 'dich-vu') echo 'active'; ?>" href="dich-vu.html"><?=_dichvu?><i class="fa fa-angle-right"></i></a>
            <ul class="menu_sanpham">
        <?php 
        foreach ($arr_dichvu as $value1) {
            // code...
        ?>
        <li>
            <a class="ac" href="dich-vu/<?=$value1['tenkhongdau']?>.html"><?=$value1['ten']?></a>
        </li>
        
        <?php
        }
        ?>   
    </ul>
        </li>

         <li><a class="ac <?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a></li>
        
        <li class="last"><a class="ac <?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a></li>
    </ul>
</nav>