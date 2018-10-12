<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
    <div class="col-md-1"></div>
		<div class="col-md-10">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Tên công ty</label>
                <input type="text" class="form-control" id="sua-tencongty" placeholder="Tên công ty" value="<?php echo $mch['TENCTY'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Mã số thuế</label>
                <input type="text" class="form-control" id="sua-masothue" placeholder="Mã số thuế" value="<?php echo $mch['MST'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">STK ngân hàng</label>
                <input type="text" class="form-control" id="sua-stknganhang" placeholder="STK ngân hàng" value="<?php echo $mch['NGANHANG'] ?>">
              </div>
              <div class="form-group" style="width: 50%;float: left;padding-right: 5px;">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" class="form-control" id="sua-sodienthoai" placeholder="Số điện thoại" value="<?php echo $mch['SDT'] ?>">
              </div>
              <div class="form-group" style="width: 50%;float: left;padding-left: 5px;">
                <label for="exampleInputEmail1">Địa chỉ mail</label>
                <input type="text" class="form-control" id="sua-mail" placeholder="Địa chỉ mail" value="<?php echo $mch['MAIL'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Fax</label>
                <input type="text" class="form-control" id="sua-fax" placeholder="Fax" value="<?php echo $mch['FAX'] ?>">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ công ty</label>
                <input type="text" class="form-control" id="sua-diachi" placeholder="Địa chỉ công ty" value="<?php echo $mch['DIACHI'] ?>">
              </div>
              <div class="form-group" style="text-align: center;">
                <hr>
                <button class="btn btn-primary" id="btn-sua">Lưu</button>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
    <div class="col-md-1"></div>
</div>

<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('cauhinh').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Cấu hình hệ thống";

  $(document).on('click','#btn-sua',function(){
  	var ten = $('#sua-tencongty').val();
    var mst = $('#sua-masothue').val();
    var dcmail = $('#sua-mail').val();
    var sdt = $('#sua-sodienthoai').val();
    var diachi = $('#sua-diachi').val();
    var fax = $('#sua-fax').val();
    var stknganhang = $('#sua-stknganhang').val();
    $.ajax({
        url: 'ajax/ajSuacauhinh.php',
        type: 'POST',
        data: {
        	ten:ten,
          mst:mst,
          dcmail:dcmail,
          sdt:sdt,
          diachi:diachi,
          fax:fax,
          stk:stknganhang
        },
        success: function (data) {
        	var kq = $.parseJSON(data);
        	if (!kq.trangthai) {
        		
        		setTimeout(function(){
		        location.reload();
		    }, 2000);
        	}
        	else{
        		tbsuccess('Đã lưu thông tin');
        	}
        }
    });
  });
</script>