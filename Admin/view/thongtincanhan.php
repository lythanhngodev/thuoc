<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
    <div class="col-md-1"></div>
		<div class="col-md-10">
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên nhân viên</label>
            <input type="text" class="form-control" id="sua-ten" placeholder="Tên nhân viên" value="<?php echo $tt['HT'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input type="text" class="form-control" id="sua-tdn" placeholder="Tên đăng nhập" value="<?php echo $tt['TDN'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input type="text" class="form-control" id="sua-sdt" placeholder="Số điện thoại" value="<?php echo $tt['SDT'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ mail</label>
            <input type="text" class="form-control" id="sua-mail" placeholder="Địa chỉ mail" value="<?php echo $tt['MAIL'] ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ liên lạc</label>
            <input type="text" class="form-control" id="sua-dc" placeholder="Địa chỉ liên lạc" value="<?php echo $tt['DC'] ?>">
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
<section class="content-header" style="text-align: center;">
    <h1 id="tieudetrang">Đổi mật khẩu</h1><br>
</section>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <label>Mật khẩu cũ</label>
            <input type="password" class="form-control" id="sua-mkc" placeholder="Mật khẩu cũ">
          </div>
          <div class="form-group">
            <label>Mật khẩu mới</label>
            <input type="password" class="form-control" id="sua-mkm" placeholder="Mật khẩu mới">
          </div>
          <div class="form-group">
            <label>Xác nhận mật khẩu mới</label>
            <input type="password" class="form-control" id="sua-mkm2" placeholder="Xác nhận mật khẩu mới">
          </div>
          <div class="form-group" style="text-align: center;">
            <hr>
            <button class="btn btn-primary" id="btn-doimatkhau">Đổi mật khẩu</button>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-1"></div>
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('thongtincanhan').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Thông tin cá nhân";

  $(document).on('click','#btn-sua',function(){
  	var ten = $('#sua-ten').val();
    var tdn = $('#sua-tdn').val();
    var sdt = $('#sua-sdt').val();
    var diachi = $('#sua-dc').val();
    var mail = $('#sua-mail').val();
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