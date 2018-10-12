<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/select2.css">
<script type="text/javascript" src="../public/bootstrap/js/select2.full.min.js"></script>
<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<style type="text/css">
  .col-md-12,.col-md-4,.col-md-8,.col-md-6{
    padding-right: 5px;
    padding-left: 5px;
  }
</style>
<div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body">
          <div class="col-md-12" style="padding:0;">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Mặt hàng</label>
              <select class="form-control" id="them-mathang">
                <option value="chuachon">--- Chọn mặt hàng ---</option>
                <?php while ($row = mysqli_fetch_assoc($mathang)) { ?>
                <option value="<?php echo $row['IDMH'] ?>"><?php echo $row['TENMH']." . ".$row['SOLO']." . ".$row['HSD'] ?></option>  
                <?php } ?>
              </select>
            </div>
            <input type="text" style="display: none;" class="form-control" id="them-tenmathang">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Diễn giải</label>
              <input type="text" class="form-control" id="them-diengiai">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Số lô</label>
              <input type="text" class="form-control" id="them-solo">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">ĐVT</label>
              <input type="text" class="form-control" id="them-dvt">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Hạn sử dụng</label>
              <input type="text" class="form-control" id="them-hsd">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Số lượng</label>
              <input type="text" class="form-control" id="them-soluong">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Giá bán</label>
              <input type="text" class="form-control" id="them-dongia">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">%VAT</label>
              <input type="text" class="form-control" id="them-vat">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">%CK</label>
              <input type="text" class="form-control" id="them-ck">
            </div>
            <center><button class="btn btn-success" id="themmoi">Thêm</button></center>
          </div>
        </div>
      </div>
    </div>
		<div class="col-md-9">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <div>Nhân viên bán hàng: <b><?php echo $_SESSION['hoten']; ?></b></div>
            <hr>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Số hóa đơn</label>
              <input type="text" class="form-control" id="them-sohoadon">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Ngày lập hóa đơn</label>
              <input type="date" class="form-control" id="them-ngaylap" value="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">TG lập hóa đơn</label>
              <input type="time" class="form-control" id="them-thoigianlap" value="<?php echo date('H:i:s',time()); ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Tên KH</label>
              <input type="text" class="form-control" id="them-tenkh">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Mã số thuế</label>
              <input type="text" class="form-control" id="them-masothue">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Địa chỉ KH</label>
              <input type="text" class="form-control" id="them-diachi">
            </div>
              <table id="banghang" class="table table-bordered table-striped">
                <tr>
                  <th>MH</th>
                  <th>Diễn giải</th>
                  <th>ĐVT</th>
                  <th>Số Lô</th>
                  <th>HSD</th>
                  <th>SL</th>
                  <th>ĐG</th>
                  <th>Thành tiền</th>
                  <th style="width: 60px;">%VAT</th>
                  <th style="width: 60px;">%CK</th>
                  <th></th>
                </tr>
              </table>
              <br>
              <button class="btn btn-primary">Lưu &amp; In hóa đơn</button>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('donvitinh').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Xuất hàng - Bán hàng";
    $('#bang-nhaphang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
    });
    $('#them-mathang').select2({
      placeholder: '--- Chọn mặt hàng ---',
      width: '100%'
    });
    $(document).on('change','#them-mathang',function(){
      if($(this).val()=='chuachon'){
        $('#them-diengiai').val('');
        $('#them-solo').val('');
        $('#them-dvt').val('');
        $('#them-hsd').val('');
        $('#them-soluong').val('');
        $('#them-dongia').val('');
        $('#them-vat').val('');
        $('#them-ck').val('');
        $('#them-tenmathang').val('');
      }else{
        $.ajax({
            url: 'ajax/ajLaythongtinhang.php',
            type: 'POST',
            data: {
              idmh:$(this).val().trim()
            },
            success: function (data) {
              var kq = $.parseJSON(data);
              $('#them-diengiai').val(kq.DIENGIAI);
              $('#them-solo').val(kq.SOLO);
              $('#them-dvt').val(kq.TENDVT);
              $('#them-hsd').val(kq.HSD);
              //$('#them-soluong').val(kq.SOLUONG);
              $('#them-dongia').val(kq.GIABAN);
              $('#them-tenmathang').val(kq.TENMH);
            }
        });
      }
    });
    $(document).on('click','#themmoi',function(){
      var tr = "                <tr>\n" +
          "                  <td>"+$('#them-tenmathang').val()+"</td>\n" +
          "                  <td>"+$('#them-diengiai').val()+"</td>\n" +
          "                  <td>"+$('#them-dvt').val()+"</td>\n" +
          "                  <td>"+$('#them-solo').val()+"</td>\n" +
          "                  <td>"+$('#them-hsd').val()+"</td>\n" +
          "                  <td>"+$('#them-soluong').val()+"</td>\n" +
          "                  <td>"+$('#them-dongia').val()+"</td>\n" +
          "                  <td>"+parseFloat($('#them-soluong').val())*parseFloat($('#them-dongia').val())+"</td>\n" +
          "                  <td>"+$('#them-vat').val()+"</td>\n" +
          "                  <td>"+$('#them-ck').val()+"</td>\n" +
              "<td><button class=\"btn btn-sm btn-danger xoahang\"><i class=\"fa fa-close\"></i></button></td>\n"+
          "                </tr>";
      $('#banghang').append(tr);
    });
    $('#banghang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
    });
    $(document).on('click', '#nhaphang',function(){
      var table = $('#bang-nhaphang');
      var data = [];
      table.find('tr:not(:first)').each(function(i, row) {
        var cols = [];
        $(this).find('td:not(:last) input').each(function(i, col) {
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

    function thoigian(){
      setTimeout(function(){
        var currentdate = new Date(); 
        var datetime = (currentdate.getHours()<10?'0':'') + currentdate.getHours() + ":"  
                        + (currentdate.getMinutes()<10?'0':'') + currentdate.getMinutes() + ":" 
                        + (currentdate.getSeconds()<10?'0':'') + currentdate.getSeconds()
        $('#them-thoigianlap').val(datetime);thoigian();
      }, 1000);

    }
    thoigian();
</script>