<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/select2.css">
<script type="text/javascript" src="../public/bootstrap/js/select2.full.min.js"></script>
<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<div style="margin: 0 auto;">
  <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
            <div class="box box-primary">
              <!-- /.box-header -->
              <div class="box-body">
                <button class="btn btn-default" data-toggle="modal" data-target="#modal-them"><i class="fa fa-plus"></i> Thêm mới</button>&ensp;
                <button class="btn btn-default" data-toggle="modal" data-target="#modal-nhap-excel"><i class="fa fa-file-excel-o"></i> Nhập từ Excel</button><hr>
                <table id="example1" class="table table-hover table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">TT</th>
                    <th>Tên mặt hàng</th>
                    <th>Nhóm hàng</th>
                    <th>Đơn vị tính</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $stt=1;
                  while ($row=mysqli_fetch_assoc($mathang)) { ?>
                    <tr>
                      <td class="text-center"><?php echo $stt; ?></td>
                      <td><?php echo $row['TENMH']; ?></td>
                      <td ltn="<?php echo $row['IDNH'] ?>"><?php echo $row['TENNH']; ?></td>
                      <td ltn="<?php echo $row['IDDVT'] ?>"><?php echo $row['TENDVT']; ?></td>
                      <td class="text-right"><?php echo $row['GIANHAP']; ?></td>
                      <td class="text-right"><?php echo $row['GIABAN']; ?></td>
                      <td class="text-right"><?php echo $row['SOLUONG']; ?></td>
                      <td><?php echo $row['GHICHU']; ?></td>
                      <td ltn="<?php echo $row['IDMH'] ?>"><button class="btn btn-primary btn-sm sua">Sửa</button>&ensp;<button class="btn btn-danger btn-sm xoa">Xoá</button></td>
                    </tr>
                  <?php $stt++; } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th class="text-center">TT</th>
                    <th>Tên mặt hàng</th>
                    <th>Nhóm hàng</th>
                    <th>Đơn vị tính</th>
                    <th>Giá nhập</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Ghi chú</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
      <div class="col-md-1"></div>
  </div>
</div>
<div class="modal fade" id="modal-them">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm mặt hàng</h4>
      </div>
      <div class="modal-body">
    		<div class="form-group">
    		  <label for="exampleInputEmail1">Tên mặt hàng</label>
    		  <input type="text" class="form-control" id="them-tenmathang" placeholder="Tên mặt hàng">
    		</div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nhóm mặt hàng</label>
          <select class="form-control" id="them-nhommathang">
            <?php while ($row = mysqli_fetch_assoc($nhommathang)) { ?>
            <option value="<?php echo $row['IDNH'] ?>"><?php echo $row['TENNH'] ?></option>  
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đơn vị tính</label>
          <select class="form-control select2" data-live-search="true" id="them-donvitinh" style="width: 100%;">
            <?php while ($row = mysqli_fetch_assoc($donvitinh)) { ?>
            <option value="<?php echo $row['IDDVT'] ?>"><?php echo $row['TENDVT'] ?></option>  
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá nhập</label>
          <input type="text" class="form-control" id="them-gianhap" placeholder="Giá nhập">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá bán</label>
          <input type="text" class="form-control" id="them-giaban" placeholder="Giá bán">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ghi chú</label>
          <input type="text" class="form-control" id="them-ghichu" placeholder="Ghi chú">
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
        <h4 class="modal-title">Sửa mặt hàng</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên mặt hàng</label>
          <input type="text" class="form-control" id="sua-tenmathang" placeholder="Tên mặt hàng">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nhóm mặt hàng</label>
          <select class="form-control" id="sua-nhommathang">
            <?php while ($row = mysqli_fetch_assoc($nhommathang2)) { ?>
            <option value="<?php echo $row['IDNH'] ?>"><?php echo $row['TENNH'] ?></option>  
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Đơn vị tính</label>
          <select class="form-control select2" data-live-search="true" id="sua-donvitinh" style="width: 100%;">
            <?php while ($row = mysqli_fetch_assoc($donvitinh2)) { ?>
            <option value="<?php echo $row['IDDVT'] ?>"><?php echo $row['TENDVT'] ?></option>  
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá nhập</label>
          <input type="text" class="form-control" id="sua-gianhap" placeholder="Giá nhập">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Giá bán</label>
          <input type="text" class="form-control" id="sua-giaban" placeholder="Giá bán">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ghi chú</label>
          <input type="text" class="form-control" id="sua-ghichu" placeholder="Ghi chú">
        </div>
        <input type="text" id="sua-id" hidden="hidden" name="">
      </div>
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
        <h4 class="modal-title">Xoá mặt hàng</h4>
      </div>
      <div class="modal-body">
		<div class="form-group">
			<div class="alert alert-danger alert-dismissible">
				<h4><i class="icon fa fa-ban"></i> Chú ý!</h4>
				Bạn có chắc xoá mặt hàng này ?<br>
				Tên mặt hàng: <span><u id="xoa-tentang"></u></span>
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
	document.getElementById('mathang').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Mặt hàng";
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
    $('#them-donvitinh').select2({
      placeholder: '--- Chọn đơn vị tính ---',
      width: '100%'
    });
    $('#them-nhommathang').select2({
      placeholder: '--- Chọn nhóm mặt hàng ---',
      width: '100%'
    });
    $('#sua-donvitinh').select2({
      placeholder: '--- Chọn đơn vị tính ---',
      width: '100%'
    });
    $('#sua-nhommathang').select2({
      placeholder: '--- Chọn nhóm mặt hàng ---',
      width: '100%'
    });
    $(document).on('click','.sua',function(){
    	$('#sua-tenmathang').val($(this).parent('td').parent('tr').find('td:nth-child(2)').text().trim());
      $('#sua-gianhap').val($(this).parent('td').parent('tr').find('td:nth-child(5)').text().trim());
      $('#sua-giaban').val($(this).parent('td').parent('tr').find('td:nth-child(6)').text().trim());
      $('#sua-ghichu').val($(this).parent('td').parent('tr').find('td:nth-child(8)').text().trim());
    	$('#sua-nhommathang').val($(this).parent('td').parent('tr').find('td:nth-child(3)').attr('ltn')).change();
      $('#sua-donvitinh').val($(this).parent('td').parent('tr').find('td:nth-child(4)').attr('ltn')).change();
      $('#sua-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-sua').modal('show');
    });
    $(document).on('click','.xoa',function(){
    	$('#xoa-tentang').text($(this).parent('td').parent('tr').find('td:nth-child(2)').text().trim());
    	$('#xoa-id').val($(this).parent('td').attr('ltn').trim());
    	$('#modal-xoa').modal('show');
    });
    $(document).on('click','#btn-them',function(){
    	var ten = $('#them-tenmathang').val();
    	if (!ten) {
    		tbdanger('Vui lòng điền tên mặt hàng');
    		return false;
    	}
      var dvt = $('#them-donvitinh').val();
      if (!dvt) {
        tbdanger('Vui lòng chọn đơn vị tính');
        return false;
      }
        $.ajax({
            url: 'ajax/ajThemmathang.php',
            type: 'POST',
            data: {
            	mathang:ten,
              idnh:$('#them-nhommathang').val().trim(),
              dvt: dvt,
              gianhap: $('#them-gianhap').val(),
              giaban: $('#them-giaban').val(),
              ghichu: $('#them-ghichu').val().trim()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-them').modal('hide');
            		tbsuccess('Đã thêm mặt hàng');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
    $(document).on('click','#btn-sua',function(){
      var ten = $('#sua-tenmathang').val();
      if (!ten) {
        tbdanger('Vui lòng điền tên mặt hàng');
        return false;
      }
      var dvt = $('#sua-donvitinh').val();
      if (!dvt) {
        tbdanger('Vui lòng chọn đơn vị tính');
        return false;
      }
        $.ajax({
            url: 'ajax/ajSuamathang.php',
            type: 'POST',
            data: {
              idmh: $('#sua-id').val().trim(),
              mathang:ten,
              idnh:$('#sua-nhommathang').val().trim(),
              dvt: dvt,
              gianhap: $('#sua-gianhap').val(),
              giaban: $('#sua-giaban').val(),
              ghichu: $('#sua-ghichu').val().trim()
            },
            success: function (data) {
              var kq = $.parseJSON(data);
              if (kq.trangthai) {
                $('#modal-sua').modal('hide');
                tbsuccess('Đã sửa mặt hàng');
                setTimeout(function(){
                location.reload();
            }, 2000);
              }
              else{
                tbdanger('Lỗi!, Vui lòng thử lại');
              }
            }
        });
    });
    $(document).on('click','#btn-xoa',function(){
        $.ajax({
            url: 'ajax/ajXoaban.php',
            type: 'POST',
            data: {
            	id:$('#xoa-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-xoa').modal('hide');
            		tbsuccess('Đã xoá khu vực / tầng / lầu');
            		setTimeout(function(){
				        location.reload();
				    }, 2000);
            	}
            	else{
            		tbdanger('Lỗi!, Vui lòng thử lại');
            	}
            }
        });
    });
</script>