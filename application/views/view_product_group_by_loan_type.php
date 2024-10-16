<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Types</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Inter:slnt,wght@-10..0,100..900&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/navbar/use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="<?php echo base_url() ?>assets/navbar/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/index/lib/animate/animate.min.css"/>
    <link href="<?php echo base_url() ?>assets/index/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .container1 {
            max-width: 100%;
            width: 100%;
            padding-left: 10px;
            padding-right: 10px;
            margin: 50px 0;
            overflow-x: auto;
            
            
        }
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;     /* Center vertically */
            min-height: 100vh;       /* Full viewport height */
            background-color: #f4f4f9;
        } */

        .container1 {
            width: 100%;
            max-width: 1200px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Add horizontal scroll if necessary */
        }

        .container1 h1 {
            color: #003366;
            margin: 0 0 20px;
            font-size: 28px;
            text-align: center;
/*            margin-top: 50px;*/
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensures columns are of equal width */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
            color: black;
            vertical-align: top; Aligns text to the top for better readability
            overflow-wrap: break-word; /* Ensure long words break properly */
            word-wrap: break-word; /* For older browsers */
            white-space: normal; /* Allow text to wrap within the cell */
        }

        th {
            background-color: #003366;
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Column width adjustments */
        col:nth-child(3) { /* Eligibility column */
            width: 100px; /* Adjust the width as needed */
        }
        
        /* Optional: Add responsive design for smaller screens */
        @media (max-width: 768px) {
            th, td {
                padding: 8px;
            }
        }
        /* Style for each eligibility item */
        .eligibility-item {
            margin-bottom: 10px; /* Add some space between items */
        }

        
        
    </style>
</head>
<body>
<div class="container1">
<?php $loan_name = $this->db->get_where('kind_of_loan_type',['id'=>$loanType])->row(); ?>
<h1>Products for Loan Type: <?php echo htmlspecialchars($loan_name->loanType_name); ?></h1>
    <table class="loan-type-table">
        <colgroup>
            <col style="width: 150px;"> <!-- Product -->
            <col style="width: 180px;"> <!-- Bank Name -->
            <col style="width: 800px;"> <!-- Eligibility -->
            <col style="width: 200px;"> <!-- Primary Security -->
            <col style="width: 200px;"> <!-- Collectural Security -->
            <col style="width: 200px;"> <!-- Guarantee -->
            <col style="width: 200px;"> <!-- Title -->
            <col style="width: 200px;"> <!-- Quantum of Loan -->
            <col style="width: 200px;"> <!-- Borrower Margin -->
            <col style="width: 200px;"> <!-- Repayment Period -->
            <col style="width: 200px;"> <!-- ROI Pricing -->
            <col style="width: 200px;"> <!-- Processing Fees -->
        </colgroup>
        <thead>
            <tr>
                <th>Product</th>
                <th>Bank Name</th>
                <th>Eligibility</th>
                <th>Primary Security</th>
                <th>Collectural Security</th>
                <th>Guarantee</th>
                <th>Title</th>
                <th>Quantum of Loan</th>
                <th>Borrower Margin</th>
                <th>Repayment Period</th>
                <th>ROI Pricing</th>
                <th>Processing Fees</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <?php $p_name = $this->db->get_where('products', ['id' => $product['product_id']])->row(); ?>
                <td><?php echo htmlspecialchars($p_name->product_name); ?></td>
                <?php $b_name = $this->db->get_where('banks', ['id' => $product['bank_id']])->row(); ?>
                <td><?php echo htmlspecialchars($b_name->bank_name); ?> <br><a href="<?php echo htmlspecialchars($b_name->bank_url); ?>" target="_blank" style="color: #0511f2;font-weight: 700;">View More Details</a> </td>

                <!-- Eligibility -->
                <td>
                    <?php 
                    if (!empty($product['eligibility_ids'])):
                        $items = [];
                        foreach ($product['eligibility_ids'] as $id):
                            $e_name = $this->db->get_where('eligibility', ['id' => $id])->row();
                            if ($e_name):
                                $items[] = '<div class="eligibility-item">' . htmlspecialchars($e_name->eligibility) . '</div>';
                            endif; 
                        endforeach;
                        echo implode(' ', $items); // Output items separated by new lines
                    else: ?>
                        <div>No eligibility data available</div>
                    <?php endif; ?>
                </td>



                <!-- Primary Security -->
                <td>
                    <?php 
                    if (!empty($product['primary_security_data'])):
                        foreach ($product['primary_security_data'] as $data): ?>
                            <div><?php echo htmlspecialchars($data['primary_security']); ?></div>
                        <?php endforeach;
                    else: ?>
                        <div>No primary security data available</div>
                    <?php endif; ?>
                </td>

                <!-- Collectural Security -->
                <td>
                    <?php 
                    if (!empty($product['colletural_security_data'])):
                        foreach ($product['colletural_security_data'] as $data): ?>
                            <div><?php echo htmlspecialchars($data['collectural_security']); ?></div>
                        <?php endforeach;
                    else: ?>
                        <div>No collectural security data available</div>
                    <?php endif; ?>
                </td>

                <!-- Guarantee -->
                <td>
                    <?php 
                    if (!empty($product['gurantees_data'])):
                        foreach ($product['gurantees_data'] as $data): ?>
                            <div><?php echo htmlspecialchars($data['gurantees']); ?></div>
                        <?php endforeach;
                    else: ?>
                        <div>No gurantees data available</div>
                    <?php endif; ?>
                </td>

                <!-- Title -->
                <td>
                    <?php 
                    if (!empty($product['title_data'])):
                        foreach ($product['title_data'] as $data): ?>
                            <div><?php echo htmlspecialchars($data['title']); ?></div>
                        <?php endforeach;
                    else: ?>
                        <div>No title data available</div>
                    <?php endif; ?>
                </td>

                <!-- Quantum of Loan -->
                <td>
                    <?php 
                    $quantum_of_loan = json_decode($product['quantum_of_loan'], true);
                    
                    if (json_last_error() === JSON_ERROR_NONE && is_array($quantum_of_loan)) {
                        $min_amount = isset($quantum_of_loan['min']['amount']) ? htmlspecialchars($quantum_of_loan['min']['amount']) : 'N/A';
                        $min_unit = isset($quantum_of_loan['min']['unit']) ? htmlspecialchars($quantum_of_loan['min']['unit']) : 'N/A';
                        $max_amount = isset($quantum_of_loan['max']['amount']) ? htmlspecialchars($quantum_of_loan['max']['amount']) : 'N/A';
                        $max_unit = isset($quantum_of_loan['max']['unit']) ? htmlspecialchars($quantum_of_loan['max']['unit']) : 'N/A';
                        echo "Minimum: $min_amount $min_unit<br>Maximum: $max_amount $max_unit";
                    } else {
                        echo 'Invalid JSON data';
                    }
                    ?>
                </td>

                <!-- Borrower Margin -->
                <td><?php echo htmlspecialchars($product['borrower_margin']); ?></td>
                <td>
                    <?php 
                    // Decode the JSON data
                    $repayment_periods = json_decode($product['repayment_period'], true);

                    // Check if decoding was successful
                    if (json_last_error() === JSON_ERROR_NONE && is_array($repayment_periods)) {
                        // Format and display the repayment periods
                        echo '<ul>';
                        foreach ($repayment_periods as $period) {
                            echo '<li>' . htmlspecialchars($period) . '</li>';
                        }
                        echo '</ul>';
                    } else {
                        echo 'No repayment periods available';
                    }
                    ?>
                </td>
                <td><?php echo htmlspecialchars($product['roi_pricing']); ?></td>
                <td><?php echo htmlspecialchars($product['processing_fees']); ?></td>
            </tr>
        <?php endforeach; ?> 
        </tbody>
    </table>
</div>
</body>
</html>
