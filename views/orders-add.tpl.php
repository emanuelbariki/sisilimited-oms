<style>
.car-details{
    display: none;
}
.container-details{
    display: none;
}
.focusInput{
    font-weight: 700;
    border: 3px dashed red;
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
                <h4 class="page-title">Add New Order</h4>
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

                    <?
                        if (!empty($_GET['orderid']) && $help == 1) {?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <b>Dont Forget to add :</b> <br>
                                <ul>
                                    <li>Customer TIN</li>
                                    <li>Customer Address</li>
                                    <li>Customer Email</li>
                                    <li>Customer Phone</li>
                                    <li>Ship Name</li>
                                    <li>From & To Port</li>
                                    <li>ETA & ETD</li>
                                    <li>Order Statuses</li>
                                </ul>
                            </div>
                        <?}
                    ?>

                    <div class="col-md-12">
                        <form action="<?=url('orders','add')?>" method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="consignmenttype" class="col-form-label">Consignemt Type</label>

                                    <?
                                        if ($orderdetails) {?>
                                            <input id="consignmenttype" type="text" readonly class="form-control" name="order[consignment_type]" value="<?=$orderdetails['consignment_type']?>">
                                            <input id="consignmenttype" type="hidden" readonly class="form-control" name="order[order_id]" value="<?=$orderdetails['id']?>">
                                        <?}else {?>
                                            <select class="form-control consignment_type" name="order[consignment_type]" onchange="consignment_details(this);">
                                                <option selected disabled>Consignemt Type</option>
                                                
                                                <?
                                                if(!empty($consignment_types)){
                                                    foreach ($consignment_types as $p){?>
                                                        <option value="<?=$p['id']?>" <?if($p['id'] == $orderdetails['consignment_type']){echo "selected";}?> ><?=$p['name']?></option>
                                                    <?}
                                                }else{?>
                                                    <option disabled>List is empty</option>
                                                <?}?>

                                            </select>  
                                        <?}
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="form-row" id="clientdetails">
                                <div class="form-group col-md-4">
                                    <label for="clientname" class="col-form-label">Client Name</label>
                                    <!-- <input type="text" class="form-control" id="clientname" placeholder="Client Name" name="lead[clientname]" value="<?=$clientname?>"> -->
                                    <select id="clientname" class="form-control" onchange="getclientdetails(this)" onload="getclientdetails(this)" name="order[clientid]" required>
                                        <option value="" selected disabled>&nbsp;</option>
                                        <?
                                        if(!empty($clientsList)){
                                            foreach ($clientsList as $p){?>
                                                <option value="<?=$p['id']?>" <?if($p['id'] == $orderdetails['clientid']){echo "selected";}?>><?=$p['name']?></option>
                                            <?}
                                        }else{?>
                                            <option disabled>List is empty</option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="clientphone" class="col-form-label">Client TIN</label>
                                    <input type="text" class="form-control tin" id="clientphone" placeholder="Client TIN" value="<?=$clientphone?>" style>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="clientaddress" class="col-form-label">Client Address</label>
                                    <input id="clientaddress" type="text" class="form-control address"  placeholder="Client Address" value="<?=$clientemail?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="clientemail" class="col-form-label">Client Email</label>
                                    <input id="clientemail" type="text" class="form-control email"  placeholder="Client Email" value="<?=$clientemail?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="clientphone" class="col-form-label">Client Phone</label>
                                    <input id="clientphone" type="text" class="form-control phone"  placeholder="Client Phone" value="<?=$clientemail?>">
                                </div>
                            </div>

                            <div class="car-details" style="border: 1px dashed #FCC015; border-radius: 5px; padding: 10px;">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="carname" class="col-form-label">Car Name</label>
                                        <select id="carname" class="form-control" name="order[carid]">
                                            <option selected disabled>Select Car</option>
                                            
                                            <?
                                            if(!empty($cars)){
                                                foreach ($cars as $p){?>
                                                    <option value="<?=$p['id']?>"><?=$p['brandName']?> - <?=$p['makeName']?> - <?=$p['year']?></option>
                                                <?}
                                            }else{?>
                                                <option disabled>List is empty</option>
                                            <?}?>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="modelnumber" class="col-form-label">Model Number</label>
                                        <input id="modelnumber" type="text" name="order[modelnumber]" placeholder="Model Number" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="caryear" class="col-form-label">Car Year</label>
                                        <input id="caryear" type="number" name="order[caryear]" placeholder="2004 / 2005 / 2006" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="chasisinoo" class="col-form-label">Chassis No.</label>
                                        <input id="chasisinoo" type="text" name="order[chassis]" placeholder="Chassis No. (JZA80-1004956)" class="form-control" value="">
                                    </div>
                                    
                                    <div class="form-group col-md-2">
                                        <label for="drivetype" class="col-form-label">Drive Type.</label>
                                        <select id="drivetype" class="form-control" name="order[drivetype]">
                                            <option value="2wd">2-WD</option>
                                            <option value="4wd">4-WD</option>
                                            <option value="awd">A-WD</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="color" class="col-form-label">Colour</label>
                                        <input id="color" type="text" name="order[colour]" placeholder="Colour (Blue, Black ..)" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="milage" class="col-form-label">Milage</label>
                                        <input id="milage" type="text" name="order[milage]" placeholder="500000" class="form-control" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="transmission" class="col-form-label">Transmission.</label>
                                        <select id="transmission" class="form-control" name="order[transmission]">
                                            <option value="auto">Auto</option>
                                            <option value="manuel">Manual</option>
                                        </select>
                                        
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="eginesize" class="col-form-label">Egine Size.</label>
                                        <input id="eginesize" type="text" name="order[eginesize]" placeholder="2000 cc" class="form-control" value="">
                                    </div>
                                    
                                </div>
                                
                            </div>

                            <?
                                if ($orderdetails) {?>
                                    <div style="border: 1px dashed #FCC015; border-radius: 5px; padding: 10px;">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="carname" class="col-form-label">Car Name</label>
                                                <select class="form-control" name="order[carid]">
                                                    <option selected disabled>Select Car</option>
                                                    
                                                    <?
                                                    if(!empty($cars)){
                                                        foreach ($cars as $p){?>
                                                            <option value="<?=$p['id']?>" <?if($p['id'] == $orderdetails['carid']){echo "selected";}?> ><?=$p['brandName']?> - <?=$p['makeName']?> - <?=$p['year']?></option>
                                                        <?}
                                                    }else{?>
                                                        <option disabled>List is empty</option>
                                                    <?}?>

                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Model Number</label>
                                                <input type="text" name="order[caryear]" placeholder="Model Number" class="form-control" value="<?=$orderdetails['modelnumber']?>">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Car Year</label>
                                                <input type="number" name="order[caryear]" placeholder="2004 / 2005 / 2006" class="form-control" value="<?=$orderdetails['caryear']?>">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Chassis No.</label>
                                                <input type="text" name="order[chassis]" placeholder="Chassis No. (JZA80-1004956)" class="form-control" value="<?=$orderdetails['chassis']?>">
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Drive Type.</label>
                                                <select class="form-control" name="order[drivetype]">
                                                    <option value="2wd">2-WD</option>
                                                    <option value="4wd">4-WD</option>
                                                    <option value="awd">A-WD</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="carname" class="col-form-label">Colour</label>
                                                <input type="text" name="order[colour]" placeholder="Colour (Blue, Black ..)" class="form-control" value="<?=$orderdetails['colour']?>">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="carname" class="col-form-label">Milage</label>
                                                <input type="text" name="order[milage]" placeholder="500000" class="form-control" value="<?=$orderdetails['milage']?>">
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Transmission.</label>
                                                <select class="form-control" name="order[transmission]">
                                                    <option value="auto">Auto</option>
                                                    <option value="manuel">Manual</option>
                                                </select>
                                                
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label for="carname" class="col-form-label">Egine Size.</label>
                                                <input type="text" name="order[eginesize]" placeholder="2000 cc" class="form-control" value="<?=$orderdetails['eginesize']?>">
                                            </div>
                                            
                                        </div>
                                        
                                    </div>  
                                <?}
                            ?>

                            <div class="container-details">
                                <div class="form-row" style="border: 1px dashed #FCC015; border-radius: 5px; padding: 10px;">
                                    <div class="form-group col-md-3">
                                        <label for="carname" class="col-form-label">Container Size</label>
                                        <select class="form-control" name="order[container_size]">
                                            <option selected disabled>Container Size</option>
                                            <option <?if("4ft" == $orderdetails['container_size']){echo "selected";}?>  value="4ft">4ft</option>
                                            <option <?if("6ft" == $orderdetails['container_size']){echo "selected";}?> value="6ft">6ft</option>
                                            <option <?if("12ft" == $orderdetails['container_size']){echo "selected";}?> value="12ft">12ft</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="carname" class="col-form-label">Container Number</label>
                                        <input placeholder="Container No." class="form-control" name="order[container_no]" value="<?=$orderdetails['container_no']?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="carname" class="col-form-label">Container Goods</label>
                                        <textarea class="form-control" name="order[container_goods]" placeholder="Whats in the Container"><?=$orderdetails['container_goods']?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="carname" class="col-form-label">Ship Name</label>
                                    <input type="text" class="form-control phone"  placeholder="Ship Name" name="order[shipname]" value="<?=$orderdetails['shipname']?>">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="dealerlink" class="col-form-label">From Port</label>
                                    <select class="form-control" name="order[fromport]">
                                        <option selected disabled>Select Port</option>
                                        
                                        <?
                                        if(!empty($ports)){
                                            foreach ($ports as $p){?>
                                                <option <?if($p['id'] == $orderdetails['fromport']){echo "selected";}?> value="<?=$p['id']?>"><?=$p['name']?></option>
                                            <?}
                                        }else{?>
                                            <option disabled>List is empty</option>
                                        <?}?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="dealerlink" class="col-form-label">To Port</label>
                                    <select class="form-control" name="order[toport]" required>
                                    <option selected disabled>Select Port</option>
                                        
                                        <?
                                        if(!empty($ports)){
                                            foreach ($ports as $p){?>
                                                <option <?if($p['id'] == $orderdetails['toport']){echo "selected";}?> value="<?=$p['id']?>"><?=$p['name']?></option>
                                            <?}
                                        }else{?>
                                            <option disabled>List is empty</option>
                                        <?}?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="amaount" class="col-form-label">Departure Date (ETD)</label>
                                    <input type="date" class="form-control" name="order[etd]" value="<?=$orderdetails['etd']?>">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="carname" class="col-form-label">Arrival Date (ETA)</label>
                                    <input type="date" class="form-control" name="order[eta]" value="<?=$orderdetails['eta']?>">
                                </div>
                            </div>
                            <hr>
                            <?
                                if ($orderstatus) {
                                    foreach ($orderstatus as $id => $R) {?>
                                        <div class="checkbox checkbox-danger form-check-inline">
                                            <input type="checkbox" id="Checkbox<?=$id?>" value="<?=$R['id'];?>" checked name="status[]">
                                            <label for="Checkbox<?=$id?>"> <?=$R['name'];?> </label>
                                        </div>
                                    <?}
                                }
                            ?>
                            
                            <hr>
                            
                            <div class="col-md-12" id="copy">
                            <h4 class="panel-title">Consignment Costs</h4>

                            

                            <div class="btn btn-outline-success" id="btnAdd" onclick="addrow(this);"><i class="fa fa-plus"></i> Add row</div><br>&nbsp;
                            <div class="form-row">
                                <!-- <div class="form-group col-md-12">
                                    <input type="text" class="form-control input-lg full-amount" placeholder="Full Ammount" style="text-align: center;font-size: 25px;padding: 10px; font-weight: 900" readonly>
                                </div> -->
                            </div>
                            <!-- <hr> -->
                            <div class="group">
                                <?
                                    if ($ordercosts) {
                                        echo '<label for="inputState" class="col-form-label">Cost</label>';
                                        $fullamount = 0;
                                        foreach ($ordercosts as $key => $C) {
                                            $fullamount = $fullamount + $C['amount'];
                                            ?>
                                            <div class="form-row cost-details fadee">
                                                <div class="form-group col-md-4">
                                                    
                                                    <select class="form-control" name="costid[]" onchange="getproducts(this)">
                                                    <option value="" selected disabled>Select Cost</option>
                                                        <? if ($consignmentcosts) {
                                                        $count = 1;
                                                        foreach ($consignmentcosts as $id => $R) { ?>
                                                            <option <?if($R['id'] == $C['costid']){echo "selected";}?>  value="<?= $R['id'] ?>"><?= $R['name'] ?> - <?= $R['costgroup'] ?></option>
                                                            <?php $count++;
                                                                }
                                                            } else { ?>
                                                            <option value="" disabled>List is Empty</option>
                                                            <? } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <!-- <label for="inputState" class="col-form-label">Amount</label> -->
                                                    <input name="amount[]" class="form-control qty" type="number" placeholder="Amount" value="<?=$C['amount']?>" min="1" onkeyup="cost(this)" />
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <!-- <label for="inputState" class="col-form-label btnRemove">&nbsp;</label> -->
                                                    <button class="form-control btn btn-danger btnRemove" type="button" placeholder="VAT Amount" value="" onclick='rmvrow(this)'>Remove</button>
                                                </div>
                                            </div>
                                        <?}
                                        # code...
                                    }else{?>
                                        <div class="form-row cost-details fadee">
                                            <div class="form-group col-md-4">
                                                <label for="inputState" class="col-form-label">Cost</label>
                                                <select class="form-control" name="costid[]" onchange="getproducts(this)">
                                                <option value="" selected disabled>Select Cost</option>
                                                    <? if ($consignmentcosts) {
                                                    $count = 1;
                                                    foreach ($consignmentcosts as $id => $R) { ?>
                                                        <option value="<?= $R['id'] ?>"><?= $R['name'] ?> - <?= $R['costgroup'] ?></option>
                                                        <?php $count++;
                                                            }
                                                        } else { ?>
                                                        <option value="" disabled>List is Empty</option>
                                                        <? } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState" class="col-form-label">Amount</label>
                                                <input name="amount[]"  class="form-control qty" type="number" placeholder="Quantity" value="1" min="1" onkeyup="cost(this)"/>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="inputState" class="col-form-label btnRemove">&nbsp;</label>
                                                <button class="form-control btn btn-danger btnRemove" type="button" placeholder="VAT Amount" value="" onclick='rmvrow(this)'>Remove</button>
                                            </div>
                                        </div>
                                    <?}
                                ?>
                                

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <!-- <label for="amaount" class="col-form-label" style="text-align: center;">Departure Date (ETD)</label> -->
                                    <input type="text" value="<?=number_format($fullamount)?>" class="form-control input-lg full-amount" placeholder="Full Ammount" style="text-align: center;font-size: 25px;padding: 10px; font-weight: 900" readonly>
                                </div>
                            </div>

                            <hr>
						</div>
                            
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Order</button>

                        </form>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

    </div>
    <!-- end row -->

</div> <!-- container -->

<!-- <script type="text/javascript">    
    // $(function(){
    //     var consignment_type = $('.consignment_type').val;
    //     console.log(consignment_type);
    // });
    
    $(document).load(function(){

        // jQuery methods go here...
        var consignment_type = $('.consignment_type').val;
        console.log(consignment_type);

    });
</script> -->

<script>
   


    function addrow(obj) {
        var parent = $(obj).closest("form");
        var group = $(parent).find(".group");
        // console.log(parent);
        var row = "<div class='form-row cost-details fadee'>"+
                    "<div class='form-group col-md-4'>"+
                        // "<label for='inputState' class='col-form-label'>Cost</label>"+
                        "<select class='form-control' name='costid[]' onchange='getproducts(this)'>"+
                        "<option value='' selected disabled>Select Cost</option>"+
                            <? if ($consignmentcosts) {
                            $count = 1;
                            foreach ($consignmentcosts as $id => $R) { ?>
                                "<option value='<?= $R['id'] ?>'><?= $R['name'] ?> - <?= $R['costgroup'] ?></option>"+
                                <?php $count++;
                                    }
                                } else { ?>
                                "<option value='' disabled>List is Empty</option>"+
                                <? } ?>
                        "</select>"+
                    "</div>"+
                    "<div class='form-group col-md-4'>"+
                        // "<label for='inputState' class='col-form-label'>Amount</label>"+
                        "<input name='amount[]'  class='form-control qty' type='number' placeholder='Quantity' value='1' min='1' onkeyup='cost(this)'/>"+
                    "</div>"+
                    "<div class='form-group col-md-1'>"+
                        // "<label for='inputState' class='col-form-label btnRemove'>&nbsp;</label>"+
                        "<button class='form-control btn btn-danger btnRemove' type='button' placeholder='VAT Amount' value='' onclick='rmvrow(this)'>Remove</button>"+
                    "</div>"+
                "</div>";
        $(group).append(row);
        
    }

    function rmvrow(obj) {
        var parent = $(obj).closest(".cost-details");
        var length = $(".group").find(".cost-details");
        
        if (length.length > 1 ) {
            $(parent).remove();
            cost(length);
        }else{

        }
    }

    // function cost(obj){
    //     var fullamountdiv = $('.full-amount');
    //     var fullamountval = fullamountdiv.val();

    //     var fullAmount = numberWithCommas(fullamountval);
    //     fullamountdiv.val(fullAmount);
    // }




    function cost(obj){
        var grandTotal=0;
        $('.qty').each(function(index,element){
            totalAmount = parseFloat($(element).val());
            grandTotal +=totalAmount;
            $('.full-amount').val(numberWithCommas(grandTotal));
            // $('#grand_base_vatamount').val(numberWithCommas(CalclBaseAmount(grandTotal)))
        });
        $('.full-amount').addClass('focusInput');
        //remove class
        setTimeout(function(){
            $('.full-amount').removeClass('focusInput');
        },1000);
    }

    function consignment_details(obj) {
        var car = $(".car-details");
        var container = $(".container-details");

        var consignment_type  = $(obj).val();

        if (consignment_type == 1) {
            container.hide('slow');
            car.show('slow');
        }else if(consignment_type == 2){
            car.hide('slow');
            container.show('slow');
        }
        // console.log(consignment_type);
    }


    function getclientdetails(obj) {
        var clientid = $(obj).val();
        // console.log(clientid);

        $.get("?module=clients&action=getclientdetails&format=json&id="+clientid,null,function(data){
            var clientdetails = eval(data); // Stringfy

            $.each(clientdetails[0].details, function(index, value){

            var tin = value.tin_no;
            var address = value.address;
            var email = value.email;
            var phone = value.phone;
            // console.log(clientdetails);

            var parent = $(obj).closest("#clientdetails");
            $(parent).find(".tin").val(tin);
            $(parent).find(".address").val(address);
            $(parent).find(".email").val(email);
            $(parent).find(".phone").val(phone);
            });

        });
    }

    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }

</script>