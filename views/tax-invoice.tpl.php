<style type="text/css">
    
    /*body{
        background-color: #ffffff !important;
    }*/
    .rubber {
      box-shadow: 0 0 0 3px blue, 0 0 0 2px blue inset;  
      border: 2px solid transparent;
      border-radius: 4px;
      display: inline-block;
      padding: 5px 2px;
      line-height: 22px;
      color: blue;
      font-size: 24px;
      font-family: 'Black Ops One', cursive;
      text-transform: uppercase;
      text-align: center;
      opacity: 0.4;
      width: 250px;
      transform: rotate(-5deg);
      height: 100px;
    }
    .cheque,.bank{
        display: none;
        padding: 20px;
        box-sizing: border-box;
        border-radius: 10px;

        -webkit-box-shadow: 0px 0px 49px 15px rgba(0,0,0,0.2);
        -moz-box-shadow: 0px 0px 49px 15px rgba(0,0,0,0.2);
        box-shadow: 0px 0px 49px 15px rgba(0,0,0,0.2);
    }
    @media print { 
        /* All your print styles go here */
        body{
            background-color: #ffffff !important;
        }
    }
</style>


<link href='https://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>


<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?=CS_COMPANY?></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- Logo & title -->
                <div class="clearfix">
                    <div class="float-left">
                        <div class="auth-logo">
                            <div class="logo logo-dark">
                                <span class="logo-lg">
                                    <img src="<?=CS_LOGO?>" alt="" height="75">
                                </span>
                            </div>
        
                            <div class="logo logo-light">
                                <span class="logo-lg">
                                    <img src="<?=CS_WHITE_LOGO?>" alt="" height="75">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="col-sm-12 text-right">
                            <!-- <h6>Invoice From</h6> -->
                            <address>
                                <h5 class="text-muted" ><?=$companyDetails['name']?></h5>
                                <abbr title="P.O.Box">Address: </abbr><?=$companyDetails['address']?><br>
                                <abbr title="TIN Number">TIN: </abbr><?=$companyDetails['tin']?><br>
                                <!-- San Francisco, CA 94107<br> -->
                                <abbr title="Phone">P: </abbr> <?=$companyDetails['mobile']?><br>
                                <abbr title="Email">E: </abbr> <?=$companyDetails['email']?><br>
                                <!-- <abbr title="Website">W: </abbr> <?=$companyDetails['website']?> -->
                            </address>
                        </div> <!-- end col -->
                    </div>
                    <!-- <div class="float-right">
                        <h2 class="m-0 d-print-none">Commercial Invoice</h2>
                    </div> -->
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12" style="background-color: <?=CS_THEME?>!important; border-bottom: solid 1px <?=CS_THEME?>; border-top: solid 1px <?=CS_THEME?>;">
                        <div class="mt-1">
                            <h2 class="text-white text-center" style="font-weight: 900; text-transform: uppercase;">Commercial INVOICE</h2>
                        </div>
                    </div><!-- end col -->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-3">
                            <p class="text-capitalize">Hello,<b> <?=$clientDetails['name']?></b></p>
                            <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                promises to provide high quality products for you as well as outstanding
                                customer service for every transaction. </p>
                        </div>

                    </div><!-- end col -->
                    <div class="col-md-4 offset-md-2">
                        <div class="mt-3 float-right">
                            <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp;<?=$orderData[0]['issue_date']?></span></p>
                            <p class="m-b-10"><strong>Order Status : </strong> <span class="float-right"><span class="badge <?=$badge?>"><?=$pamentstatus?></span></span></p>
                            <p class="m-b-10"><strong>Order No. : </strong> <span class="float-right">#<?=$orderData[0]['orderno']?> </span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row mt-3">
                    <div class="col-sm-6">
                        <h6>Invoice To</h6>
                        <address>
                            <h5 class="text-muted text-capitalize"><?=$clientDetails['name']?></h5>
                            <abbr title="P.O.Box">Address: </abbr><?=$clientDetails['address']?><br>
                            <abbr title="TIN Number">TIN: </abbr><?=$clientDetails['tin_no']?><br>
                            <!-- San Francisco, CA 94107<br> -->
                            <abbr title="Phone">P: </abbr> <?=$clientDetails['phone']?>
                        </address>
                    </div> <!-- end col -->

                    
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead style="color: #fff;">
                                <tr style="background-color: <?=CS_THEME?>!important;"><th>#</th>
                                    <th>Description</th>
                                    <th style="width: 10%">Qty</th>
                                    <!-- <th style="width: 10%">Hours Rate</th> -->
                                    <th style="width: 10%" class="text-right">Amount</th>
                                </tr></thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <b><?=$orderData[0]['brandName']?>&nbsp;<?=$orderData[0]['makeName']?>&nbsp;<?=$orderData[0]['caryear']?></b> <br/>
                                        For the Purchace of a used <b><?=$orderData[0]['brandName']?>&nbsp;<?=$orderData[0]['makeName']?>&nbsp;<?=$orderData[0]['caryear']?></b>. 
                                        Chasis No. <b><?=$orderData[0]['chassis']?></b>. 
                                        Colour <b><?=$orderData[0]['colour']?></b>. 
                                        Milage <b><?=$orderData[0]['milage']?> Km</b>. 
                                        Engine Size <b><?=$orderData[0]['eginesize']?> cc</b>.
                                        <!-- Chasis No<b><?=$orderData[0]['chassis']?></b> -->
                                    </td>
                                    <td>1</td>
                                    <td class="text-right">
                                        <?
                                            $GrandTotal = 0;
                                            foreach ($orderCosts as $key => $cost) {
                                                $GrandTotal = $GrandTotal + $cost['Totalamount'];
                                            }
                                        ?>

                                    <?=number_format($GrandTotal)?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                        
                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix pt-5">

                            <!-- <div class="row">
                                <div class="clearfix">
                                    <div class="text-center col-sm-12">
                                        <b><p>"<?=numberTowords($GrandTotal)?>"</p></b>
                                    </div>
                                </div>
                            </div> -->


                            <h6 class="text-muted">Notes:</h6>

                            <small class="text-muted">
                                All accounts are to be paid within 50 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 50 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                                <br>
                                <!-- <hr> -->
                                <span class="text-sisi"><b>CRDB: </b> OAJ45-5685-65269-924</span><br>
                                <span class="text-sisi"><b>NMB: </b> OAJ45-65269-924-5685</span><br>
                                <span class="text-sisi"><b>DTB: </b> O65269-AJ45-5685-924</span>
                            </small>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="float-right">
                            <p><b>Sub-total:</b> <span class="float-right">Tzs <?=number_format($GrandTotal)?> /=</span></p>

                            <!-- <p><b>Discount (0%):</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; Tzs 0</span></p> -->
                            <!-- <input type="text" class="numbetowords" name="" value="<?=$GrandTotal?>"> -->
                            <h3 style="border-bottom: 1px solid #333; border-top: 1px solid #333; padding: 5px;" class="bg-sisi text-white">Tzs <?=number_format($GrandTotal)?> /=</h3>

                        </div>
                        <div class="clearfix"></div>

                        <div class="text-center col-sm-12">
                            <b><p>"<?=numberTowords($GrandTotal)?> ONLY"</p></b>
                        </div>

                    </div> <!-- end col -->
                </div>

                
                <!-- end row -->

                
                <div class="row">

                    <div class="col-sm-6">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Issued By: <u><?=$orderData[0]['createdBy']?></u></h6>

                            <small class="text-muted">
                                Signature___________________________
                            </small><br><br>
                            <small class="text-muted">
                                Stamp
                            </small><br>
                        </div>
                    </div> <!-- end col -->
                    <!-- <div class="rubber">
                    Smart Intergrated Solutions International

                    </div> -->
                    
                </div>
                <!-- end row -->

                <div class="mt-4 mb-1">
                    <div class="text-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                        <?
                            if ($GrandTotal > $totalpaid) {?>
                                <a href="#" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#signup-modal"><i class="mdi mdi-cash mr-1"></i> Payment</a>
                            <?}
                        ?>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row --> 
    
</div> <!-- container-->











<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <!-- <a href="" class="text-success">
                        <span><img src="<?=CS_LOGO?>" alt="" height="50"></span>
                    </a> -->


                    <div class="auth-logo">
                        <div class="logo logo-dark">
                            <span class="logo-lg">
                                <img src="<?=CS_LOGO?>" alt="" height="50">
                            </span>
                        </div>
    
                        <div class="logo logo-light">
                            <span class="logo-lg">
                                <img src="<?=CS_WHITE_LOGO?>" alt="" height="50">
                            </span>
                        </div>
                    </div>

                </div>

                <form class="px-3" action="<?=url('orders','savepayment')?>" method="POST">

                    <div class="form-group">
                        <label for="username">Payment Type</label>
                        <select class="form-control" name="payment[payment_type]" onchange="paymentmethods(this);">
                            <option selected disabled="">Select Payment Type</option>
                            <?
                                foreach ($paymentmethods as $key => $P) {?>
                                    <option value="<?=$P['id']?>"><?=$P['name']?></option>
                                <?}
                            ?>
                        </select>
                    </div>

                    <div class="cheque">
                        <div class="form-group">
                            <label for="bankname">Bank Name</label>
                            <input class="form-control" type="text" id="bankname" name="payment[cbankname]" placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <label for="chequeno">Cheque No.</label>
                            <input class="form-control" type="text" id="chequeno" name="payment[chequeno]" placeholder="Cheque No.">
                        </div>
                    </div>

                    <div class="bank">
                        <div class="form-group">
                            <label for="bankname2">Bank Name</label>
                            <input class="form-control" type="text" id="bankname2" name="payment[bankname]" placeholder="Bank Name">
                        </div>
                        <div class="form-group">
                            <label for="bankreference">Referance No.</label>
                            <input class="form-control" type="text" id="bankreference" name="payment[bankreference]" placeholder="Referance No.">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="paid_totalmount">Ammount</label>
                        <input class="form-control" type="number" id="paid_totalmount" name="payment[paid_totalmount]" placeholder="Amount Recieved">
                        <input type="hidden" name="payment[orderid]" value="<?=$_GET['id']?>">
                    </div>

                    <div class="form-group">
                        <label for="paidby">Paid By</label>
                        <input class="form-control" type="text" id="paidby" name="" placeholder="Paid By" value="<?=$clientDetails['name']?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="recievedby">Recieved By</label>
                        <input class="form-control" type="text" id="recievedby" placeholder="Enter your password" readonly="" value="<?=$_SESSION['member']['name']?>">
                        <input class="form-control" type="hidden" name="payment[recievedby]" id="recievedby2" placeholder="Enter your password" readonly="" value="<?=$_SESSION['member']['id']?>">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                        </div> 
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit"> <span class="fa fa-save"></span> Save Payments</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    


<script type="text/javascript">

    function paymentmethods(obj) {
        var paymenttype = $(obj).val();

        if (paymenttype == 2) {
            $('.cheque').show('slow');
            $('.bank').hide('slow');

        }else if(paymenttype == 3){
            $('.cheque').hide('slow');
            $('.bank').show('slow');
        }else{
            $('.cheque').hide('slow');
            $('.bank').hide('slow');
        }
        console.log(paymenttype);
    }

    function numberToWords(number) {  
        var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
        var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
        var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
        var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  

        number = number.toString(); number = number.replace(/[\, ]/g, ''); if (number != parseFloat(number)) return 'not a number'; var x = number.indexOf('.'); if (x == -1) x = number.length; if (x > 15) return 'too big'; var n = number.split(''); var str = ''; var sk = 0; for (var i = 0; i < x; i++) { if ((x - i) % 3 == 2) { if (n[i] == '1') { str += elevenSeries[Number(n[i + 1])] + ' '; i++; sk = 1; } else if (n[i] != 0) { str += countingByTens[n[i] - 2] + ' '; sk = 1; } } else if (n[i] != 0) { str += digit[n[i]] + ' '; if ((x - i) % 3 == 0) str += 'hundred '; sk = 1; } if ((x - i) % 3 == 1) { if (sk) str += shortScale[(x - i - 1) / 3] + ' '; sk = 0; } } if (x != number.length) { var y = number.length; str += 'point '; for (var i = x + 1; i < y; i++) str += digit[n[i]] + ' '; } str = str.replace(/\number+/g, ' '); return str.trim() + ".";  

    }



</script>