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
        .bank-type-row {
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

<li class="breadcrumb-item"><a href="<?php echo base_url('admin/header/manage_product_group'); ?>">Manage Product Group</a>>Bank Loan Type</li>
<div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
        <div class="button-container">
        <!-- <a href="<?php echo site_url('header/add_product_group'); ?>"><button>Add Product Group</button></a> -->
        </div>
            <thead>
                <tr>
                    
                    <th>Bank</th>
                    <th>Loan Types</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php 
$current_banks = '';
$loanType = [];
$bank_id = '';
$product_id = '';

// Iterate over the banks_with_loan_types data
foreach ($banks_with_loan_types as $entry) {

    // Check if we're switching to a new bank
    if ($entry->bank_name !== $current_banks) {

        // Print previous bank details if not the first entry
        if ($current_banks !== ''): ?>
            <tr class="bank-type-row">
                <td><?php echo htmlspecialchars($current_banks); ?></td>
                <td>
                    <ul class="bank-list">
                        <?php foreach ($loanType as $loan_type): ?>
                            <li><?php echo htmlspecialchars($loan_type); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- Use the last known product_id and bank_id -->
                    <a href="<?php echo base_url('admin/header/getLoanTypeData/' . urlencode($product_id) . '/' . urlencode($bank_id)); ?>" class="view-details-button">View Details</a>
                </td>
            </tr>
        <?php endif;

        // Start new bank section
        $current_banks = $entry->bank_name;
        $loanType = [];
        $bank_id = $entry->bank_id;
        $product_id = $entry->product_id; // Ensure this is correctly set
    }

    // Collect loan types for the current bank
    $loanType[] = $entry->loanType_name;
}

// Print the last bank section
if ($current_banks !== ''): ?>
    <tr class="bank-type-row">
        <td><?php echo htmlspecialchars($current_banks); ?></td>
        <td>
            <ul class="bank-list">
                <?php foreach ($loanType as $loan_type): ?>
                    <li><?php echo htmlspecialchars($loan_type); ?></li>
                <?php endforeach; ?>
            </ul>
            <!-- Use the last known product_id and bank_id -->
            <a href="<?php echo base_url('admin/header/getLoanTypeData/' . urlencode($product_id) . '/' . urlencode($bank_id)); ?>" class="view-details-button">View Details</a>
        </td>
    </tr>
<?php endif; ?>


                
        </tbody>
        </table>
    </div>
</div>
</div>
