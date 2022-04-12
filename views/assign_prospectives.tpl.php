<style type="text/css">

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
                <h4 class="page-title">Create New Prospeects</h4>
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

                    <h4 class="header-title mb-0">All Clients <span class="selected badge badge-soft-dark badge-pill"></span> </h4>
                    <hr>
                    <div class="col-md-12" data-simplebar style="max-height: 407px;">

                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Client Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                <?
                                    foreach ($clients as $key => $C) {?>
                                        <tr>
                                            <td scope="row">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" onclick="addclient(this)" class="custom-control-input checkbox" id="<?=$C['id']?>">
                                                    <label class="custom-control-label text-capitalize" for="<?=$C['id']?>"><?=$C['name']?> </label>
                                                </div>
                                            </td>
                                            <td>
                                                <label class="" for="<?=$C['id']?>"><? if (empty($C['phone'])) {echo "NULL";}else{echo $C['phone'];} ?> </label>
                                            </td>
                                            <td>
                                                <label class="" for="<?=$C['id']?>"><? if (empty($C['email'])) {echo "NULL";}else{echo $C['email'];} ?> </label>
                                            </td>
                                        </tr>
                                    <?}
                                ?>
                            </tbody>
                        </table>
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
                    <h4 class="header-title mb-0">Assign Clients</h4><hr>

                    <div id="cardCollpase5" class="collapse pt-3 show">
                            <form action="<?=url('prospectives','save')?>" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="brandname" class="col-form-label">Sales Person</label>
                                        <?
                                            if ($_SESSION['member']['roleid'] == 1) {?>
                                                <select class="form-control" name="p[userid]" >
                                                    <option selected="" disabled=""></option>
                                                    <?
                                                        foreach ($users as $key => $U) {?>
                                                            <option value="<?=$U['id']?>"><?=$U['name']?></option>
                                                        <?}
                                                    ?>
                                                </select>
                                            <?}else{?>
                                                <input type="text" readonly class="form-control text-muted" style="cursor: not-allowed;" value="<?=$_SESSION['member']['name'];?>">
                                                <input type="hidden" readonly name="p[userid]" class="form-control text-muted" style="cursor: not-allowed;" value="<?=$_SESSION['member']['id'];?>">
                                            <?}
                                        ?>
                                        <!-- <input type="text" class="form-control" id="brandname" placeholder="Brand Name" name="brand[name]" value="<?=$name?>"> -->
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="brandname" class="col-form-label">Date</label>
                                        <input type="date" class="form-control" id="brandname" placeholder="Brand Name" name="p[date]" value="<?=$name?>">
                                        <span class="clientsDrop">

                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light text-white" onclick="assign(this);">Assign Prospective</button>

                            </form>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->



    </div>
    <!-- end row -->

</div> <!-- container -->
<script type="text/javascript">
    function addclient(obj) {

        var checkbox = $(obj);
        var parent = checkbox.closest('.tbody');

        var checkboxArray = parent.find('.checkbox');
        // console.log(checkboxArray);
            var no = 0;

        $('.selected').empty();
        $('.clientsDrop').empty();
        $(checkboxArray).each(function(index,value){

            if (value.checked ==  true) {
                // console.log(value.checked);


                var clientid = '<input type="hidden" class="form-control" name="clients[]" value="'+value.id+'">';
                $('.clientsDrop').append(clientid);

                no = no +1;
            }
        });

        if (no == 0) {
            $('.selected').empty();
        }else{
            $('.selected').append(no);
        }
    }



    function assign(obj) {

    }
</script>
