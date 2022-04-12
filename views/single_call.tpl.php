<style>
    .followupdate {
        display: none;
    }
</style>



<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">

        <h4 class="page-title">Prospectives</h4>
        <ol class="breadcrumb">
            <li>
                <a href="#">Lead Managment System</a>
            </li>
            <li>
                <a href="#">Prospectives</a>
            </li>
            <li class="active">
                <?= $singleProspective['clientsname'] ?>
            </li>
        </ol>
    </div>
</div>



<div class="row">


    <div class="col-xl-8">
        <div class="card-box">
            <h4 class="header-title mb-4">Call Log</h4>

            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item">
                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                        New Record
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link">
                        Previous Calls
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                        Previous Orders
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane show active" id="home1">
                    <form role="form" action="<?= url('calls', 'savecall') ?>" method="post">
                        <div class="form-group col-md-12">
                            <label for="">Person Of Contact</label>
                            <input type="hidden" value="<?= $_GET['pid']?>" name="calllog[prospectiveid]">
                            <input type="hidden" value="<?= $_GET['cid']?>" name="calllog[clientid]">

                            <?php
                            if (!empty($_GET['calltype'])) {?>
                              <input type="hidden" value="<?= $_GET['calltype']?>" name="calllog[calltype]">
                            <?}else {?>
                              <input type="hidden" value="new" name="calllog[calltype]">
                            <?}

                            if (!empty($_GET['followupid'])) {?>
                                <input type="hidden" name="followupid" value="<?= $_GET['followupid']?>">
                            <?}
                            ?>

                            <select class="form-control" name="calllog[contactedPerson]">
                                <option selected disabled>Select Person of Contact</option>
                                <option value="<?= $clientData['phone'] ?>"> <?= $clientData['phone'] ?> </option>
                            </select>
                        </div>

                        <!--Doublicatabble Starts-->
                        <div class="content col-md-12" id="copy">

                            <div class="form-group col-md-12">
                                <button type="button" onclick="addrow(this);" id="btnAdd" class="btn btn-primary btn-block"> <span class="fa fa-plus"></span> </button>
                            </div>

                            <div class="group">
                                <div class="form-row col-md-12" style="border: 2px #3283f6 dashed; border-radius:5px; padding:5px; margin-bottom: 5px;">
                                    <div class="form-group col-md-6">
                                        <label for="">Product</label>
                                        <select class="form-control" name="product[]">
                                            <option selected disabled>Select Product</option>
                                            <option>Used Car Purchace</option>
                                            <option>Machienery</option>
                                            <option>Clearing Service</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="">Call status</label>
                                        <select id="" class="form-control" onchange="followupStatus(this)" name="callstatusid[]">
                                            <option selected disabled>--Select Status--</option>

                                            <? if ($callstatus) {
                                                $count = 1;
                                                foreach ($callstatus as $id => $R) { ?>
                                                    <option value="<?= $R['id'] ?>"><?= $R['name'] ?></option>
                                                    <?php $count++;
                                                }
                                            } else { ?>
                                                <option>No Call status</option>
                                            <? } ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 followupdate" id="">
                                        <label for="">Follow-Up Date</label>
                                        <input class="form-control" type="date" name="followupdate[]">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="">Remarks</label>
                                        <textarea class="form-control" name="remarks[]" placeholder="Start Typing..."></textarea>
                                        <hr>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" onclick="rmvrow(this);" class="btn btn-danger btnRemove pull-right"><span class="fa fa-times"></span></button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <!--Doublicatable ends-->
                        <div class="form-group col-md-12">

                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary waves-effect waves-light"><span class="fa fa-save">&nbsp;</span> Save Call Log</button>
                        </div>

                    </form>
                </div>
                <div class="tab-pane" id="profile1">
                    <table class="table table-striped table-hover m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Contacted Person</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Sales Person</th>
                            </tr>
                        </thead>
                        <tbody>

                      <? if ($previouscalls) {
                        // $count = 1;
                        foreach ($previouscalls as $index => $C) { ?>
                      <tr>
                        <td scope="row"><?= $index = $index + 1; ?></td>
                        <td><?= $C['clientPhone'] ?></td>
                        <td><?= $C['product'] ?></td>
                        <td><?= $C['call_date'] ?></td>
                        <td><?= $C['createdBy'] ?></td>
                      </tr>
                      <?php
                            }
                        }else{ ?>
                          <tr>
                            <td>No Data Found</td>
                          </tr>
                          <?}?>
                        </tbody>
                    </table>


                </div>
                <div class="tab-pane" id="messages1">

                    <table class="table table-striped table-hover m-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Orderno</th>
                                <th>Car</th>
                                <th>Date</th>
                                <th>Sales Person</th>
                            </tr>
                        </thead>
                        <tbody>

                      <? if ($previousorders) {
                        // $count = 1;
                        foreach ($previousorders as $index => $PO) { ?>
                      <tr>
                        <td scope="row"><?= $index = $index + 1; ?></td>
                        <td><?= $PO['orderno'] ?></td>
                        <td><?= $PO['brandName'] ?> <?= $PO['makeName'] ?> <?= $PO['caryear'] ?></td>
                        <td><?= $PO['issue_date'] ?></td>
                        <td><?= $PO['createdBy'] ?></td>
                      </tr>
                      <?php
                            }
                        }else{ ?>
                          <tr>
                            <td>No Data Found</td>
                          </tr>
                          <?}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col -->

    <div class="col-xl-4">
        <div class="card-box">
            <h4 class="header-title mb-4">Company Details</h4>
            <address>
                <h4 class="text-muted text-capitalize"><?=$clientData['name']?>:</h4>
                <!-- <h5 class="text-muted text-capitalize">aika Mallya</h5> -->
                <abbr title="P.O.Box">Address: </abbr><?=$clientData['address']?><br>
                <abbr title="TIN Number">TIN: </abbr><?=$clientData['tin_no']?><br>
                <!-- San Francisco, CA 94107<br> -->
                <abbr title="Phone">Phone: </abbr><?=$clientData['phone']?>
            </address>



        </div> <!-- end card-box-->
    </div> <!-- end col -->

</div>


<div class="row">

    <div class="col-lg-12" style="margin-top:20px;">
                <!--Start Second Tab-->
                <table class="table table-striped table-hover m-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Contacted Person</th>
                            <th>Department</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Sales Person</th>
                        </tr>
                    </thead>
                    <tbody>

                  <? if ($calllogs) {
                    // $count = 1;
                    foreach ($calllogs as $index => $C) { ?>
                  <tr>
                    <td scope="row"><?= $index = $index + 1; ?></td>
                    <td><?= $C['contactedPerson'] ?></td>
                    <td><?= $C['departmentName'] ?></td>
                    <td><?= $C['productName'] ?></td>
                    <td><?= $C['callDate'] ?></td>
                    <td><?= $C['createdBY'] ?></td>
                  </tr>
                  <?php
                        }
                    }else{ ?>
                      <tr>
                        <td>No Data Found</td>
                      </tr>
                      <?}?>
                    </tbody>
                </table>

    </div>
</div>



<script>
    function followupStatus(object) {
        var statusid = parseInt($(object).val());
        var parent = $(object).closest(".group");

        if (statusid === 3) {
            $(parent).find(".followupdate").show('slow');
        } else {
            $(parent).find(".followupdate").hide('slow');
        }

    }



    function addrow(obj) {
        var parent = $(obj).closest("#copy");
        var group = $(parent).find(".group");
        // console.log(parent);
        var row = "<div class='group'>"+
                        "<div class='form-row col-md-12' style='border: 2px #3283f6 dashed; border-radius:5px; padding:5px; margin-bottom: 5px;'>"+

                            "<div class='form-group col-md-6'>"+
                                "<label for=''>Product</label>"+
                                "<select class='form-control' name='product[]'>"+
                                    "<option selected disabled>Select Product</option>"+
                                    "<option>Used Car Purchace</option>"+
                                    "<option>Machienery</option>"+
                                    "<option>Clearing Service</option>"+
                                "</select>"+
                            "</div>"+

                            "<div class='form-group col-md-6'>"+
                                "<label for=''>Call status</label>"+
                                "<select id='' class='form-control' onchange='followupStatus(this)' name='callstatusid[]'>"+
                                    "<option selected disabled>--Select Status--</option>"+

                                    <? if ($callstatus) {
                                    $count = 1;
                                    foreach ($callstatus as $id => $R) { ?>
                                        "<option value='<?= $R['id'] ?>'><?= $R['name'] ?></option>"+
                                    <?php $count++;
                                    }
                                    } else { ?>
                                        "<option>No Call status</option>"+
                                    <? } ?>

                                "</select>"+
                            "</div>"+
                            "<div class='form-group col-md-6 followupdate' id=''>"+
                                "<label for=''>Follow-Up Date</label>"+
                                "<input class='form-control' type='date' name='followupdate[]'>"+
                            "</div>"+


                            "<div class='form-group col-md-12'>"+
                                "<label for=''>Remarks</label>"+
                                "<textarea class='form-control' name='remarks[]' placeholder='Start Typing...'></textarea>"+
                                "<hr>"+
                            "</div>"+

                            "<div class='col-md-12'>"+
                                "<button type='button' onclick='rmvrow(this);'  class='btn btn-danger btnRemove pull-right'><span class='fa fa-times'></span></button>"+
                            "</div>"+
                        "</div>"+
                        "<hr>"+
                    "</div>";
        $(parent).append(row);

    }

    function rmvrow(obj) {
        var parent = $(obj).closest(".group");
        var length = $('#copy').find(".group");

        if (length.length > 1 ) {
            console.log($(obj));
            parent.remove();
            // cost(length);
        }else{
            console.log(length.length);

        }
    }


</script>
