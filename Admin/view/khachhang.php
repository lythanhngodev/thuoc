<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
		<div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <button class="btn btn-default" data-toggle="modal" data-target="#modal-them"><i class="fa fa-plus"></i> Thêm mới</button><hr>
              <table id="example1" class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 50px;">TT</th>
                  <th>Tên khách hàng</th>
                  <th>Bí danh</th>
                  <th>Điện thoại</th>
                  <th>MST</th>
                  <th>Địa chỉ</th>
                  <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt=1;
                while ($row=mysqli_fetch_assoc($khachhang)) { ?>
	                <tr>
                    <th><?php echo $stt; ?></th>
	                  <td><?php echo $row['TENKH']; ?></td>
                    <td><?php echo $row['BIETHIEU']; ?></td>
                    <td><?php echo $row['SDT']; ?></td>
                    <td><?php echo $row['MST']; ?></td>
                    <td><?php echo $row['DIACHI']; ?></td>
	                  <td ltn="<?php echo $row['IDKH'] ?>"><button class="btn btn-primary btn-sm sua">Sửa</button>&ensp;<button class="btn btn-danger btn-sm xoa">Xoá</button></td>
	                </tr>
                <?php $stt++; } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Tên khách hàng</th>
                  <th>Bí danh</th>
                  <th>Điện thoại</th>
                  <th>MST</th>
                  <th>Địa chỉ</th>
                  <th>Thao tác</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
</div>
<div class="modal fade" id="modal-them">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm khách hàng</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputEmail1">Tên khách hàng</label>
		  <input type="text" class="form-control" id="them-tenkhachhang" placeholder="Tên khách hàng">
		</div>
    <div class="form-group">
      <label for="exampleInputEmail1">Bí danh</label>
      <input type="text" class="form-control" id="them-bidanh" placeholder="Bí danh">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Điện thoại</label>
      <input type="text" class="form-control" id="them-dienthoai" placeholder="Điện thoại">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Mã số thuế</label>
      <input type="text" class="form-control" id="them-masothue" placeholder="Mã số thuế">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Địa chỉ</label>
      <input type="text" class="form-control" id="them-diachi" placeholder="Địa chỉ">
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-them">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-sua">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa khách hàng</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" class="form-control" id="sua-tenkhachhang" placeholder="Tên khách hàng">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Bí danh</label>
          <input type="text" class="form-control" id="sua-bidanh" placeholder="Bí danh">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Điện thoại</label>
          <input type="text" class="form-control" id="sua-dienthoai" placeholder="Điện thoại">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Mã số thuế</label>
          <input type="text" class="form-control" id="sua-masothue" placeholder="Mã số thuế">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Địa chỉ</label>
          <input type="text" class="form-control" id="sua-diachi" placeholder="Địa chỉ">
        </div>
      </div>
      <input type="text" hidden="hidden" id="sua-id" name="">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="btn-sua">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-xoa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Xoá đơn vị tính</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<div class="alert alert-danger alert-dismissible">
				<h4><i class="icon fa fa-ban"></i> Chú ý!</h4>
				Bạn có chắc xoá đơn vị tính này ?<br>
				Tên đơn vị tính: <span><u id="xoa-tendonvitinh"></u></span>
			</div>
		  <input type="text" id="xoa-id" hidden="hidden">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-danger" id="btn-xoa">Hoàn tất</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('khachhang').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Khách hàng";
    $('#example1').DataTable({
      'paging'      : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
	language: {
		"sProcessing": "Đang xử lý...",
		"sLengthMenu": "Xem _MENU_ mục",
		"sZeroRecords": "Không tìm thấy dòng nào phù hợp",
		"sInfo": "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
		"sInfoEmpty": "Đang xem 0 đến 0 trong tổng số 0 mục",
		"sInfoFiltered": "(được lọc từ _MAX_ mục)",
		"sInfoPostFix": "",
		"sSearch": "Tìm:",
		"sUrl": "",
		"oPaginate": {
		    "sFirst": "Đầu",
		    "sPrevious": "Trước",
		    "sNext": "Tiếp",
		    "sLast": "Cuối"
		}
	}
    });
    $(document).on('click','.sua',function(){
    	$('#sua-tenkhachhang').val($(this).parent('td').parent('tr').find('td:nth-child(2)').text().trim());
      $('#sua-bidanh').val($(this).parent('td').parent('tr').find('td:nth-child(3)').text().trim());
      $('#sua-dienthoai').val($(this).parent('td').parent('tr').find('td:nth-child(4)').text().trim());
      $('#sua-masothue').val($(this).parent('td').parent('tr').find('td:nth-child(5)').text().trim());
      $('#sua-diachi').val($(this).parent('td').parent('tr').find('td:nth-child(6)').text().trim());
    	$('#sua-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-sua').modal('show');
    });
    $(document).on('click','.xoa',function(){
    	$('#xoa-tendonvitinh').text($(this).parent('td').parent('tr').find('td:nth-child(1)').text().trim());
    	$('#xoa-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-xoa').modal('show');
    });
    $(document).on('click','#btn-them',function(){
    	var ten = $('#them-tenkhachhang').val();
    	if (!ten) {
    		tbdanger('Vui lòng điền tên khách hàng');
    		return false;
    	}
      var bidanh = $('#them-bidanh').val();
      if (!bidanh) {
        tbdanger('Vui lòng điền bí danh khách hàng');
        return false;
      }
      var dienthoai = $('#them-dienthoai').val();
      if (!dienthoai) {
        tbdanger('Vui lòng điền điện thoại khách hàng');
        return false;
      }
      var diachi = $('#them-diachi').val();
      if (!diachi) {
        tbdanger('Vui lòng điền địa chỉ khách hàng');
        return false;
      }
      var masothue = $('#them-masothue').val();
        $.ajax({
            url: 'ajax/ajThemkhachhang.php',
            type: 'POST',
            data: {
            	ten:ten,
              bidanh:bidanh,
              dienthoai:dienthoai,
              diachi:diachi,
              masothue:masothue
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-them').modal('hide');
            		tbsuccess('Đã thêm khách hàng');
            		setTimeout(function(){
				        location.reload();
				    }, 0);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
    $(document).on('click','#btn-sua',function(){
      var ten = $('#sua-tenkhachhang').val();
      if (!ten) {
        tbdanger('Vui lòng điền tên khách hàng');
        return false;
      }
      var bidanh = $('#sua-bidanh').val();
      if (!bidanh) {
        tbdanger('Vui lòng điền bí danh khách hàng');
        return false;
      }
      var dienthoai = $('#sua-dienthoai').val();
      if (!dienthoai) {
        tbdanger('Vui lòng điền điện thoại khách hàng');
        return false;
      }
      var diachi = $('#sua-diachi').val();
      if (!diachi) {
        tbdanger('Vui lòng điền địa chỉ khách hàng');
        return false;
      }
      var masothue = $('#sua-masothue').val();
        $.ajax({
            url: 'ajax/ajSuakhachhang.php',
            type: 'POST',
            data: {
              ten:ten,
              bidanh:bidanh,
              dienthoai:dienthoai,
              diachi:diachi,
              masothue:masothue,
            	idkh:$('#sua-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-sua').modal('hide');
            		tbsuccess('Đã sửa khách hàng');
            		setTimeout(function(){
				        location.reload();
				    }, 0);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
    $(document).on('click','#btn-xoa',function(){
        $.ajax({
            url: 'ajax/ajXoakhachhang.php',
            type: 'POST',
            data: {
            	id:$('#xoa-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-xoa').modal('hide');
            		tbsuccess('Đã xoá khách hàng');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger(kq.thongbao);
            	}
            }
        });
    });
</script>