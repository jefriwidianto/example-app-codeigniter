<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>

  </head>

  <body class="sidebar-mini wysihtml5-supported skin-red-light">
    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      

      <!-- Container -->
      <div class="content-wrapper">
        <!-- Judul Halaman -->
        <section class="content-header">
          
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div id="divTableDataHolder">


<table>
<tr>
<td>
<img width="200" height="" src="<?= base_url()?>assets/img/logo.png"  alt=""/>
<br>
<br>
<br>
</td>
<td>
</td>

<td></td>
<td></td>
<td colspan="3" align="left"  >

</td>

</tr>
</table>
PT.Inkomaro Indoproc Solusi<br>
Ruko Gading Bukit Indah, Blok RA No.10<br>
Jl. Bukit Gading Raya, Kelapa Gading - Jakarta Utara<br>
Tlp. No 021-40079588<br>
<br>
<p><strong><h3>REPORT PAYMENT</h3></strong></p>
<table id="sum_table" border="1" >
    <thead>
        <thead>
        <tr>
         
            <th>Date Record</th>
            <th>User ID</th>
            <th>Nama Pengeluaran</th>
            <th>Kategori Pengeluaran</th>
            <th>Cost</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listbop->result() as $rows) { ?>
        <tr>
            <td valign="top" align="left"><?= $rows->cdate?></td>
            <td valign="top" align="left"><?= $rows->nm_user?></td>
            <td valign="top" align="left"><?= $rows->nm_pengeluaran?></td>
            <td valign="top" align="left"><?= $rows->nm_kategori_pembayaran?></td>
            <td class="col5" valign="top" align="left"><?= $rows->nominal?></td>
        </tr>
    <? } ?>
    <?php foreach ($listpayment->result() as $rows) { ?>
        <tr>
            <td valign="top" align="left"><?= $rows->cdate?></td>
            <td valign="top" align="left"><?= $rows->nm_user?></td>
            <td valign="top" align="left"><?= $rows->nm_cost?></td>
            <td valign="top" align="left"><?= $rows->nm_kategori_pembayaran?></td>
            <td class="col5" valign="top" align="left"><?= $rows->harga?></td>
        </tr>
    <?  } ?>
    <tr>
    <td class="total" colspan="4">Total:</td>
    <td class="total" id="myTd">Total:</td>
    <td id="test3" class="total">Total:</td>
    <td id="test4" class="total">Total:</td>
    <td id="test5" class="total">Total:</td>
    </tr>
    </tbody>
    
</table>


</div>

    
        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
      

     
    
    </div><!-- ./wrapper -->

    <?= $this->load->view('basic_js'); ?>
    <!-- Additional JS -->
    
   
<script type="text/javascript">
    var getSum = function (colNumber) {
    var sum = 0;
    var selector = '.col' + colNumber;
    
    $('#sum_table').find(selector).each(function (index, element) {
        sum += parseInt($(element).text().replace(/[^0-9]/g, ''));
    });  

    return sum;        
};

$('#sum_table').find('.total').each(function (index, element) {
//$(this).text('Total: Rp. ' + getSum(index + 1));


    console.log(getSum);

    function format1(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

var numbers = [getSum(index + 1)];

    var x = format1(numbers[length], "$");
        document.getElementById("myTd").innerHTML=x;


});

$("#test3").remove();
$("#test4").remove();
$("#test5").remove();

</script>
<script type="text/javascript">
    var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('divTableDataHolder');
        //var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type ;
        //setting the file name
        a.download = 'reportpayment.xls';
        //triggering the function
        a.click();
</script>
  </body>
</html>
