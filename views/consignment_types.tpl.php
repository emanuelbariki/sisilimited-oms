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
                <h4 class="page-title">Consignment Types Module</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                     <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> 
                    
                    <h4 class="header-title mb-0">Add Consignment Types</h4>
                    <hr>
                    <div class="col-md-12">
                        <form action="<?=url('consignment_types','add')?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="brandname" class="col-form-label">Consignment Types Name</label>
                                    <input type="text" class="form-control" id="brandname" placeholder="Consignment Types Name" name="consignment_types[name]" value="<?=$name?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="statuss" class="col-form-label">Status</label>
                                    <select id="statuss" class="form-control" name="consignment_types[status]">
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
                    <h4 class="header-title mb-0">All Consignment Types</h4><hr>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 table-nowrap" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-medium">#</th>
                                        <th class="font-weight-medium">Port Name</th>
                                        <th class="font-weight-medium">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? if (count($consignment_types)) {
                                  $count = 1;
                                  foreach ($consignment_types as $id => $R) { ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $R['name'] ?></td>
                                        <td>
                                            <a href="?module=consignment_types&action=index&id=<?= $R['id'] ?>" class="btn btn-xs btn-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                            <a href="?module=consignment_types&action=delete&id=<?= $R['id'] ?>" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
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
