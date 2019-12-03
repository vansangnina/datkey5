<?php
    $type= htmlspecialchars($_REQUEST['type']);
     $p = (int) $_REQUEST['p'];
     $id =(int) $_REQUEST['id'];
     $id_slider =(int) $_REQUEST['id_slider'];

     $key= htmlspecialchars($_GET['key']);
    $com= htmlspecialchars($_GET['com']);
?>
<script language="javascript" type="text/javascript">

	$(document).ready(function() {
	$("#chonhet").click(function(){
		var status=this.checked;
		$("input[name='chon']").each(function(){this.checked=status;})
	});
	
	$("#xoahet").click(function(){
		var listid="";
		$("input[name='chon']").each(function(){
			if (this.checked) listid = listid+","+this.value;
			})
		listid=listid.substr(1);	 //alert(listid);
		if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
		hoi= confirm("Bạn có chắc chắn muốn xóa?");
		if (hoi==true) document.location = "index.php?com=slider&act=delete_photo&listid="+listid+"&id_slider=<?=$id_slider?>&type=<?=$type?>";
	});
	});
	
	$(document).keydown(function(e) {
        if (e.keyCode == 13) {
			timkiem();
	   }
	});
	
	function timkiem()
	{	
		var a = $('input.key').val();
		if(a=='Tên...') a='';			
		window.location ="index.php?com=slider&act=man_photo&key="+a+"&id_slider=<?=$id_slider?>&type=<?=$type?>";	
		return true;
	}
</script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=slider&act=man_photo&type=<?=$type?>"><span>Hình ảnh</span></a></li>
        	<?php if($key!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$key?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=slider&act=add_photo&type=<?=$type?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />
        
    </div>  
</div>
<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="chonhet" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" name="key" class="key" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB" onclick="timkiem();"  value="">Tìm kiếm</button>
    </div>
  </div>

  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>       
        <?php if($type=='slidersp') { ?>
        <td width="300">Danh mục SP</td>
        <?php } ?>
        
        <td width="400">Hình ảnh</td>
        <td class="sortCol"><div>LINK<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10"><div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div></td>
      </tr>
    </tfoot>
    <tbody>
    <form name="f" id="f" method="post"  action="index.php?com=slider&act=savestt_photo<?php if($id_slider!='') echo'&id_slider='.$id_slider;?><?php if($type!='') echo'&type='.$type;?><?php if($p!='') echo'&p='.$p;?>">
    <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>
        <td align="center">
            <input data-val0="<?=$items[$i]['id']?>" data-val2="table_<?=$com?>" type="text" value="<?=$items[$i]['stt']?>" data-val3="stt" name="stt<?=$i?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" class="tipS smallText stt" onblur="stt(this)" id="upstt" original-title="Nhập số thứ tự sản phẩm" rel="<?=$items[$i]['id']?>" />
        </td> 
        
        <?php if($type=='slidersp') { ?>
         <td align="center">
			<?php
				$sql_danhmuc="select ten from table_product_danhmuc where id='".$items[$i]['id_danhmuc']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>
        <?php } ?>
        
        <td align="center">
                <img src="<?=_upload_hinhanh.$items[$i]['photo']?>" height="100" style="background:#000;" border="0" />
        </td>
      
        <td class="title_name_data">
            
			<?=$items[$i]['link']?>
        </td>
       
        <td align="center">
           <a data-val2="table_<?=$com?>" rel="<?=$items[$i]['hienthi']?>" data-val3="hienthi" class="diamondToggle <?=($items[$i]['hienthi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a> 
        </td>       
        <td class="actBtns">
            <a href="index.php?com=slider&act=edit_photo&id=<?=$items[$i]['id']?><?php if($id_slider!='') echo'&id_slider='. $id_slider;?><?php if($type!='') echo'&type='. $type;?><?php if($p!='') echo'&p='.$p;?>" title="" class="smallButton tipS" original-title="Sửa hình ảnh"><img src="./images/icons/dark/pencil.png" alt=""></a>
            <a href="index.php?com=slider&act=delete_photo&id=<?=$items[$i]['id']?><?php if($id_slider!='') echo'&id_slider='. $id_slider;?><?php if($type!='') echo'&type='. $type;?><?php if($p!='') echo'&p='.$p;?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa hình ảnh"><img src="./images/icons/dark/close.png" alt=""></a>        </td>
      </tr>
         <?php } ?>
    </form>
    </tbody>
    </table>
</div>
