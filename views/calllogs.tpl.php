        <!-- third party css -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                        <li class="breadcrumb-item active">Call Logs Reports</li>
                    </ol>
                </div>
                <h4 class="page-title">Call Logs Reports</h4>
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

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <span type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right" onclick="opensearch(this)">
                    <i class="mdi mdi-plus-circle"></i> Open Search
                </span>
                <h4 class="header-title mb-4">Manage Call Logs</h4>

                <table class="table table-hover m-0 table-centered table-striped dt-responsive nowrap w-100" id="datatable-buttons">
                    <thead>
                        <tr class="text-left">
                            <th>#</th>
                            <th>Client Name</th>
                            <th>Product</th>
                            <th>Call By</th>
                            <th>Date</th>
                            <th>Remarks</th>
                            <th>Outcome</th>
                            <!-- <th>Status</th> -->
                            <!-- <th class="hidden-sm">Action</th> -->
                        </tr>
                    </thead>

                    <tbody>

                        <? if (count($calls)) {
                          $count = 1;
                          $totalPaid = 0;
                          foreach ($calls as $id => $R) {
                            $totalPaid = $totalPaid + $R['paid_totalmount'];
                           ?>

                            <tr class="text-left">
                                <td><b><?= $R['id'] ?></b> </td>
                                <td><a target="_blank" href="?module=clients&action=index&id="><b><?= $R['clientName'] ?></b></a></td>
                                <td><?= $R['product'] ?></td>
                                <td><?= $R['createdBy'] ?></td>
                                <td><?= $R['call_date'] ?></td>
                                <td><?= $R['remarks'] ?></td>
                                <td><?= $R['statusName'] ?></td>
                                
                            </tr>
                        <?php $count++;
                                        }?>
                                        
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

        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>