<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
		<div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Loại thống kê</label>
                <select class="form-control" id="loaithongke">
                  <option value="nhaphang">Nhập hàng</option>
                  <option value="banhang">Bán hàng</option>
                  <option value="doanhso">Doanh số</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Từ ngày</label>
                <input type="date" class="form-control" id="tungay">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Đến ngày</label>
                <input type="date" class="form-control" id="denngay">
              </div>
              <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Xem thống kê</label><br>
                <input type="button" value="Xem thống kê" class="btn btn-primary">
              </div>
              <div id="khungnoidung">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Tên đơn vị tính</th>
                    <th>Thao tác</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Tên đơn vị tính</th>
                    <th>Thao tác</th>
                  </tr>
                  </tfoot>
                </table>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
		</div>
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('thongke').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Thống kê";
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
    $(document).on('click','#btn-them',function(){
    	var ten = $('#them-tendonvitinh').val();
    	if (!ten) {
    		tbdanger('Vui lòng điền tên nhóm');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajThemdonvitinh.php',
            type: 'POST',
            data: {
            	ten:ten
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-them').modal('hide');
            		tbsuccess('Đã thêm đơn vị tính');
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
    	var ten = $('#sua-tendonvitinh').val();
    	if (!ten) {
    		tbdanger('Vui lòng điền tên đơn vị tính');
    		return false;
    	}
        $.ajax({
            url: 'ajax/ajSuadonvitinh.php',
            type: 'POST',
            data: {
            	ten:ten,
            	iddvt:$('#sua-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-sua').modal('hide');
            		tbsuccess('Đã sửa đơn vị tính');
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
            url: 'ajax/ajXoanhommathang.php',
            type: 'POST',
            data: {
            	id:$('#xoa-id').val()
            },
            success: function (data) {
            	var kq = $.parseJSON(data);
            	if (kq.trangthai) {
            		$('#modal-xoa').modal('hide');
            		tbsuccess('Đã xoá nhóm mặt hàng');
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