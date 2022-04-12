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
                <h4 class="page-title">Add Clients</h4>
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
                        <form action="<?=url('clients','add')?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Client Name</label>
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="Client Name" name="client[name]" value="<?=$name?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Phone Number" name="client[phone]" value="<?=$phone?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="Address" name="client[address]" value="<?=$address?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">TIN Number</label>
                                    <input type="number" class="form-control" id="inputPassword4" placeholder="TIN (123-456-789)" name="client[tin_no]" value="<?=$tin_no?>">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputState" class="col-form-label">Website</label>
                                    <input type="text" class="form-control" id="inputPassword4" placeholder="www.example.com" name="client[website]" value="<?=$website?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="inputPassword4" placeholder="Email" name="client[email]" value="<?=$email?>">
                                </div>
                            </div>



                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="inputnida" class="col-form-label">NIDA ID / Driver's Licence</label>
                                    <input id="inputnida" type="text" name="client[nida]" class="form-control" placeholder="Nida ID" value="<?=$nida?>">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="inputState" class="col-form-label">Client Status</label>
                                    <select id="inputState" class="form-control" name="client[status]">
                                        <option disabled>Choose</option>
                                        <option value="active" selected>Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Client</button>

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
                    <h4 class="header-title mb-0">All Clients</h4>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 table-nowrap" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-medium">#</th>
                                        <th class="font-weight-medium">Client Name</th>
                                        <th class="font-weight-medium">Phone</th>
                                        <th class="font-weight-medium">Address</th>
                                        <th class="font-weight-medium">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? if (count($clientsList)) {
                                  $count = 1;
                                  foreach ($clientsList as $id => $R) { ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $R['name'] ?></td>
                                        <td><?= $R['phone'] ?></td>
                                        <td><?= $R['address'] ?></td>
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
