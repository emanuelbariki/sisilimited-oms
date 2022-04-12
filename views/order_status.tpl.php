<style type="text/css">
.messege{
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
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Order Status</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> -->
                    <div class="col-md-12">
                        <form action="<?=url('order_status','add')?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="inputEmail4" class="col-form-label">Status Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Status Name" name="status[name]" value="<?=$name?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4" class="col-form-label">Sort No</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="01" name="status[sortno]" value="<?=$name?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox float-left">
                                        <input type="checkbox" class="custom-control-input" id="sendnotification" name="status[sendsms]" value="1" onchange="checksms(this);">
                                        <label class="custom-control-label" for="sendnotification">
                                            Send Customer SMS
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox float-left">
                                        <input type="checkbox" class="custom-control-input" id="fileupload" name="status[fileupload]" value="1">
                                        <label class="custom-control-label" for="fileupload">
                                            Has File Upload
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="custom-control custom-checkbox float-left">
                                        <input type="checkbox" class="custom-control-input" id="payments" name="status[payments]" value="1">
                                        <label class="custom-control-label" for="payments">
                                            Has Payments
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 messege">
                                    <label for="" class="col-form-label">Customer Messege </label><br>
                                    <!-- <hr> -->
                                    <label for="" class="col-form-label">{custName} => Customer Name,<br>{odrNo} => Order No,<br>{contNo} => Container No,<br>{carName} => Car Name </label>
                                    <textarea class="form-control" placeholder="Dear {custName} , Your order ( {ordeNo} for {carName} documents have been Recieved." name="status[sms]"></textarea>
                                    
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState" class="col-form-label">Status</label>
                                    <select id="inputState" class="form-control" name="status[status]">
                                        <option disabled>Choose</option>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Record</button>

                        </form>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">All Statuses</h4>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 table-nowrap" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-medium">#</th>
                                        <th class="font-weight-medium">Status Name</th>
                                        <th class="font-weight-medium">Sort No.</th>
                                        <th class="font-weight-medium">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? if (count($orderstatus)) {
                                  $count = 1;
                                  foreach ($orderstatus as $id => $R) { ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $R['name'] ?></td>
                                        <td><?= $R['sortno'] ?></td>
                                        <td>
                                            <a href="?module=clients&action=index&id=<?= $R['id'] ?>" class="btn btn-xs btn-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                            <a href="?module=clients&action=delete&id=<?= $R['id'] ?>" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr>
                                    <?php $count++;
                                        }
                                    } else { ?>
                                    <tr>
                                        <td class="text-center not-found" colspan="9">No Clients Found</td>
                                    </tr>
                                    <? } ?>

                                    <!-- <tr>
                                        <td>4</td>
                                        <td>$20.00</td>
                                        <td>184</td>
                                        <td>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                            <a href="javascript: void(0);" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
                                        </td>
                                    </tr> -->



                                </tbody>
                            </table>
                        </div> <!-- end table responsive-->
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->



    </div>
    <!-- end row -->

</div> <!-- container -->
<script type="text/javascript">
    function checksms(obj) {
        var checkbox = $(obj);

        if ( checkbox.prop( "checked" ) ){
            $('.messege').show('slow');
            // console.log("Emanuel");
        }else{
            $('.messege').hide('slow');
            // console.log("Lisa");
        }
    }
</script>