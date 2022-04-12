
<!-- Plugins css -->
<link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />


<!-- Start Content-->
<div class="container-fluid">
                        
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CONSIGNMENT ORDER IN PROGRESS</a></li>
                        <li class="breadcrumb-item active">CLIENT VIEW</li>
                    </ol>
                </div>
                <h4 class="page-title" style="text-transform: capitalize;">Hello <i><?=$orderdetails['0']['clientname'] ?>,</i> &nbsp;Here is your Order Progress.</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Track Order - <i><?=$orderdetails['0']['brandName'] ?> <?=$orderdetails['0']['makeName'] ?> <?=$orderdetails['0']['caryear'] ?></i></h4>
                    <!-- <h4 class="" style="text-transform: capitalize;"></h4> -->

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h5 class="mt-0">Tracking ID: <span class="text-sisi" > #<?=$orderdetails['0']['orderno'] ?></span> </h5>
                            </div>
                        </div>

                        <!-- <div class="col-lg-6">
                            <div class="mb-4">
                                <h5 class="mt-0">Tracking ID: <span class="text-warning" > # <?=$orderdetails['0']['orderno'] ?></span> </h5>
                            </div>
                        </div> -->
                    </div>

                    <div class="track-order-list">

                        <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tickets-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Process Name</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Files</th>
                                </tr>
                            </thead>

                            <tbody>

                                <? if (count($workdone)) {
                                  $count = 1;
                                  foreach ($workdone as $id => $R) { ?>

                                    <tr>
                                        <td><b><?= $count?></b></td>
                                        <td><?= $R['statusName'] ?></td>
                                        <td><?
                                        if ($R['done'] == 1) {
                                            echo "Done";
                                        }else{
                                            echo "Not Done";
                                        }
                                        ?></td>
                                        <td><?if (!empty($R['date'])) {
                                            echo $R['date'];
                                        }else{
                                            echo "-";
                                        } ?></td>
                                        <!-- <td><?= $R['file'] ?></td> -->
                                        <td>
                                            <?
                                                if (!empty($R['file'])) {?>
                                                    <a target="_blank" href="assets/uploads/<?=$R['file']?>" class="text-muted font-weight-bold"><?=$R['statusName']?>.pdf</a>
                                                    <p class="mb-0 font-12">2.3 MB</p>  
                                                <?}else{?>
                                                    -
                                                <?}
                                            ?>
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
                        <!-- <div class="text-center mt-4">
                            <a href="#" class="btn btn-primary">Show Details</a>
                        </div> -->
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">

            <div class="card">
                <div class="card-body">
                    
                            
                <h4>Consignment Costs</h4>
                <div class="row">
                        <div class="col-md-4">
                            <!-- assignee -->
                            <p class="mt-2 mb-1 text-muted">Ship Name</p>
                            <div class="media">
                                <!-- <img src="assets/images/users/user-9.jpg" alt="Arya S" class="rounded-circle mr-2" height="24" /> -->
                                <i class='mdi mdi-ship-wheel font-18 text-sisi mr-1'></i>
                                <div class="media-body">
                                    <h5 class="mt-1 font-size-14">
                                        <?=$orderdetails['0']['shipname'] ?>
                                    </h5>
                                </div>
                            </div>
                            <!-- end assignee -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <!-- start due date -->
                            <p class="mt-2 mb-1 text-muted">From Port</p>
                            <div class="media">
                                <i class='mdi mdi-briefcase-check-outline font-18 text-sisi mr-1'></i>
                                <div class="media-body">
                                    <h5 class="mt-1 font-size-14">
                                        <?=$orderdetails['0']['fromPort'] ?>
                                    </h5>
                                </div>
                            </div>
                            <!-- end due date -->
                        </div>

                        <div class="col-md-4">
                            <!-- start due date -->
                            <p class="mt-2 mb-1 text-muted">Estimated Time of Arrival (ETA)</p>
                            <div class="media">
                                <i class='mdi mdi-calendar-month-outline font-18 text-sisi mr-1'></i>
                                <div class="media-body">
                                    <h5 class="mt-1 font-size-14">
                                        <?=$orderdetails['0']['eta'] ?>
                                    </h5>
                                </div>
                            </div>
                            <!-- end due date -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <hr>
                    <? foreach ($ordercost as $id => $R) {
                        if ($R['paid'] == '0') {?>
                            <!-- <div class="custom-control custom-checkbox mt-1">
                                <input type="checkbox" class="custom-control-input" id="<?=$R['id']?>" value="<?=$R['id']?>">
                                <label class="custom-control-label strikethrough" for="<?=$R['id']?>">
                                    <?=$R['statusName']?>
                                </label>
                            </div> -->
                            <span class="mdi mdi-close text-sisi" style="display:block;"> <?=$R['CostGroupName']?> - <?=number_format($R['totalamount'])?> Tzs /=</span>
                        <?}else {?>
                            <span class="mdi mdi-check-all text-sisi" style="display:block;"> <?=$R['CostGroupName']?> - <?=number_format($R['totalamount'])?> Tzs /=</span>
                        <?}
                    } ?>

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">

            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none text-muted"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class='mdi mdi-dots-horizontal font-18'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='mdi mdi-attachment mr-1'></i>Attachment
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='mdi mdi-pencil-outline mr-1'></i>Edit
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class='mdi mdi-content-copy mr-1'></i>Mark as Duplicate
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item text-danger">
                                <i class='mdi mdi-delete-outline mr-1'></i>Delete
                            </a>
                        </div> <!-- end dropdown menu-->
                    </div> <!-- end dropdown-->

                    <h5 class="card-title font-16 mb-3">Attachments</h5>

                    <!-- <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                        data-upload-preview-template="#uploadPreviewTemplate">
                        <div class="fallback">
                            <input name="file" type="file" />
                        </div>

                        <div class="dz-message needsclick">
                            <i class="h3 text-muted dripicons-cloud-upload"></i>
                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </form> -->

                    <!-- Preview -->
                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end file preview template -->
                    
                    <?
                        if (!empty($workdone)) {
                            foreach ($workdone as $id => $R) {
                                if (!empty($R['file'])) {?>
                                    <div class="card mb-1 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-sm">
                                                        <span class="avatar-title badge-soft-danger text-danger rounded">
                                                            PDF
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col pl-0">
                                                    <a target="_blank" href="assets/uploads/<?=$R['file']?>" class="text-muted font-weight-bold"><?=$R['statusName']?>.pdf</a>
                                                    <p class="mb-0 font-12">2.3 MB</p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="assets/uploads/<?=$R['file']?>" class="btn btn-link font-16 text-muted">
                                                        <i class="dripicons-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                <?}
                            }
                        }
                    ?>
                    

                </div>
            </div>
        </div>

        
    </div>
    <!-- end row -->

    <!-- <div class="row">
        <div class="col-xl-12 col-lg-12">

        <hr>
            
            <div class="card">
                <div class="card-body">

                    <div class="float-right">
                        <select class="custom-select custom-select-sm ">
                            <option selected="">Recent</option>
                            <option value="1">Most Helpful</option>
                            <option value="2">High to Low</option>
                            <option value="3">Low to High</option>
                        </select>
                    </div>

                    <h4 class="mb-4 mt-0 font-16">Comments (51)</h4>

                    <div class="clerfix"></div>
                
                        <?
                            if (!empty($comments)) {
                                foreach ($comments as $id => $R) {?>
                                    <div class="media mt-3" style="border-bottom:0px #888 solid;">
                                        <img class="mr-2 rounded-circle" src="assets/images/users/<?=$R['image']?>"
                                            alt="Generic placeholder image" height="32">
                                        <div class="media-body border rounded p-1">
                                            <h5 class="mt-0"><?=$R['postedBy']?> <small class="text-muted float-right"><?echo $R['date'];?></small></h5>
                                            <?=$R['comment']?>

                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                <?}
                            }
                        ?>
                    

                    <div class="text-center mt-2">
                    </div>

                    <div class="border rounded mt-4">
                        <form action="<?=url('orders','add_comment')?>" method="POST" class="comment-area-box">
                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your comment..." name="comment[comment]"></textarea>
                            <input type="hidden" value="<?=$_SESSION['member']['id']?>" name="comment[createdby]">
                            <input type="hidden" value="<?=$_GET['id']?>" name="comment[orderid]">
                            <input type="hidden" value="active" name="comment[status]">
                            <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                <div>
                                </div>
                                <button type="  " class="btn btn-sm btn-success"><i class='uil uil-message mr-1'></i>Submit</button>
                            </div>
                        </form>

                </div>
            </div>

            
        </div>
    </div> -->
        
</div> <!-- container -->


                    
<!-- Plugins js -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>