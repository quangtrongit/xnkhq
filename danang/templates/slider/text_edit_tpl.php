<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li><a href="index.php?com=slider&act=man_text<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Hình ảnh</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Sửa hình ảnh</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=slider&act=save_text&id=<?=$_REQUEST['id'];?><?php if($_REQUEST['id_slider']!='') echo'&id_slider='. $_REQUEST['id_slider'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Sửa hình ảnh</h6>
		</div>		
        
        <ul class="tabs">
           
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           <?php foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
           <?php } ?>


       </ul>
       
       
       <div id="info" class="tab_content"> 
			
        	        
        <div class="formRow <?=(!$config_s['link'])?'none':''?>">
            <label>Link liên kết: </label>
            <div class="formRight">
                <input type="text" id="price" name="link" value="<?=@$item['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>              
         
        <div class="formRow <?=(!$config_s['download'])?'none':''?>">
            <label>Upload File tài liệu:</label>
            <div class="formRight">
              <input type="file" id="file" name="file" />
              <img src="./images/question-button.png" alt="Upload file" class="icon_question tipS" original-title="Tải file (ảnh doc|xls|ppt|pdf|rar|win|zip|docx|pptx|xlsx|DOC|XLS|PPT|PDF|RAR|WIN|ZIP|DOCX|PPTX|XLSX)">
              <div class="note">  
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=_format_duoitailieu?>  
               </div>
            </div>
            <div class="clear"></div>
           </div>  
                
          <div class="formRow <?=(!$config_s['download'])?'none':''?>">           
            <label>File tài liệu: hiện tại: </label>      
            <div class="formRight">          
            <a href="<?=_upload_files.$item['photo']?>"><?=$item['photo']?></a>
            </div>
            
            <div class="clear"></div>
          </div>  
       
       <?php if($_REQUEST['type']=='letruot') { ?> 
        <div class="formRow">           
            <label>Vị trí: </label>      
            <div class="formRight">          
                <select id="vitri" name="vitri" class="main_select">
                	<option value="left" <?php if($item['vitri']=='left') echo 'selected="selected"' ?>>Bên trái</option>			
                	<option value="right" <?php if($item['vitri']=='right') echo 'selected="selected"' ?>>Bên phải</option>	
                </select>
            <br /> 
            </div>
            
            <div class="clear"></div>
		</div>
        <?php } ?>
        
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">           
            <input type="checkbox" name="hienthi" id="check1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />

            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
        
        </div>
       
       <!-- End info -->
       
       <?php foreach ($config['lang'] as $key => $value) {
        ?>
        
        <div id="content_lang_<?=$key?>" class="tab_content">     
        
        	<div class="formRow">   
            <label>Tên</label>
            <div class="formRight">
                <input type="text" name="ten<?=$key?>" title="Nhập tên hình ảnh ( <?=$key?> )" id="ten<?=$key?>" class="tipS validate[required]" value="<?=@$item['ten'.$key]?>" />
            </div>
            <div class="clear"></div>
            </div>
            <div class="formRow <?=(!$config_s['mota'])?'none':''?>">   
            <label>Mô tả</label> 
                <div class="formRight">
                    <textarea rows="8" type="text" name="mota<?=$key?>" title="Nhập tên hình ảnh ( <?=$key?> )" id="mota<?=$key?>" class="tipS validate[required]" value="" /><?=@$item['mota'.$key]?></textarea>
                </div>
                <div class="clear"></div>
            </div>
        </div><!-- End content <?=$key?> -->
        
        <?php } ?>

			
	<div class="formRow">
			<div class="formRight">
            <input type="hidden" name="type" id="type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>     
		
	</div>
   
</form>   
