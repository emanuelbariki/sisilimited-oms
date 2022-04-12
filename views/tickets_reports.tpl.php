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
                        <li class="breadcrumb-item active">Tickets</li>
                    </ol>
                </div>
                <h4 class="page-title">Tickets Reports</h4>
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
                                <select class="form-control" onchange="filterby(this)" name="">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <option value="orderno">Order No.</option>
                                    <option value="client">Client Name</option>
                                    <option value="user">Assigned To</option>
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
                            <div class="form-group col-md-8 user">
                                <label for="clientphone" class="col-form-label">Assigned To</label>
                                <select class="form-control" onchange="filterby(this)" name="search[ptype]">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <?
                                        foreach ($users as $key => $U) {?>
                                            <option value="<?=$U['id']?>"><?=$U['name']?></option>
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
                                <label for="clientphone" class="col-form-label">Task Status</label>
                                <select class="form-control" onchange="filterby(this)" name="search[ctype]">
                                    <option value="" selected="" disabled="">Select.</option>
                                    <option value="0">Done</option>
                                    <option value="1">Pending</option>

                                </select>
                            </div>
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
                                <span class="btn btn-danger form-control" onclick="closesearch(this)"> <span class="mdi mdi-close"></span> Close</span>
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

     <!-- <div class="row">
        <div class="col-12">
            <div class="card-box bg-sisi">
                <form action="?module=reports&action=order_profit" method="post">
                    <div class="col-md-12">
                        <div class="form-row" id="clientdetails">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Order No:" name="orderid">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" placeholder="Order No:" name="orderid">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="submit" class="form-control btn btn-dark" placeholder="Order No:" value="Search" name="">
                            </div>
                        </div>
                    </div>
                </form>
                <input type="button" class="form-control col-sm-1" value="Search" name="">
            </div>
        </div>
    </div> -->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card-box">
                <?
                    // $orderdata = $Orders->get($allpayments[0]['orderid']);
                ?>

                <span type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" onclick="opensearch(this)">
                    <i class="mdi mdi-plus-circle"></i> Open Search
                </span>
                <h4 class="header-title mb-4">Order No. <?//= //$orderdata['orderno'];?></h4>

                <table class="table table-hover m-0 table-centered table-striped dt-responsive nowrap w-100" id="datatable-buttons">
                    <thead>
                        <tr class="">
                            <th>#</th>
                            <th>Ticket Name</th>
                            <th>Order Number</th>
                            <th>Assigned To</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <? if (count($tickets)) {
                          $count = 1;
                          foreach ($tickets as $id => $R) {?>
                            <tr class="">
                                <td><?= $count?></td>
                                <td><?= $R['statusName']?></td>
                                <td> <a href="?module=tickets&action=list&orderid=<?=$R['orderid']?>" target="_balnk"> <?= $R['orderNo']?> </a></td>
                                <td><?= $R['assignedTo']?></td>
                                <td>
                                    <?
                                        if ($R['done'] == 0) {
                                            echo "Done";
                                        }else{
                                            echo "Not Done";
                                        }
                                    ?>

                                </td>
                            </tr>
                        <?php $count++;
                            }} else { ?>
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
            $('.user').hide('fade');
            $('.ctype').hide('fade');
            $('.orderno').show('fade');
        }else if(searchtype == 'client'){
            $('.orderno').hide('fade');
            $('.user').hide('fade');
            $('.ctype').hide('fade');
            $('.client').show('fade');
        }else if(searchtype == 'user'){
            $('.orderno').hide('fade');
            $('.client').hide('fade');
            $('.ctype').hide('fade');
            $('.user').show('fade');
        }else if(searchtype == 'ctype'){
            $('.orderno').hide('fade');
            $('.client').hide('fade');
            $('.user').hide('fade');
            $('.ctype').show('fade');
        }
        // console.log(searchtype);
    }
</script>
