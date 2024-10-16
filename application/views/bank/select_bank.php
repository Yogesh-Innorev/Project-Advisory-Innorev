<style type="text/css">
    #sections .box{ border-left: 1px solid #3c8dbc;border-right: 1px solid #3c8dbc;border-bottom: 1px solid #3c8dbc;
    }
    .form-control{
        height:0%;
    }
    .form-group{margin-bottom: 20px !important;}
    .manage_divP, .divPadding{padding: 0px !important;}
    .box-body{padding: 10px 0px !important;}
    .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn){width: 100% !important;}
    .btn{ border-radius: 0px !important;}
    .box-header.with-border{border: 0px solid !important;}
    .red{color: red;}
    .select2-search__field{width: 150px;}
    .bootstrap-select.btn-group .dropdown-menu.inner{max-height: 236px !important;}
    .success_msg{               
        width: 280px;                
        min-height: 50px;               
        position: fixed;                 
        top: 50px;                
        right: 0px; 
        background: #4BB543;                   
        color: #fff;                   
        z-index: 1000000;                
        padding: 15px 5px;               
        border: 1px solid #fff;              
        border-radius: 15px;            
    }              
    .set_div_img2{
        text-align: right; cursor: pointer;
    }
    .nav-tabs-custom>.nav-tabs>li.active {border-top-color: #f4f4f4 !important;}
    .nav-tabs-custom>.nav-tabs>li.active>a, .nav-tabs-custom>.nav-tabs>li.active:hover>a {
        background-color: #f4f4f4 !important;
        background: #f4f4f4 !important;
    }
    .manage_divP span.user_err{
        line-height: 12px !important;
        font-size: 13px;
    }
    .chk_div{ width: 30px !important; }
    .text_div{width: calc(100% - 30px); }
    .form-control{height: auto;}
    .set_multiple_no{font-size: 12px; margin-bottom: 2px; }
    .add_div_more, .add_div_more_co, .add_div_more_co_al {
        background: #e7e7e7;
        color: black;
        text-align: center;
        cursor: pointer;
        padding: 7px 0;
    }
    .remove_div_more{
        background: red;
        color: #fff;
        text-align: center;
        cursor: pointer;
        padding: 7px 0;
    }
    .set_top_m5{margin-top: 5px;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-select.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/admin/css/select2.min.css"/>

<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php //echo $page_title; ?></h1>
        <ol class="breadcrumb">
            <!-- <li><a href="<?php //echo base_url('admin/welcome/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li> -->
            <li><a href="<?php //echo base_url('admin/Provisional_lead/'); ?>"><?php //echo $page_title; ?></a></li>
        </ol>
    </section>
    <?php 
        //$user_type = $this->session->userdata('adminData')['user_type'];
        //$user_id = $this->session->userdata('adminData')['userId'];
        // $cus_t_id = $this->uri->segment(5, 0);
        // if($cus_t_id == 0){
        //     $cus_t_id = $this->session->userdata('adminData')['user_type_id'];
        // }
        // if ($user_type == '5') {
        //     $cointing = '10';
        // } else {
        //     $cointing = '200';
        // }
    ?>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- small box -->
                <div class="box box-primary">
                    <div class="nav-tabs-custom" style="cursor: move;">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right ui-sortable-handle">
                            <!-- <li class="pull-left header"><i class="fa fa-inbox"></i>Provisional Lead Customer Type</li> -->
                            <!-- <li class="pull-right header"><a href="javascript:history.go(-1);" style="background: #21acf3db;" class="btn btn-info">Back</a></li> -->
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->
                            <?php //print_r($edit_data); ?>
                            <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: auto;">
                                <form action="<?php echo base_url(); ?>header/select_bank" method="post" id="provisional-leads-form">
                                    <div class="box-body col-xs-12" style="background: #FFF;">
                                        <div class="col-md-12">
                                   <?php //if($customer_type=='1'){ ?>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-xs-12 manage_divP">
                                            <div  class="col-xs-3">
                                                <label for="banks">Bank:</label>
                                            </div>
                                            <div  class="col-xs-6">
                                                <div class="col-xs-12 divPadding set_input_div_w">
                                                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker mng_validation" name="banks" id="banks" onchange="change_bank();">
                                                        <option value="0">Select Bank</option>
                                                        <?php  foreach ($banks as $key => $bank) { ?>
                                                            <option value="<?php echo $bank['id']; ?>"><?php echo $bank['bank_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span id="err_banks" class="error_validator"></span>
                                            </div>
                                            <div  class="col-xs-3">
                                                <a href="<?php echo base_url('admin/bankM/add_bank/').base64_encode('SSAK_provisional'); ?>" class="btn btn-info">Add New Bank</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-xs-12 manage_divP">
                                            <div  class="col-xs-3">
                                                <label for="state">State:</label>
                                            </div>
                                            <div  class="col-xs-6">
                                                <div class="col-xs-12 divPadding set_input_div_w">
                                                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker mng_validation" name="state" id="state" onchange="get_bank_branch();">
                                                        <option value="0">Select State</option>
                                                        <?php  foreach ($states as $key => $state) { ?>
                                                            <option value="<?php echo $state['id']; ?>"><?php echo $state['name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <span id="err_state" class="error_validator"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-xs-12 manage_divP">
                                            <div  class="col-xs-3">
                                                <label for="bank_branchs">Branch:</label>
                                            </div>
                                            <div  class="col-xs-6">
                                                <div class="col-xs-12 divPadding set_input_div_w">
                                                    <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker mng_validation" name="bank_branchs" id="bank_branchs" onchange="get_bank_branch_user();">
                                                        <option value="0">Select Bank Branch</option>
                                                    </select>
                                                </div>
                                                <span id="err_bank_branchs" class="error_validator"></span>
                                            </div>
                                            <div  class="col-xs-3">
                                                <a id="add_banck_branch" href="" class="btn btn-info"> Add New Branch</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-xs-12 manage_divP">
                                            <div  class="col-xs-3">
                                                <label for="customer_id">Bank Manager:</label>
                                            </div>
                                            <div  class="col-xs-6">
                                                <div class="col-xs-12 divPadding set_input_div_w">
                                                   <select data-live-search="true" data-live-search-style="string" class="selectpicker mng_validation" name="customer_id" id="customer_id">
                                                        <option value="0">Select Bank Manager Type</option>
                                                    </select>
                                                </div>
                                                <span id="err_customer_id" class="error_validator"></span>
                                            </div>
                                            <div class="col-xs-3">
                                                <a id="add_banck_branch_manager" href="" class="btn btn-info">Add New Bank Manager</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-2 col-xs-2 manage_divP">
                                        </div>
                                        <div class="form-group col-sm-8 col-xs-8 manage_divP">
                                            <div class="col-xs-12 col-sm-12 set_user_details" style="padding: 15px 0 0;"></div>
                                        </div>
                                    </div>
                                   <?php //}else{ ?>
                                   <div class="row">
                                        <div class="form-group col-sm-12 col-xs-12 manage_divP">
                                            <div  class="col-xs-2">
                                                <label for="bank_branchs">Customer:</label>
                                            </div>
                                            <div  class="col-xs-6">
                                                <div class="col-xs-12 divPadding set_input_div_w">
                                                   <select data-live-search="true" data-live-search-style="string" class="selectpicker mng_validation" name="customer_id" id="customer_ids">
                                                        <option value="0">Select Customer Type</option>
                                                    </select>
                                                </div>
                                                <span id="err_customer_id" class="error_validator"></span>
                                            </div>
                                            <div class="col-xs-4">
                                                
                                                <a id="add_banck_branch_manager2" style="display:none;" href="" class="btn btn-info">Add New Customer</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-2 col-xs-2 manage_divP">
                                        </div>
                                        <div class="form-group col-sm-8 col-xs-8 manage_divP">
                                            <div class="col-xs-12 col-sm-12 set_user_details" style="padding: 15px 0 0;"></div>
                                         </div>
                                    </div>
                                   <?php //} ?>
                                    <div class="row">
                                        <!--<div class="form-group col-sm-6 col-xs-6 ">-->
                                        <!--</div>-->
                                        <div class="form-group col-sm-12 col-xs-12 text-center">
                                            <input type="hidden" name="customer_type_id" id="customer_type_id" value="<?php //echo $customer_type; ?>">
                                            <input type="submit" name="next" value="Skip for now" class="btn btn-primary">
                                            <input type="button" name="next" value="Select" onclick="form_submit();" class="btn btn-info">
                                        </div>
                                    </div>
                                   
                                    </div>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                    </div>
                </div>
            </div><!-- ./col -->  
        </div><!-- /.row -->
        <!-- Main row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
     

 

<!-- check validation -->
<script type="text/javascript">
    

    var set_new_val = '0';
    $(function () {$('.select2').select2()});
    
    function isValidEmailAddress(email01) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(email01);
    }
    
</script>


<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/select2.full.min.js" type="text/javascript"></script>


<script type="text/javascript">

$( document ).ready(function() {
    <?php if($customer_type!='1'){ ?>
    get_customer_list('<?php //echo $customer_type; ?>');
    <?php } ?>
});

function form_submit()
{
    var check=true;
    $(".mng_validation").each(function() {
        if($(this).val()==0&&$(this).attr('id')!=undefined) {
            check=false;
            //console.log($(this).attr('id'));
            $('#err_'+$(this).attr('id')).html('Please select this field');
            $('.error_validator').css('color','red');
        }else{
            $('#err_'+$(this).attr('id')).html('');
        }
    });
    //console.log(check);
    if(check)
    {
        $('#provisional-leads-form').submit();
    }else{
        setTimeout(function(){
            $('.error_validator').html('');
        },3000);
         return false;
    }
   
}
    // function check_bank_customer() 
    // {
    //     var refer_to=$('#refer_to').val();
    //     if(refer_to==2)
    //     {
    //         $('.ss_bank').prop('disabled',true );  
    //     }else{
    //         $('.ss_bank').prop('disabled',false ); 
    //     }
    // }
    
//     $("#provisional-leads-form").submit(function(event){
//      event.preventDefault(); 
//          var formData = new FormData(this);
//          $.ajax({
//              type:'POST',
//              url: "<?php echo base_url(); ?>Admin/Provisional_lead/save",
//              data:formData,
//                 async: false, 
//              dataType:'json',
//              cache:false,
//              contentType: false,
//              processData: false,
//              beforeSend:function()
//              {

//              },
//              success:function(responce)
//              {
//                  if(responce.status)
//                  {
//                      $('#error_validator').show();
//                      $('#error_validator').html(responce.massage);
//                      $(window).scrollTop(0); 
//                      window.location.href = '<?php echo base_url('Admin/Provisional_lead');?>';
//                  }
//              },
//              error:function()
//              {
//                  alert('Error');
                    
//              },
//              complete:function()
//              {
                    
//              }
//          });
//  });


   function get_customer_list(id)
   {
        $('#add_banck_branch_manager2').css('display','block');
        $('#add_banck_branch_manager2').attr('href','<?php echo base_url('Admin/Quickquotation/add_bank_manager/provisional/'); ?>'+id);
        $('.set_user_details').html(' ');
        var get_id = id;
        $('div:visible #customer_type_id').val(get_id);
        var url = '<?php echo base_url('admin/webU/getCustomerLists')?>';
        $.ajax({
            url: url, 
            type: 'post',
            data: {'cus_type_id': get_id}, 
            dataType: 'JSON',
            success: function(res){
                $('#customer_ids').html(res);
                $('.selectpicker').selectpicker('refresh');
            }   
        });
   }
   
   
    function change_bank()
    {
       $('#state').val('<option value="0">Select State</option>'); 
       $('#bank_branchs').val('<option value="0">Select Bank Branch</option>'); 
       $('#customer_id').val('0'); 
       $('.set_user_details').css('display','none');
        var bank_id=$('#banks').val();
       $('#add_banck_branch').attr('href','<?php echo base_url('admin/bankBM/add_bank_branch/'); ?>'+btoa(bank_id)+'/provisional');
       
       $('.selectpicker').selectpicker('refresh');
       
    }

    function get_bank_branch()
    {  
        $('#bank_branchs').html('<option value="0">Select Bank Branch</option>');
        $('.selectpicker').selectpicker('refresh');
        var bank_id=$('#banks').val();
        var state_id=$('#state').val();
        $.ajax({
                url: '<?php echo base_url('admin/webU/getBankBranchLists')?>', 
                type: 'post',
                data: {'bank_id': bank_id,'state_id':state_id}, 
                dataType: 'JSON',
                success: function(res){
                    if(res.length>0){
                    for (var i=0; i<res.length; i++) {
                        var name = res[i].branch_name;
                        var id = res[i].id;
                        //console.log(name+'=='+id);
                        var sel = document.getElementById("bank_branchs");
                        sel.options[sel.options.length] = new Option(name,id);
                    }
                    }else{
                       $('#bank_branchs').html('<option value="0">Select Bank Branch</option>');
                    }
                   $('.selectpicker').selectpicker('refresh');
                   // $('#bank_branchs').html(res);
                    //$('.selectpicker').selectpicker('refresh');
                }   
            });
            $('#add_banck_branch').attr('href','<?php echo base_url('admin/bankBM/add_bank_branch/'); ?>'+btoa(bank_id)+'/provisional');
            $('.selectpicker').selectpicker('refresh');
        
    }
    
    function get_bank_branch_user()
    {
        var bank_id=$('#banks').val();
        var bank_branch_id=$('#bank_branchs').val();
        var get_id = $('div:visible #customer_type_id').val();
        var url = '<?php echo base_url('admin/webU/getCustomerLists')?>';
        if ( get_id == '0') {
            $('#err_customer_type_id').text('Please select customer type.').show();
            setTimeout(function() {
                $('#err_customer_type_id').hide();
            }, 3000);
            $('#customer_type_id').focus();
            return false;
        } else {
            $.ajax({
                url: url, 
                type: 'post',
                data: {'cus_type_id': get_id,'bank_id':bank_id,'bank_branch_id':bank_branch_id}, 
                dataType: 'JSON',
                success: function(res){
                    $('#customer_id').html(res);
                    $('.selectpicker').selectpicker('refresh');
                    
                    
                }   
            });
        } 
        $('#add_banck_branch_manager').attr('href','<?php echo base_url('Admin/Quickquotation/add_bank_manager/provisional/'); ?>'+get_id+'/'+bank_id+'/'+bank_branch_id);
    }
    /* get user details */
    $('#customer_id').on('change', function() {
        var user_id = $(this).val();
        var cat_id = $('div:visible #customer_type_id').val();
        var url_udata = '<?php echo base_url('Admin/Quickquotation/userDetails') ?>';
        if ( user_id == '0') {
            $('#err_customer_id').text('Please select customer.').show();
            setTimeout(function() {
                $('#err_customer_id').hide();
            }, 3000);
            $('#customer_id').focus();
            $('.set_user_details').hide();
            return false;
        } else {
            $.ajax({
                url: url_udata, 
                type: 'post',
                data: {'cat_id': cat_id, 'user_id': user_id}, 
                dataType: 'JSON',
                success: function(data){
                    if (data != '') {
                        $('.set_user_details').html(data).show();
                    }
                }   
            });
        }
        
    });    
    
    $('#customer_ids').on('change', function() {
        var user_id = $(this).val();
        var cat_id = $('#customer_type_id').val();
        var url_udata = '<?php echo base_url('Admin/Quickquotation/userDetails') ?>';
        if ( user_id == '0') {
            $('#err_customer_id').text('Please select customer.').show();
            setTimeout(function() {
                $('#err_customer_id').hide();
            }, 3000);
            $('#customer_id').focus();
            $('.set_user_details').hide();
            return false;
        } else {
            $.ajax({
                url: url_udata, 
                type: 'post',
                data: {'cat_id': cat_id, 'user_id': user_id}, 
                dataType: 'JSON',
                success: function(data){
                    if (data != '') {
                        $('.set_user_details').html(data).show();
                    }
                }   
            });
        }
    }); 
    
    function select_user_details()
    {
        
        var customer_type_id=$('div:visible #customer_type_id').val();
        var managerName=$('#managerName').val();
        var managerOfficialEmail=$('#managerOfficialEmail').val();
        var managerOfficialPhone=$('#managerOfficialPhone').val();
        var banks=$('#banks').val();
        var bank_branchs=$('#bank_branchs').val();
        var bankName=$('#bankName').val();
        var Designation=$('#Designation').val();
        var branchAddress=$('#branchAddress').val();
        var branchIfscCode=$('#branchIfscCode').val();
        if(customer_type_id > 1)
        {
            var bank_manager_id= $('div:visible #customer_ids').val();
            //document.getElementById('quatation_form').reset();
            $('#customer_name').val(managerName);
            $('#customer_email').val(managerOfficialEmail);
            $('#contact_no').val(managerOfficialPhone);
            $('.mng_status').prop('readonly', true);
            $('#bank_name').val('');
            //$('#manager_name').val('');
            //$('#designation').val('');
            //$('#manager_email').val('');
            //$('#manager_phone').val('');
            $('#bank_branch_name').val('');
            $('#bank_ifsc_code').val('');
        }else{
            var bank_manager_id= $('div:visible #customer_id').val();
            $('#customer_name').val('');
            $('#customer_email').val('');
            $('#contact_no').val('');
            $('.mng_status').prop('readonly', false);
            // document.getElementById('quatation_form').reset();
            $('#bank_name').val(bankName);
            //$('#manager_name').val(managerName);
            //$('#designation').val(Designation);
            //$('#manager_email').val(managerOfficialEmail);
            //$('#manager_phone').val(managerOfficialPhone);
            $('#bank_branch_name').val(branchAddress);
            $('#bank_ifsc_code').val(branchIfscCode);
        }
        $('#bank_id').val(banks);
        $('#bank_branch_id').val(bank_branchs);
        $('#bank_manager_id').val(bank_manager_id);
        $('#exampleModalLong').modal('hide');
        $('#exampleModal').modal('hide');
    }
    
</script>