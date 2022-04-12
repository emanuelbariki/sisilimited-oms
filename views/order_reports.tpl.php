<style type="text/css">
    .hide{
        display: none;
    }
    .client{
        display: none;
    }
    .orderno{
        display: none;
    }
    .ptype{
        display: none;
    }
    .ctype{
        display: none;
    }
</style>
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);"><?=CS_COMPANY?></a></li>
                        <li class="breadcrumb-item active">Payment Reports</li>
                    </ol>
                </div>
                <h4 class="page-title">All Payments</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->



    <div class="row hide">
        <div class="col-12">
            <div class="card-box">
                <span type="button" class="btn btn-sm btn-danger waves-effect waves-light float-right" onclick="closesearch(this)">
                    <i class="mdi mdi-close"></i>
                </span>
                <h4 class="header-title mb-4">Search Console</h4>
                <form action="?module=reports&action=payment&search=true" method="post">
                    <div class="col-md-12">
                        <div class="form-row" id="clientdetails">
                            <div class="form-group col-md-4">
                                <label for="clientname" class="col-form-label">Search by</label>
                                <select class="form-control" onchange="filterby(this)" name="" required>
                                    <option value="" selected="" disabled="">Select.</option>
                                    <option value="orderno">Order No.</option>
                                    <option value="client">Client Name</option>
                                    <option value="ptype">Payment Type</option>
                                    <option value="ctype">Car Type</option>
                                </select>
                            </div>
                            <div class="form-group col-md-8 client">
                                <label for="clientphone" class="col-form-label">Client Name</label>
                                <select class="form-control" onchange="filterby(this)" name="search[clientid]">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <?
                                        foreach ($clientList as $key => $CL) {?>
                                            <option value="<?=$CL['id']?>"><?=$CL['name']?></option>
                                        <?}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-8 orderno">
                                <label for="clientemail" class="col-form-label">Order No</label>
                                <input type="text" class="form-control address"  placeholder="SLO-001" value="<?=$clientemail?>" name="search[orderno]">
                            </div>
                            <div class="form-group col-md-8 ptype">
                                <label for="clientphone" class="col-form-label">Payment Type</label>
                                <select class="form-control" onchange="filterby(this)" name="search[ptype]">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <?
                                        foreach ($paymentTypes as $key => $PT) {?>
                                            <option value="<?=$PT['id']?>"><?=$PT['name']?></option>
                                        <?}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-8 ctype">
                                <label for="clientphone" class="col-form-label">Car Name</label>
                                <select class="form-control" onchange="filterby(this)" name="search[ctype]">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <?
                                        foreach ($cartypes as $key => $CT) {?>
                                            <option value="<?=$CT['id']?>"><?=$CT['brandName']?> <?=$CT['makeName']?></option>
                                        <?}
                                    ?>
                                </select>
                            </div>

                            
                            <!-- <div class="form-group col-md-2">
                                <label for="clientemail" class="col-form-label">Client Phone</label>
                                <input type="text" class="form-control phone"  placeholder="Client Phone" value="<?=$clientemail?>">
                            </div> -->
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 fromdate">
                                <label for="clientphone" class="col-form-label">From Date</label>
                                <input type="date" class="form-control" name="search[fromdate]">
                            </div>

                            <div class="form-group col-md-6 todate">
                                <label for="clientphone" class="col-form-label">To Date</label>
                                <input type="date" class="form-control" name="search[todate]">
                            </div>
                        </div>
                    </div>

                     <div class="col-md-12">
                        <div class="form-row" id="clientdetails">
                            <div class="form-group col-md-6">
                                <button class="btn btn-danger form-control" onclick="closesearch(this)"> <span class="mdi mdi-close"></span> Close</button>
                            </div>
                            <div class="form-group col-md-6">
                                <button class="btn btn-sisi form-control" type="submit"> <span class="fa fa-search"></span> Search</button>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>


               
            </div>
        </div><!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <span type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" onclick="opensearch(this)">
                    <i class="mdi mdi-plus-circle"></i> Open Search
                </span>
                <h4 class="header-title mb-4">Manage Orders</h4>

                <table class="table table-hover m-0 table-centered table-striped dt-responsive nowrap w-100" id="datatable-buttons">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Order No.</th>
                            <th>Client Name</th>
                            <th>Consignment Type</th>
                            <th>Car Name</th>
                            <th>Container Size</th>
                            <th>Bank Name</th>
                            <th>Ref No.</th>
                            <th>Cheque No.</th>
                            <th>Recieved By</th>
                            <th>Payment Type</th>
                            <th>Paid Amount</th>
                            <!-- <th>Status</th> -->
                            <!-- <th class="hidden-sm">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>

                        <? if (count($allpayments)) {
                          $count = 1;
                          $totalPaid = 0;
                          foreach ($allpayments as $id => $R) {
                            $totalPaid = $totalPaid + $R['paid_totalmount'];
                           ?>

                            <tr class="text-center">
                                <td> <a target="_blank" href="?module=orders&action=acknowledgement_reciept&id=<?= $R['id']?>"><b><?= $R['id'] ?></b></a> </td>
                                <td> <a target="_blank" href="?module=orders&action=invoice&id=<?= $R['orderid']?>"><b>#<?= $R['orderno'] ?></b></a></td>
                                <td><?= $R['clinetName'] ?></td>
                                <td><?= $R['consignment_type'] ?></td>
                                <td> 
                                    <? if (empty($R['brandName'])) {
                                        echo "N/A";
                                    }else{
                                        echo $R['brandName'] ." ". $R['makeName'] ." ". $R['year'];
                                    } 
                                    ?> 
                                </td>

                                <td> 
                                    <? if (empty($R['containerSize'])) {
                                        echo "N/A";
                                    }else{
                                        echo $R['containerSize'];
                                    } 
                                    ?> 
                                </td>
                                <td> 
                                    <? if (empty($R['bankname'])) {
                                        echo "N/A";
                                    }else{
                                        echo $R['bankname'];
                                    } 
                                    ?> 
                                </td>
                                <td class="text-left">
                                    <? if (empty($R['bankreference'])) {
                                        echo "N/A";
                                    }else{
                                        echo $R['bankreference'];
                                    } 
                                    ?> 
  
                                </td>
                                <!-- <td class="text-left"><?= $R['chequeno'] ?></td> -->
                                <td class="text-left">
                                    <? if (empty($R['chequeno'])) {
                                        echo "N/A";
                                    }else{
                                        echo $R['chequeno'];
                                    } 
                                    ?> 
  
                                </td>
                                <td><?= $R['recievedBy'] ?></td>
                                <td><?= $R['paymeneMethod'] ?></td>
                                <td><?= number_format($R['paid_totalmount']); ?> /=</td>
                               <!--  <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" target="_blank" href="?module=orders&action=acknowledgement_reciept&id=<?= $R['id']?>"><i class="mdi mdi-cash-usd-outline mr-2 font-18 text-muted vertical-middle"></i>Print Ack Reciept</a>
                                            <a class="dropdown-item" href="?module=orders&action=invoice&id=<?= $R['orderid']?>"><i class="mdi mdi-eye mr-2 text-muted font-18 vertical-middle"></i>View Invoice</a>
                                        </div>
                                    </div>
                                </td> -->
                            </tr>
                        <?php $count++;
                                        }?>
                                        <tr class="bg-dark text-white text-center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total :</b></td>
                                            <td class="text-center not-found"><b><?= number_format($totalPaid);?> /=</b></td>
                                            <!-- <td></td> -->  
                                        </tr>
                                        <?
                                    } else { ?>
                        <tr>
                            <td class="text-center not-found" colspan="9">No Records Found</td>
                        </tr>
                        <? } ?>



                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
    <!-- end row -->

</div> <!-- container -->


<script type="text/javascript">
    function opensearch(obj) {
        $('.hide').show('slow');
    }
    function closesearch(argument) {
        $('.hide').hide('slow');
    }


    function filterby(obj) {
        var searchtype = $(obj).val();

        if (searchtype == 'orderno') {
            $('.client').hide('fade');
            $('.ptype').hide('fade');
            $('.ctype').hide('fade');
            $('.orderno').show('fade');
        }else if(searchtype == 'client'){
            $('.orderno').hide('fade');
            $('.ptype').hide('fade');
            $('.ctype').hide('fade');
            $('.client').show('fade');
        }else if(searchtype == 'ptype'){
            $('.orderno').hide('fade');
            $('.client').hide('fade');
            $('.ctype').hide('fade');
            $('.ptype').show('fade');
        }else if(searchtype == 'ctype'){
            $('.orderno').hide('fade');
            $('.client').hide('fade');
            $('.ptype').hide('fade');
            $('.ctype').show('fade');
        }
        // console.log(searchtype);
    }
</script>