<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8" />
<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
<!-- <link rel="icon" type="image/png" href="../../assets/img/favicon.png"> -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Select CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css" rel="stylesheet">
<title>
Mapping
  </title>
    <style>
        
        .loan-type-table {
            width: 100%;
            border-collapse: collapse;
        }
        .loan-type-table th, .loan-type-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
     
        
</style>


</head>
<body>

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary card-header-icon">
<div class="card-icon">
<i class="material-icons">assignment</i>
</div>
<h4 class="card-title">Loan Type Details</h4>
</div>
<div class="card-body">
<div class="toolbar">

</div>
<!-- <h7>Manage Product Group -> Bank_Loan Type -> Loan Type Details</h7> -->
<li class="breadcrumb-item"><a href="<?php echo base_url('admin/header/manage_product_group'); ?>">Manage Product Group</a>><a href="<?php echo base_url('admin/header/get_bank_loan_types/' . urlencode($product_id)); ?>">Bank Loan Type</a>>Loan Type Details</li>
<div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <div class="button-container">
        <div class="container">
        <!-- <h2 class="text-center mb-4">Loan Type Details</h2> -->
        <table class="loan-type-table">
            <thead>
                <tr>
                    <th>Loan Type</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($product_groups as $product_group): 
                    $loan_type_name = htmlspecialchars($product_group['loanType_name']);
                    $id = htmlspecialchars($product_group['product_group_id']); // Use the aliased column name
                ?>
                <tr>
                    <td><?php echo $loan_type_name; ?></td>
                    <td>
                        <a href="<?php echo base_url('admin/header/edit_product_group/' . urlencode($id)); ?>" class="btn btn-primary">Edit </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
