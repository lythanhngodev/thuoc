<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!--
          <div class="col-md-3" style="padding:0;">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Số hóa đơn</label>
              <input type="text" class="form-control" id="them-sohoadon" placeholder="Số hóa đơn">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Tên đơn vị</label>
              <input type="text" class="form-control" id="them-tendonvitinh" placeholder="Tên đơn vị">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Mã số thuế</label>
              <input type="text" class="form-control" id="them-masothue" placeholder="Mã số thuế">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input type="text" class="form-control" id="them-diachi" placeholder="Địa chỉ">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Diễn giải</label>
              <input type="text" class="form-control" id="them-diengiai" placeholder="Diễn giải">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Nhân viên bán hàng</label>
              <input type="text" class="form-control" id="them-nvban" placeholder="Nhân viên bán hàng">
            </div>
          </div>-->
          <div class="col-md-12" style="padding:0;">
            <table id="bang-nhaphang" class="table">
              <tr style="background: #c1c1c1;">
                <th style="text-align: center;">Tên hàng</th>
                <th style="text-align: center;">ĐVT</th>
                <th style="text-align: center;">Số lô</th>
                <th style="text-align: center;">NSX</th>
                <th style="text-align: center;">HSD</th>
                <th style="text-align: center;">SL</th>
                <th style="text-align: center;">Đơn giá (Nhập)</th>
                <th style="text-align: center;">Đơn giá (Bán)</th>
                <th></th>
              </tr>
            </table>
            <center><button class="btn btn-sm btn-success" id="themmoi"><i class="fa fa-plus"></i></button></center>
            <hr>
            <button class="btn btn-primary" id="nhaphang">Lưu nhập hàng</button>
          </div>
        </div>
      </div>
    </div>
		<div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>TT</th>
                  <th>Tên mặt hàng</th>
                  <th>Số lô</th>
                  <th>NSX</th>
                  <th>HSD</th>
                  <th>ĐVT</th>
                  <th>Số lượng</th>
                  <th>Giá nhập</th>
                  <th>Giá bán</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt=1;
                while ($row=mysqli_fetch_assoc($mathang)) { ?>
	                <tr>
                    <th><?php echo $stt; ?></th>
	                  <td><?php echo $row['TENMH']; ?></td>
                    <td><?php echo $row['SOLO']; ?></td>
                    <td><?php echo $row['NSX']; ?></td>
                    <td><?php echo $row['HSD']; ?></td>
                    <td><?php echo $row['TENDVT']; ?></td>
                    <td><?php echo $row['SOLUONG']; ?></td>
                    <td><?php echo $row['GIANHAP']; ?></td>
                    <td><?php echo $row['GIABAN']; ?></td>
	                </tr>
                <?php $stt++; } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>TT</th>
                  <th>Tên mặt hàng</th>
                  <th>Số lô</th>
                  <th>NSX</th>
                  <th>HSD</th>
                  <th>ĐVT</th>
                  <th>Số lượng</th>
                  <th>Giá nhập</th>
                  <th>Giá bán</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
</div>
<!-- /.modal -->
<script type="text/javascript">
  <?php 
  $dvt = laydonvitinh();
  $row = null;
  while ($r=mysqli_fetch_row($dvt)) {
    $row[] = $r;
  }
  ?>
  var donvitinh = <?php echo json_encode($row); ?>;
  var optiondvt = "";
	document.getElementById('nhaphang').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Nhập hàng";
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
    $(document).ready(function(){
      donvitinh.map(function(da){
        optiondvt+="<option value='"+da[0]+"'>"+da[1]+"</option>";
      });
    });
    $(document).on('click','#themmoi',function(){
      var tr = "<tr>\n" +
          "<td><input type=\"text\" class=\"form-control\"></td>\n" +
          "<td><select class=\"form-control\">"+optiondvt+"</select></td>\n" +
          "<td><input type=\"text\" class=\"form-control\"></td>\n" +
          "<td><input type=\"date\" class=\"form-control\"></td>\n" +
          "<td><input type=\"date\" class=\"form-control\"></td>\n" +
          "<td><input type=\"number\" class=\"form-control\"></td>\n" +
          "<td><input type=\"number\" class=\"form-control\"></td>\n" +
          "<td><input type=\"number\" class=\"form-control\"></td>\n" +
          "<td><button class=\"btn btn-sm btn-danger xoahang\"><i class=\"fa fa-close\"></i></button></td>\n" +
          "</tr>";
      $('#bang-nhaphang').append(tr);
    });
    $('#bang-nhaphang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
    });

    $(document).on('click', '#nhaphang',function(){
      var table = $('#bang-nhaphang');
      var data = [];
      table.find('tr:not(:first)').each(function(i, row) {
        var cols = [];
        $(this).find('td:not(:last) input, select').each(function(i, col) {
          cols.push($(this).val());
        });
        data.push(cols);
      });
      if(jQuery.isEmptyObject(data)){
          tbdanger('Vui lòng nhập mặt hàng');
          return;
      }
      var check = 0;
      data.map(function(d){
        d.map(function(di){
          if(jQuery.isEmptyObject(di)){
              check = 1;
          }
        });
      });
      if (check==1) {
        tbdanger('Vui lòng điền đầy đủ thông tin');
        return;
      }
      $.ajax({
          url: 'ajax/ajNhaphang.php',
          type: 'POST',
          data: {
            data:data
          },
          success: function (data) {
            var kq = $.parseJSON(data);
            if (kq.trangthai) {
              tbsuccess('Đã nhập hàng thành công');
              setTimeout(function(){
              location.reload();
          }, 2000);
            }
            else{
              tbdanger('Lỗi!, Vui lòng kiểm tra lại thông tin');
            }
          }
      });
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