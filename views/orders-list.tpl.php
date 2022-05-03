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
                <h4 class="page-title">All Orders</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <a href="?module=orders&action=index" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> New Order
                </a>
                <h4 class="header-title mb-4">Manage Orders</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="datatable-buttons">
                    <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Car Name</th>
                            <th>Client Name</th>
                            <th>Shipping Line</th>
                            <th>ETD</th>
                            <th>ETA</th>
                            <th>Status</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <? if (count($allorders)) {
                          $count = 1;
                          foreach ($allorders as $id => $R) { ?>

                            <tr>
                                <td><b>#<?= $R['orderno'] ?></b></td>
                                <td> <?= $R['brandName'] ?> <?= $R['makeName'] ?> <?= $R['caryear'] ?> </td>
                                <td><?= $R['clientname'] ?></td>
                                <td><?= $R['shipname'] ?></td>
                                <td><?= $R['etd'] ?></td>
                                <td><?= $R['eta'] ?></td>
                                <td><span class="badge bg-soft-success text-success"><?= $R['orderstatus'] ?></span></td>
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <?
                                                if ($_SESSION['member']['clientdetails'] == NULL) {?>
                                                    <a class="dropdown-item" target="_blank" href="?module=tickets&action=list&orderid=<?=$R['id']?>"><i class="mdi mdi-cash-usd-outline mr-2 font-18 text-muted vertical-middle"></i>Work</a>
                                                <?}
                                            ?>
                                            <a class="dropdown-item" target="_blank" href="?module=orders&action=view&id=<?= base64_encode($R['id'])?>"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>View Order</a>
                                            
                                            <?
                                                if ($_SESSION['member']['clientdetails'] == NULL) {?>
                                                     <a class="dropdown-item" href="?module=orders&action=index&orderid=<?= $R['id']?>"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Order</a>
                                                <?}
                                            ?>
                                            <a class="dropdown-item" target="_blank" href="?module=orders&action=invoice&id=<?= $R['id']?>"><i class="mdi mdi-cash-marker mr-2 text-muted font-18 vertical-middle"></i>Generate Invoice</a>
                                            <?
                                                if ($_SESSION['member']['clientdetails'] == NULL) {?>
                                                     <a class="dropdown-item text-danger" href="?module=leads&action=delete&id=<?= $R['id']?>"><i class="mdi mdi-delete mr-2 text-danger font-18 vertical-middle"></i>Remove</a>
                                                <?}
                                            ?>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php $count++;
                            }
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
