<?php 
      /*  $d->reset();
        $sql = "select id,ten$lang as ten,title,keywords,description from #_news where hienthi=1 and id='".$id_cat."' limit 0,1";
        $d->query($sql);
        $item = $d->fetch_array();

         $d->reset();
        $sql = "select id,ten$lang as ten,title,keywords,description from #_news where hienthi=1 and id='".$id_cat."'";
        $d->query($sql);
        $ar = $d->result_array();

        */
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


<ul class="main_nav"> 
    <li> <a class="ac <?php if((!isset($_REQUEST['com'])) or ($_REQUEST['com']==NULL) or $_REQUEST['com']=='index') echo 'active'; ?>" href="index.html"><?=_trangchu?></a></li>
     <li>
        <a class="ac <?php if($_REQUEST['com'] == 'gioi-thieu') echo 'active'; ?>" href="gioi-thieu.html"><?=_gioithieu?></a>
    </li>

    <li>
        <a class="ac <?php if($_REQUEST['com'] == 'san-pham') echo 'active'; ?>" href="san-pham.html"><?=_sanpham?>
        <i class="fa fa-angle-down"></i>
        </a>


        <ul class="menu_sanpham">
            
                <?php
                foreach ($array_danhmuc as $value) {
                     $d->reset();
                    $sql = "select id,ten$lang as ten,tenkhongdau from #_product_list where hienthi=1 and id_danhmuc=".$value['id']." order by stt, id desc ";
                    $d->query($sql);
                    $array_danhmuc2 = $d->result_array(); 
                ?>
                <li><a class="ac" href="san-pham/<?=$value['tenkhongdau']?>"><?=$value['ten']?></a>
                    <ul>
                        <?php 
                        foreach($array_danhmuc2 as $val){

                         ?>
                    <li>
                        <a class="ac" href="san-pham/<?=$val['tenkhongdau']?>/"><?=$val['ten']?></a>
                    </li>
                    <?php
                    }
                    ?>
                    </ul>
                </li>
                <?php
                }
                ?>
           </ul>
    </li>

    
 </li>

 <li>
        <a class="ac <?php if($_REQUEST['com'] == 'dich-vu') echo 'active'; ?>" href="dich-vu.html"><?=_dichvu?>
        <i class="fa fa-angle-down"></i>
         </a>
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
    
    <li><a class="ac <?php if($_REQUEST['com'] == 'tin-tuc') echo 'active'; ?>" href="tin-tuc.html"><?=_tintuc?></a>
        
    </li>
    
    <li>
        <a class="ac <?php if($_REQUEST['com'] == 'lien-he') echo 'active'; ?>" href="lien-he.html"><?=_lienhe?></a>
    </li>

    <li>
        <a class="ac <?php if($_REQUEST['com'] == 'dk-dai-ly') echo 'active'; ?>" href="dk-dai-ly.html"><?=_dkdaily?></a>
    </li>


    <!-- <li>
        <a class="ac <?php if($_REQUEST['com'] == 'dat-hang-theo-yeu-cau') echo 'active'; ?>" href="dat-hang-theo-yeu-cau.html">Đặt hàng theo yêu cầu</a>
    </li> -->
    <!-- <li>
        <a class="ac <?php if($_REQUEST['com'] == 'thanh-toan') echo 'active'; ?>" href="thanh-toan.html">Thanh toán</a>
    </li> -->
</ul> 
