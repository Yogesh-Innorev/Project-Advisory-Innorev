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
        
        .button-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .button-container a {
            text-decoration: none;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #003366;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #002244;
        }
        th{
            text: bold;
            color: purple;
        }
        /* .bank-list {
            list-style-type: none;
            margin: 0;
            padding: 0;
        } */
        .bank-list li {
            padding: 5px 0;
        }
        .loan-type-row {
            border-bottom: 1px solid #ddd;
        }
        .view-details-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #003366;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .view-details-button:hover {
            background-color: #0056b3;
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
<h4 class="card-title">Manage Product Group</h4>
</div>
<div class="card-body">
<div class="toolbar">

</div>
<li class="breadcrumb-item"><a>Manage Product Group</a></li>
<div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <div class="button-container">
        <a href="<?php echo site_url('admin/header/add_product_group'); ?>"><button>Add Product Group</button></a>
        </div>
            <thead>
                <tr>
                    <!-- <th>S.No</th> -->
                    <th>Product</th>
                    <th>Banks</th>
                    <!-- <th>View Details</th> -->
                </tr>
            </thead>
            <tbody>
            <?php 
            
            $current_products = '';
            $banks = [];
            $product_id = ''; // Variable to store the current product ID
            
            foreach ($products_with_banks as $entry):
                // Check if the current entry's product name is different from the previous one
                if ($entry->product_name !== $current_products):
                    // Print the previous loan type and banks if not the first entry
                    if ($current_products !== ''): ?>
                        <tr class="loan-type-row">
                            <td><?php echo htmlspecialchars($current_products); ?></td>
                            <td>
                                <ul class="bank-list">
                                    <?php foreach ($banks as $bank): ?>
                                        <li><?php echo htmlspecialchars($bank); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                                <a href="<?php echo base_url('admin/header/get_bank_loan_types/' . urlencode($product_id)); ?>" class="view-details-button">View Details</a>
                            </td>
                        </tr>
                    <?php endif;
            
                    // Start new loan type
                    $current_products = $entry->product_name;
                    $banks = [];
                    $product_id = $entry->product_id; // Set the current product ID
                endif;
            
                // Collect banks for the current loan type
                $banks[] = $entry->bank_name;
            
            endforeach;
            
            // Print the last loan type and banks
            if ($current_products !== ''): ?>
                <tr class="loan-type-row">
                    <td><?php echo htmlspecialchars($current_products); ?></td>
                    <td>
                        <ul class="bank-list">
                            <?php foreach ($banks as $bank): ?>
                                <li><?php echo htmlspecialchars($bank); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="<?php echo base_url('admin/header/get_bank_loan_types/' . urlencode($product_id)); ?>" class="view-details-button">View Details</a>
                    </td>
                </tr>
            <?php endif; ?>
            
                
        </tbody>
        </table>
    </div>
</div>
</div>
