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
                <h4 class="page-title">Cars Module</h4>
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

                    <h4 class="header-title mb-0">Add Cars</h4>
                    <hr>
                    <div class="col-md-12">
                        <form action="<?=url('cars','add')?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="country" class="col-form-label">Year</label>
                                    <select class="form-control select2" name="car[year]">
                                        <option selected disabled>Select Year</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="country" class="col-form-label">Select Brand</label>
                                    <select class="form-control select2" name="car[brandid]">
                                        <option selected disabled>Select Brand</option>

                                        <?
                                        if(!empty($brands)){
                                            foreach ($brands as $p){?>
                                        <option value="<?=$p['id']?>" style = "text-transform:capitalize;"><?=$p['name']?></option>
                                        <?}
                                        }else{?>
                                        <option disabled>List is empty</option>
                                        <?}?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="country" class="col-form-label">Select Make</label>
                                    <select class="form-control select2" name="car[makeid]">
                                        <option selected disabled>Select Make</option>

                                        <?
                                        if(!empty($makes)){
                                            foreach ($makes as $p){?>
                                        <option value="<?=$p['id']?>" style = "text-transform:capitalize;"><?=$p['name']?></option>
                                        <?}
                                        }else{?>
                                        <option disabled>List is empty</option>
                                        <?}?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="statuss" class="col-form-label">Status</label>
                                    <select id="statuss" class="form-control" name="car[status]">
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
                    <h4 class="header-title mb-0">All Cars</h4>
                    <hr>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered mb-0 table-nowrap" id="datatable-buttons">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="font-weight-medium">#</th>
                                        <th class="font-weight-medium">Year</th>
                                        <th class="font-weight-medium">Brand Name</th>
                                        <th class="font-weight-medium">Make Name</th>
                                        <th class="font-weight-medium">Edit / Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <? if (count($cars)) {
                                  $count = 1;
                                  foreach ($cars as $id => $R) { ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $R['year'] ?></td>
                                        <td style = "text-transform:capitalize;"><?= $R['brandName'] ?></td>
                                        <td style = "text-transform:capitalize;"><?= $R['makeName'] ?></td>
                                        <td>
                                            <a href="?module=brands&action=index&id=<?= $R['id'] ?>" class="btn btn-xs btn-light"><i class="mdi mdi-circle-edit-outline"></i></a>
                                            <a href="?module=brands&action=delete&id=<?= $R['id'] ?>" class="btn btn-xs btn-danger"><i class="mdi mdi-minus"></i></a>
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
