<style type="text/css">
    .dropdown-menu-right :hover{
        cursor: pointer;
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
                <h4 class="page-title">Assign Tasks</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- <a href="?module=orders&action=index" type="button" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> New Order
                </a> -->
                <h4 class="header-title mb-4">Manage Tasks</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="datatable-buttons">
                    <thead>
                        <tr>
                            <th>Order No.</th>
                            <th>Car Name</th>
                            <th>Client Name</th>
                            <th>Shipping Line</th>
                            <th>ETD</th>
                            <th>ETA</th>
                            <!-- <th>Status</th> -->
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <? if (count($allorders)) {
                          $count = 1;
                          foreach ($allorders as $id => $R) { ?>

                            <tr>
                                <td><b class="text-success text-center">#<?= $R['orderno'] ?></b></td>
                                <td> <?= $R['brandName'] ?> <?= $R['makeName'] ?> <?= $R['year'] ?> </td>
                                <td><?= $R['clientname'] ?></td>
                                <td><?= $R['shipname'] ?></td>
                                <td><?= $R['etd'] ?></td>
                                <td><?= $R['eta'] ?></td>
                                <!-- <td><span class="badge bg-soft-success text-success"><?= $R['orderstatus'] ?></span></td> -->
                                <td>
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" data-id="<?= $R['id']?>" onclick="getordertickets(this);" data-toggle="modal" data-target="#bs-example-modal-lg">
                                                <i class="mdi mdi-cash-usd-outline mr-2 font-18 text-muted vertical-middle"></i>
                                                Assign Tasks
                                            </a>
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





<!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                <form class="form" action="?module=grn_interco&action=process" method="post">

                    <table class="table table-sm mb-0 table-hover table-stripped">
                        <thead>
                            <tr>
                                <!-- <th> <span class="fa fa-check"></span> </th> -->
                                <th>Task Name</th>
                                <th>Assigned To</th>
                                <th>Tasks</th>
                                <th>Done</th>
                                <th>New Assignemnt</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                            <tbody id="droparea">

                                <!-- <tr>
                                    <td> <input class='custom-control' type='checkbox' name='' value=''> </td>
                                    <td>Product Name</td>
                                    <td>25</td>
                                    <td><span class='fa fa-check'></span></td>
                                </tr> -->

                            </tbody>
                    </table>
                    _______________________________________________<br><br>
                    <button class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





</div> <!-- container -->


<script type="text/javascript">
    
    function getordertickets(obj) {
        var orderid = $(obj).attr("data-id");
        // console.log(orderid);

        $("#myLargeModalLabel").empty();


        $.get("?module=tickets&action=getordertickets&format=json&orderid="+orderid,null,function(data){
            var ticketsdata = eval(data);
            // console.log(ticketsdata);

            var carname = ticketsdata[0].details[0].brandName +" "+ ticketsdata[0].details[0].carYear +" "+ ticketsdata[0].details[0].makeName;
            // console.log(carname);

            var modalTitle = $("#myLargeModalLabel");
            modalTitle.append(carname);
            $("#droparea").empty();
            $.each(ticketsdata[0].details,function(index,value){

                

                if (value.hasFiles == 1) {
                    var fileicon = "<i class='mdi mdi-file-upload mdi-24px vertical-middle text-danger'></i>";
                }else{
                    var fileicon = "";
                }

                if (value.hasPayments == 1) {
                    var payicon = "<i class='mdi mdi-cash-plus mdi-24px vertical-middle text-success'></i>";
                }else{
                    var payicon = "";
                }

                if (value.done == 1) {
                    var doneicon = "<i class='mdi mdi-check-bold mdi-24px vertical-middle text-success'></i>";
                    var readonly = "disabled";
                }else{
                    var doneicon = "<i class='mdi mdi-close mdi-24px vertical-middle text-danger'></i>";
                    var readonly = "";
                }



               var users = "<select "+readonly+" data-id='"+value.id+"' onchange='updatetaskuser(this)' class='form-control col-md-12'>"+
                                "<option selected disabled value='"+value.assignedto+"'> "+value.assignedTo+"</option>"+
                                <?
                                    foreach ($users as $key => $U) {?>
                                        "<option value='<?=$U['id']?>'><?=$U['name']?></option>"+
                                    <?}
                                ?>
                            "</select>";

                var ticket  = "<tr class='leaddetails fadee' for='check"+index+"'>"+
                                    "<td>"+value.statusName+"</td> "+
                                    "<td class='text-success'>"+value.assignedTo+"</td> "+
                                    "<td>"+fileicon+" &nbsp; "+payicon+"</td> "+
                                    "<td>"+doneicon+"</td> "+
                                    "<td>"+users+"</td> "+
                              "</tr>";
                // console.log(ticket);
                    setTimeout(function(){
                    $("#droparea").append(ticket);
                },200 * index);

            })

        })
    }



   



function updatetaskuser(object) {
    var ticketid = $(object).attr("data-id");
    var userid = $(object).val();

    $.get('?module=tickets&action=updateasignedtask&format=json&ticketid='+ticketid+'&userid='+userid,null, function(details){
        var response = eval(details);
        // console.log(response);
    })

    // console.log(userid);
}


</script>
