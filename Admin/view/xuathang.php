<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/select2.css">
<script type="text/javascript" src="../public/bootstrap/js/select2.full.min.js"></script>
<link rel="stylesheet" type="text/css" href="../public/css/jquery-ui.min.css">
<script type="text/javascript" src="../public/js/jquery-ui.min.js"></script>
<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../public/js/polyfiller.js"></script>
<script src="../public/js/jquery-migrate-3.0.0.min.js"></script>

<style type="text/css">
  .col-md-12,.col-md-4,.col-md-8,.col-md-6{
    padding-right: 5px;
    padding-left: 5px;
  }
  .box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 5px;
}
</style>
<div class="row">
    <div class="col-md-3">
      <div class="box box-primary">
        <div class="box-body">
          <div class="col-md-12" style="padding:0;">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Mặt hàng</label>
              <input type="text" class="form-control" id="them-mathang">
              <input type="text" id="idmathang" hidden="hidden">
            </div>
            <input type="text" style="display: none;" class="form-control" id="them-tenmathang">
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Diễn giải</label>
              <input type="text" class="form-control" id="them-diengiai">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Số lô</label>
              <input type="text" class="form-control" id="them-solo" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">ĐVT</label>
              <input type="text" class="form-control" id="them-dvt" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Hạn sử dụng</label>
              <input type="text" class="form-control datepicker" id="them-hsd">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Số lượng (<span id="slcon">0</span>)</label>
              <input type="number" class="form-control" id="them-soluong" value="0">
            </div>
            <div class="form-group col-md-12">
              <label for="exampleInputEmail1">Giá bán</label>
              <input type="number" class="form-control" id="them-dongia" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">%VAT</label>
              <input type="number" class="form-control" id="them-vat" value="0" min="1" >
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">%CK</label>
              <input type="number" class="form-control" id="them-ck" value="0" min="1" >
            </div>
            <div class="col-md-12"><hr></div>
            <center><button class="btn btn-success" id="themmoi"><i class="fa fa-arrow-right" aria-hidden="true"></i></button></center>
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
            <?php $sohoadon = layidhd(); ?>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Số hóa đơn</label>
              <input type="text" class="form-control" id="them-sohoadon" value="HĐ<?php echo date('my')."-".$sohoadon; ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Ngày lập hóa đơn</label>
              <input type="date" class="form-control" id="them-ngaylap" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" >
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">TG lập hóa đơn</label>
              <input type="time" class="form-control" id="them-thoigianlap" value="<?php echo date('H:i:s',time()); ?>" readonly="readonly" >
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Tên KH (*)</label>
              <input type="text" class="form-control" id="them-tenkh">
              <input type="text" hidden="hidden" id="idkh" name="">
            </div>
            <input type="text" hidden="hidden" value="" id="them-idkh" name="">
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Mã số thuế</label>
              <input type="text" class="form-control" id="them-masothue">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" id="them-sdt">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Bí danh KH</label>
              <input type="text" class="form-control" id="them-bidanh">
            </div>
            <div class="form-group col-md-8">
              <label for="exampleInputEmail1">Địa chỉ KH (*)</label>
              <input type="text" class="form-control" id="them-diachi">
            </div>
            <div class="form-group col-md-4">
              <label for="exampleInputEmail1">Tiền khách trả</label>
              <input type="number" class="form-control" id="them-tienkhachtra" value="0" min="0">
            </div>
            <div class="form-group col-md-8">
              <label for="exampleInputEmail1">Ghi chú</label>
              <input type="text" class="form-control" id="them-ghichu">
            </div>
              <table id="banghang" class="table table-bordered table-striped">
                <tr>
                  <th hidden="hidden">IDMH</th>
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
              <div class="col-md-7"></div>
              <div class="col-md-5" style="font-size: 90%;border: 1px dotted #CA6938;background: #fff599;">
                <br>
                <p><i>Số tiền chiếc khấu:</i> <span id="tienchieckhau" style="float: right;font-weight: bold;color: red;">0</span></p>
                <p><i>Cộng tiền hàng (Đã trừ CK):</i> <span id="tienhangtruck" style="float: right;font-weight: bold;color: red;">0</span></p>
                <p><i>Tiền thuế GTGT:</i> <span id="tienthue" style="float: right;font-weight: bold;color: red;">0</span></p>
                <p><i>Tổng tiền thanh toán:</i> <span id="tongtien" style="float: right;font-weight: bold;color: red;">0</span></p>
              </div>
              <br>

              <button class="btn btn-primary" id="xuathang"><i class="fa fa-check" aria-hidden="true"></i> Bán hàng</button>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
    <div class="col-md-12" style="padding: 15px;">
          <div class="box box-primary">
            <div class="box-body">
              <table id="bangxuathang" class="table table-bordered table-striped">
                <thead>
                <tr style="text-align: center !important;">
                  <th>TT</th>
                  <th>Số HĐ</th>
                  <th>Người bán</th>
                  <th>Khách hàng</th>
                  <th>Thời gian bán</th>
                  <th>Tổng tiền</th>
                  <th>Tiền đưa</th>
                  <th>Còn lại</th>
                  <th>Ghi chú</th>
                  <th>#</th>
                </tr>
                </thead>
                <tbody>
                <?php $stt=1;
                $xuathang = xuathang();
                while ($row=mysqli_fetch_assoc($xuathang)) { ?>
                  <tr>
                    <th><?php echo $stt; ?></th>
                    <td><?php echo $row['SOHOADON']; ?></td>
                    <td><?php echo $row['HT']; ?></td>
                    <td><?php echo $row['TENKH']; ?></td>
                    <td><?php echo $row['NGAY']." ".$row['TGBAN']; ?></td>
                    <td class="sotien text-right"><?php echo number_format($row['TONGTIEN'],0); ?></td>
                    <td class="sotien text-right"><?php echo number_format($row['TIENDUA'],0); ?></td>
                    <td class="sotien text-right"><?php echo number_format(floatval($row['TONGTIEN'])-floatval($row['TIENDUA']),0); ?></td>
                    <td><?php echo $row['GHICHU']; ?></td>
                    <td><a href="ajax/ajInhoadon.php?so=<?php echo $row['IDHD'] ?>" target="_blanksd" class="btn btn-primary btn-ms"><i class="fa fa-print"></i></a></td>
                  </tr>
                <?php $stt++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
</div>
<!-- /.modal -->
<script type="text/javascript">
	document.getElementById('xuathang').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Xuất hàng - Bán hàng";
$(document).ready(function(){
 $( function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
  } );
  function lammoi(){
      $('#idmathang').val('');
      $('#them-diengiai').val('');
      $('#them-solo').val('');
      $('#them-dvt').val('');
      $('#them-hsd').val('');
      $('#them-soluong').val('0');
      $('#them-dongia').val('');
      $('#them-vat').val('0');
      $('#them-ck').val('0');
      $('#them-tenmathang').val('');
      $('#slcon').text('0');
  }
  $( "#them-tenkh" ).autocomplete({
      source: function( request, response ) {
          $.ajax({
              dataType: "json",
              type : 'POST',
              url: 'ajax/ajMathang.php',
              data: {ten:$('#them-tenkh').val()},
              success: function(data) {
                  $('#them-tenkh').removeClass('ui-autocomplete-loading');  
                  response( $.map( data, function(item) {
                    return {
                        label: item.IDKH + ' - ' + item.TENKH,
                        value: item.IDKH
                    }
                  }));
              },
              error: function(data) {
                  $('#them-tenkh').removeClass('ui-autocomplete-loading');  
              }
          });
      },
      minLength: 3,
      select: function (event, ui) {
          $('#idkh').val(ui.item.value);
          $('#them-tenkh').val(ui.item.label);
          var idkh = $('#idkh').val();
          $.ajax({
              url: 'ajax/ajLaythongtinkhachhang.php',
              type: 'POST',
              data: {
                idkh:idkh.trim()
              },
              success: function (data) {
                var kq = $.parseJSON(data);
                $('#them-masothue').val(kq.MST);
                $('#them-sdt').val(kq.SDT);
                $('#them-bidanh').val(kq.BIETHIEU);
                $('#them-diachi').val(kq.DIACHI);
                $('#them-idkh').val(kq.IDKH);
              }
          });
          return false;
      },
  });
  $(document).on('keyup','#them-mathang',function(){
    lammoi();
  });
  $( "#them-mathang" ).autocomplete({
      source: function( request, response ) {
          $.ajax({
              dataType: "json",
              type : 'POST',
              url: 'ajax/ajChiTietMathang.php',
              data: {ten:$('#them-mathang').val()},
              success: function(data) {
                  if(jQuery.isEmptyObject(data)){
                    lammoi();
                  }
                  $('#them-mathang').removeClass('ui-autocomplete-loading');  
                  response( $.map( data, function(item) {
                    return {
                        label: item.IDMH + ' - ' + item.TENMH,
                        value: item.IDMH
                    }
                  }));
              },
              error: function(data) {
                  $('#them-mathang').removeClass('ui-autocomplete-loading');  
              }
          });
      },
      minLength: 1,
      select: function (event, ui) {
          $('#idmathang').val(ui.item.value);
          $('#them-mathang').val(ui.item.label);
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
                  //$('#them-hsd').val(kq.HSD);
                  $('#them-dongia').val(kq.GIABAN);
                  $('#them-tenmathang').val(kq.TENMH);
                  $('#slcon').text(kq.SOLUONG);
                }
            });
          return false;
      },
  });
});
    $('#bangxuathang').DataTable({
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
    $('#bang-nhaphang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
    });

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');

    $(document).on('click','#themmoi',function(){
      var lston = $('#slcon').text();
      slton = parseInt(lston);
      var lsban = $('#them-soluong').val();
      lsban = parseInt(lsban);
      if (slton-lsban<0) {
        tbdanger('Số lượng xuất không hợp lệ hiện kho chỉ còn '+lston);
        return;
      }
      var tr = "                <tr>\n" +
          "                  <td hidden='hidden'>"+$('#idmathang').val()+"</td>\n" +
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
      loadlai();
    });
    $('#banghang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
      loadlai();
    });
    $(document).on('click','#xuathang',function(){
      var tenkh = $('#them-tenkh').val().trim();
      var idkh = $('#idkh').val().trim();
      var bidanh = $('#them-bidanh').val().trim();
      var diachi = $('#them-diachi').val().trim();
      var mst = $('#them-masothue').val().trim();
      var sdt = $('#them-sdt').val().trim();
      var tienkhach = $('#them-tienkhachtra').val().trim();
      if (tenkh=='' || diachi=='') {
        tbdanger('Vui lòng điền đầy đủ thông tin khách hàng');
        return;
      }
      var table = $('#banghang');
      var data = [];
      table.find('tr:not(:first)').each(function(i, row) {
        var cols = [];
        $(this).find('td:not(:last)').each(function(i, col) {
          cols.push($(this).text());
        });
        data.push(cols);
      });
      if(jQuery.isEmptyObject(data)){
          tbdanger('Chưa có mặt hàng nào được chọn, vui lòng chọn mặt hàng');
          return;
      }
      $.ajax({
          url: 'ajax/ajXuathang.php',
          type: 'POST',
          data: {
            data:data,
            idkh:idkh,
            tienkhach:tienkhach,
            shd:$('#them-sohoadon').val(),
            token: '<?php echo $_SESSION['_token']; ?>'
          },
          success: function (data) {
            var kq = $.parseJSON(data);
            if (kq.trangthai) {
              tbsuccess('Đã xuất hàng thành công');
              setTimeout(function(){
              location.reload();
          }, 0);
            }
            else{
              tbdanger(kq.thongbao);
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

  function printData()
  {
     var divToPrint=document.getElementById("noidungin");
     newWin= window.open("");
     newWin.document.write(divToPrint.outerHTML);
     newWin.print();
     newWin.close();
  }

function dauphay(number){
  return (number).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}
function loadlai(){
      // tiền hàng trừ chiếc khấu
      $('#tienchieckhau').text('0');
      // Cộng tiền hàng (Đã trừ CK)
      $('#tienhangtruck').text('0');
      // Tiền thuế GTGT
      $('#tienthue').text('0');
      // Tổng tiền thanh toán
      $('#tongtien').text('0');
      var table = $('#banghang');
      var data = [];
      table.find('tr:not(:first)').each(function(i, row) {
        var cols = [];
        $(this).find('td:not(:last)').each(function(i, col) {
          cols.push($(this).text());
        });
        data.push(cols);
      });
      if(jQuery.isEmptyObject(data)){
          return 0;
      }
      // tổng tiền
      var tientong = 0;
      data.map(function(d){
        tientong+=d[6]*d[7]; 
      });
      // tính tiền chiếc khấu
      var chieckhau = 0;
      data.map(function(d){
        chieckhau+=(d[6]*d[7])*(d[10]/100); 
      });
      // tính tiền VAT
      var vat = 0;
      data.map(function(d){
        vat+=(d[6]*d[7])*(d[9]/100); 
      });
      // tiền hàng trừ chiếc khấu
      $('#tienchieckhau').text(dauphay(chieckhau));
      // Cộng tiền hàng (Đã trừ CK)
      $('#tienhangtruck').text(dauphay(tientong-chieckhau));
      // Tiền thuế GTGT
      $('#tienthue').text(dauphay(vat));
      // Tổng tiền thanh toán
      $('#tongtien').text(dauphay(tientong-chieckhau-vat));
}
</script>