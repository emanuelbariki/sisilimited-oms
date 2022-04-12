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
                <h4 class="page-title">Add New Lead</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div> -->
                    <div class="col-md-12">
                        <form action="<?=url('leads','add')?>" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="clientname" class="col-form-label">Client Name</label>
                                    <input type="text" class="form-control" id="clientname" placeholder="Client Name" name="lead[clientname]" value="<?=$clientname?>">
                                    <input type="hidden" class="form-control" id="" placeholder="Client Name" name="lead[id]" value="<?=$id?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clientphone" class="col-form-label">Client Phone</label>
                                    <input type="text" class="form-control" id="clientphone" placeholder="Client Phone" name="lead[clientphone]" value="<?=$clientphone?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clientemail" class="col-form-label">Client Email</label>
                                    <input type="text" class="form-control" id="clientemail" placeholder="Client Email" name="lead[clientemail]" value="<?=$clientemail?>">
                                </div>
                            </div>

                            <div class="orm-group col-md-12">
                                <div type="button" class="btn btn-primary btn-block text-white" onclick="addrow(this);">Add Car <span class="fe-plus-circle"></span> </div><br>
                            </div>

                            <div class="group" style="border-top:1px solid #fc3;">
                            
                                <div class="row">
                                    <div class="col-md-12" style="border-bottom:1px solid #fc3;">
                                        <!-- <br> -->

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="carname" class="col-form-label">Car Name</label>
                                                <select class="form-control select2" name="carid[]">
                                                    <option selected disabled>Select Car</option>
                                                    
                                                    <?
                                                    if(!empty($cars)){
                                                        foreach ($cars as $p){?>
                                                            <option value="<?=$p['id']?>" <?if($p['id'] == $carid){echo "selected";}?>><?=$p['brandName']?> - <?=$p['makeName']?> - <?=$p['year']?></option>
                                                        <?}
                                                    }else{?>
                                                        <option disabled>List is empty</option>
                                                    <?}?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="dealerlink" class="col-form-label">Dealer Link</label>
                                                <input type="text" class="form-control" id="dealerlink" placeholder="https://jan-japan.com?cars&make=toyota..." name="link[]" value="<?=$link?>">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="amaount" class="col-form-label">Amount</label>
                                                <input type="number" class="form-control" id="amaount" placeholder="16,000,000" name="amount[]" value="<?=$amount?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="carname" class="col-form-label">Lead Status</label>
                                                <select class="form-control select2" name="statusid[]">
                                                    <option selected disabled>Select Status</option>
                                                    
                                                    <?
                                                    if(!empty($cars)){
                                                        foreach ($statuslist as $p){?>
                                                            <option value="<?=$p['id']?>" <?if($p['id'] == $statusid){echo "selected";}?>><?=$p['name']?></option>
                                                        <?}
                                                    }else{?>
                                                        <option disabled>List is empty</option>
                                                    <?}?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="file" class="custom-file-input" id="image" name="image[]">
                                                <label class="custom-file-label" for="image">Choose Image</label>
                                            </div>

                                            <div class="form-group col-md-6 pull-right">
                                                <a href="#" class="btn btn-danger pull-right" onclick="rmvrow(this);"> <span class="fe-x-circle" ></span> </a>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>

                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Lead</button>
                        </form>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->





    </div>
    <!-- end row -->

</div> <!-- container -->


















<script>
 function addrow(obj) {
    var parent = $(obj).closest("form");
    var group = $(parent).find(".group");

    var row = "<div class='row fadee'>"+
                "<div class='col-md-12'  style='border-bottom:1px solid #fc3;'>"+
                    "<div class='form-row'>"+
                    "<div class='form-group col-md-6'>"+
                        "<label for='carname' class='col-form-label'>Car Name</label>"+
                        "<select class='form-control select2' name='carid[]'>"+
                            "<option selected disabled>Select Car</option>"+
                            <? if(!empty($cars)){
                                foreach ($cars as $p){?>
                                    "<option value='<?=$p['id']?>' <?if($p['id'] == $carid){echo 'selected';}?>><?=$p['brandName']?> - <?=$p['makeName']?> - <?=$p['year']?></option>"+
                                <?}
                            }else{?>
                                "<option disabled>List is empty</option>"+
                            <?}?>
                        "</select>"+
                    "</div>"+
                    "<div class='form-group col-md-6'>"+
                        "<label for='dealerlink' class='col-form-label'>Dealer Link</label>"+
                        "<input type='text' class='form-control' id='dealerlink' placeholder='https://jan-japan.com?cars&make=toyota...' name='link[]' value='<?=$link?>'>"+
                    "</div>"+
                "</div>"+

                "<div class='form-row'>"+
                    "<div class='form-group col-md-6'>"+
                        "<label for='amaount' class='col-form-label'>Amount</label>"+
                        "<input type='number' class='form-control' id='amaount' placeholder='16,000,000' name='amount[]' value='<?=$amount?>'>"+
                    "</div>"+

                    "<div class='form-group col-md-6'>"+
                        "<label for='carname' class='col-form-label'>Lead Status</label>"+
                        "<select class='form-control select2' name='statusid[]'>"+
                            "<option selected disabled>Select Status</option>"+
                            <?
                            if(!empty($cars)){
                                foreach ($statuslist as $p){?>
                                    "<option value='<?=$p['id']?>' <?if($p['id'] == $statusid){echo 'selected';}?>><?=$p['name']?></option>"+
                                <?}
                            }else{?>
                                "<option disabled>List is empty</option>"+
                            <?}?>
                        "</select>"+
                    "</div>"+
                "</div>"+
                "<div class='form-row'>"+
                    "<div class='form-group col-md-6'>"+
                        "<input type='file' class='custom-file-input' id='image' name='image[]'>"+
                        "<label class='custom-file-label' for='image'>Choose Image</label>"+
                    "</div>"+
                    "<div class='form-group col-md-6 pull-right'>"+
                        "<a href='#' class='btn btn-danger pull-right' onclick='rmvrow(this);'> <span class='fe-x-circle' ></span> </a>"+
                    "</div>"+
                "</div>";

                
        $(group).append(row);
 }


 function rmvrow (obj) {
        var parent = $(obj).closest(".row");
        var length = $(".group").find(".row");
        
        if (length.length > 1 ) {
            $(parent).remove();
        }else{

        }
    }
 
 </script>



















 