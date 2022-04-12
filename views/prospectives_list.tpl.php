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
                <h4 class="page-title">Prospectives Module</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">All Prospects</h4><hr>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 table-nowrap" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-medium">#</th>
                                        <th class="font-weight-medium">Client Name</th>
                                        <th class="font-weight-medium">Assigned To</th>
                                        <th class="font-weight-medium">Date</th>
                                        <th class="font-weight-medium">Status</th>
                                        <th class="font-weight-medium">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? if (count($prospectives)) {
                                  $count = 1;
                                  foreach ($prospectives as $id => $R) { ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $R['clientName'] ?></td>
                                        <td><?= $R['assignedTo'] ?></td>
                                        <td><?= $R['issue_date'] ?></td>
                                        <td><? if ($R['done'] == 1) {?>
                                            <span class="badge badge-soft-success">Done</span>
                                        <?}else{?>
                                            <span class="badge badge-soft-danger">Pending</span>
                                        <?} ?></td>
                                        <!-- <td><?= $R['status'] ?></td> -->
                                        <td>
                                            <a href="?module=calls&action=index&pid=<?= $R['id'] ?>" class="btn btn-s btn-danger"><i class="mdi mdi-phone-in-talk"></i></a>
                                            <!-- <a href="?module=brands&action=delete&id=<?= $R['id'] ?>" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a> -->
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
