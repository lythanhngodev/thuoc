<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/select2.css">
<script type="text/javascript" src="../public/bootstrap/js/select2.full.min.js"></script>
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
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {
    position: absolute;
    border: 1px solid #d4d4d4;
    border-bottom: none;
    border-top: none;
    z-index: 99;
    top: 100%;
    left: 0;
    right: 0;
    max-height: 200px !important;
    overflow: -webkit-paged-y;
    background: #ececec;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
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
              <input type="text" class="form-control" id="them-solo" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">ĐVT</label>
              <input type="text" class="form-control" id="them-dvt" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
              <label for="exampleInputEmail1">Hạn sử dụng</label>
              <input type="text" class="form-control" id="them-hsd" readonly="readonly">
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

              <button class="btn btn-primary" id="xuathang"><i class="fa fa-check" aria-hidden="true"></i> Bán hàng &amp; In hóa đơn</button>
            </div>
            <!-- /.box-body -->
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
                  <th>HSD</th>
                  <th>ĐVT</th>
                  <th>Số lượng</th>
                </tr>
                </thead><!--
                <tbody>
                <?php $stt=1;
                while ($row=mysqli_fetch_assoc($xuathang)) { ?>
                  <tr>
                    <th><?php echo $stt; ?></th>
                    <td><?php echo $row['TENMH']; ?></td>
                    <td><?php echo $row['SOLO']; ?></td>
                    <td><?php echo $row['HSD']; ?></td>
                    <td><?php echo $row['TENDVT']; ?></td>
                    <td><?php echo $row['SOLUONG']; ?></td>
                  </tr>
                <?php $stt++; } ?>
                </tbody>-->
                <tfoot>
                <tr>
                  <th>TT</th>
                  <th>Tên mặt hàng</th>
                  <th>Số lô</th>
                  <th>HSD</th>
                  <th>ĐVT</th>
                  <th>Số lượng</th>
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
	document.getElementById('donvitinh').classList.add("active");
	document.getElementById('tieudetrang').innerHTML = "Xuất hàng - Bán hàng";
    $('#bang-nhaphang').on('click','.xoahang',function(){
      $(this).parents('tr').remove();
    });
    $('#them-mathang').select2({
      placeholder: '--- Chọn mặt hàng ---',
      width: '100%'
    });

    webshims.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'number'
    });
    webshims.polyfill('forms forms-ext');

    $(document).on('change','#them-mathang',function(){
      if($(this).val()=='chuachon'){
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
              $('#them-dongia').val(kq.GIABAN);
              $('#them-tenmathang').val(kq.TENMH);
              $('#slcon').text(kq.SOLUONG);
            }
        });
      }
    });
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
          "                  <td hidden='hidden'>"+$('#them-mathang').val()+"</td>\n" +
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
      var idkh = $('#them-idkh').val().trim();
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
            shd:$('#them-sohoadon').val()
          },
          success: function (data) {
            var kq = $.parseJSON(data);
            if (kq.trangthai) {
              tbsuccess('Đã xuất hàng thành công');
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
function autocomplete(inp, arr) {
  if (jQuery.isEmptyObject(arr)) {
    return;
  }
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
$(document).on('keydown','#them-tenkh', function(){
  var ten = $(this).val();
  var mathangajax;
        $.ajax({
            url: 'ajax/ajMathang.php',
            type: 'POST',
            data: {
              ten:ten
            },
            success: function (data) {
              $('body').append(data);
            }
        });
});
$(document).on('click','#them-tenkhautocomplete-list div', function(){
  var ten = $('#them-tenkh').val();
  var idkh = (ten.substr(ten.lastIndexOf(': ')+2,ten.length-(ten.lastIndexOf(': '))));
  if (idkh=='') {return;}
  $('#them-idkh').val('0');
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
});
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