	<div class="div_content_border">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="1s">
					<div class="content mb-30">
			<?=$company_contact['noidung'] ?>
		</div>

		<form action="lien-he.html" method="post" name="frm_contact" id="frm_contact" class="pt-2">
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" id="ten_contact" name="ten_contact" value="" placeholder="Họ và tên*">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
						<input class="form-control" type="email" id="email_contact" name="email_contact" value="" placeholder="Email*">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" id="dienthoai_contact" name="dienthoai_contact" value="" placeholder="Điện thoại*">
					</div>
				</div>
				<div class="col-12 col-md-6">
					<div class="form-group">
						<input class="form-control" type="text" id="diachi_contact" name="diachi_contact" value="" placeholder="Địa chỉ*">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6"></div>
				<div class="col-12 col-md-6"></div>
			<div class="form-group">
            	<label for="inputEmail3" class="col-sm-2 control-label"><?=_tinhthanhpho?><span>*</span></label>
                <div class="col-sm-10">
                <div class="w51">
                <select name="thanhpho" id="thanhpho" class="sl form-control">
                	<option value=""><?=_tinhthanhpho?></option>
                    <?php foreach($thanhpho as $k){ ?>
                    	<option value="<?=$k['id']?>"><?=$k['ten']?></option>
                    <?php }?>
                </select>
                </div>
                 <div class="w51 margin">
                <select name="quan" id="quan" class="sl form-control">
                	<option value=""><?=_quanhuyen?></option> 
                </select>
                </div>
                </div>
            </div>
			<div class="form-group">
				<textarea name="noidung_contact" id="noidung_contact" rows="3" class="form-control" placeholder="<?=_noidung?>*" ></textarea>
			</div>
			<div class="form-group">
				<input class="mybtn btn-do" type="submit" name="submit_contact" value="<?=_guilienhe?>" onclick="return sb_contact()" /> 
			</div>
		</form>
		</div>
		
	<div class="col-12 col-md-6 wow fadeInUp" data-wow-duration="1s">
		<div class="x_map mt-30"><?=$company['link_googlemap']?></div>
		</div>
	
	</div>
	</div>
	</div>
<div class="mb-30"></div>
 