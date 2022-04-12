<style>
.leadimg{
    width: 30px;
    height: 30px;

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
                <h4 class="page-title">All Tickets</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">       
        <?
            
                foreach ($workdone as $id => $R) {
                    // $image = $Orders->get($R['orderid']);
                    if ($R['done'] == 1) {
                        $bg = 'success';
                        $link = "#";
                    }else {
                        $bg = 'danger';
                        $link = "?module=tickets&action=list&orderid=".$R['orderid']."&ticketid=".$R['id'];
                    }
                    ?>
                    <div class="col-md-6 col-xl-3">
                        <a href="<?=$link?>">
                            <div class="widget-rounded-circle card-box bg-<?=$bg?>">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="assets/images/products/1607449141-MF-375-Tractor-price.jpg" class="img-fluid img-thumbnail force-circle" alt="user-img" style="border-radius: 50%;">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="mb-1 mt-2 text-white font-16"><?=$R['statusName']?></h5>
                                        <p class="mb-2 text-white-50"><?=$R['brandName']?> <?=$R['makeName']?> <?=$R['carYear']?></p>
                                        <p class="mb-2 text-white"><span class="fa fa-user"></span> &nbsp; <?=$R['assignedTo']?></p>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </a>
                    </div> <!-- end col-->
                <?}
        ?>
    </div>
    <!-- end row -->
        


    <!--  Modal content for the Large example -->
    <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Single Order</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                <form class="form" action="?module=grn_interco&action=process" method="post">

                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <!-- <th> <span class="fa fa-check"></span> </th> -->
                                <th>Car Image</th>
                                <th>Car Name</th>
                                <th>Amount</th>
                                <th>leadStatus</th>
                                <th>Action</th>
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
                    <button type="submit" class="btn btn-primary btn-sm">Process GRN</button>
                </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div> <!-- container -->


<script>
    function getleaddetails(obj) {
        var leadid = $(obj).attr("data-id");
        console.log(leadid);


        $.get("?module=leads&action=getleaddetails&format=json&leadid="+leadid,null,function(data){
            var leaddetails = eval(data);
            console.log(eval(leaddetails));
            $("#droparea").empty();
            $.each(leaddetails[0].details,function(index,value){
                // console.log(value.detailProcessed);
                if (value.statusid == 3) {
                    var action = "<input id='check"+index+"' onclick='grndetailsid(this);' class='custom-control' type='checkbox' name='id[]' value='"+value.id+"'>";
                    var icon = "circle";
                }else {
                    // var action = "<span class='fa fa-check text-success'></span>";
                    var action = "<span class='fa fa-check text-success'></span> &nbsp;<span class='far fa-window-close text-danger'></span>";
                    var icon = "check";
                }
                var leaddata = "<tr class='leaddetails fadee' for='check"+index+"'><td> <img class='avatar-md rounded-circle leadimg' src='assets/images/products/"+value.image+"' </td> <td>"+value.brandName+" "+value.makeName+" "+value.year+"</td> <td>"+value.amount+"</td> <td>"+value.leadStatus+"</td> <td>"+action+"</td> </tr>";
                // console.log(leaddata);
                    setTimeout(function(){
                    $("#droparea").append(leaddata);
                },200 * index);

            })

        })

    }
</script>
