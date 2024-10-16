<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Group</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
        }

        .input-box {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .input-box input[type="number"],
        .input-box input[type="text"] {
            flex: 2;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .input-box select {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .input-box button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .input-box button:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 10px;
            color: #333;
            font-size: 1.1em;
        }
        /* Constrain the width of the dropdown */
        .bootstrap-select .dropdown-menu {
            width: 100% !important; /* Ensure the dropdown doesn't exceed the width of its container */
            max-width: 100%; /* Ensure the dropdown doesn't exceed the container's width */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
        }

        /* Optional: Adjust the width of the dropdown toggle */
        .bootstrap-select .dropdown-toggle {
            width: 100%; /* Make the dropdown toggle full-width */
        }

        /* Optional: Adjust dropdown item padding */
        .bootstrap-select .dropdown-menu .dropdown-item {
            padding: 10px 15px; /* Adjust padding for better readability */
        }

        .bootstrap-select .dropdown-menu .dropdown-item.active,
        .bootstrap-select .dropdown-menu .dropdown-item.selected {
            background-color: #007bff;
            color: #fff;
        }

        .bootstrap-select .dropdown-menu .dropdown-item {
            color: #333;
        }

        .remove-button {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }

        .remove-button:hover {
            background-color: #c82333;
        }

        .dynamic-field {
            margin-bottom: 10px;
        }
        .repayment-period-group {
            margin-bottom: 10px;
        }
        .form-control {
    display: block; /* Ensure the element is not hidden */
}
    </style>
</head>
<body>
    <div class="container">
    <form action="<?php echo site_url('admin/header/update_product_group'); ?>" method="post">
        <!-- <form action="<?php echo site_url('header/update_product_group/' . $product_group['id']); ?>" method="post"> -->
         <!-- <form action="<?php echo site_url('header/update_product_group'); ?>" method="post"> -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product_group['id']); ?>">    
        <h2 class="text-center mb-4">Edit Product Group</h2>

            <div class="form-group">
                <label for="product_name">Product:</label>
                <select name="product_name" id="product_name" class="form-control">
                    <option value="">Select Product</option>
                    <?php foreach ($products as $product): ?>
                        <option value="<?php echo htmlspecialchars($product['id']); ?>" <?= $product['id'] == $product_group['product_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($product['product_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="bank_name">Bank:</label>
                <select name="bank_name" id="bank_name" class="form-control">
                    <option value="">Select Bank</option>
                    <?php foreach ($banks as $bank): ?>
                        <option value="<?php echo htmlspecialchars($bank['id']); ?>" <?= $bank['id'] == $product_group['bank_id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($bank['bank_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="loanType_name">Select Loan Type:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="loanType_name[]" id="loanType_name">
                    <?php foreach ($loan_types as $loan_type): ?>
                        <option value="<?= htmlspecialchars($loan_type['id']); ?>" <?= in_array($loan_type['id'], $selected_loan_types) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($loan_type['loanType_name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="eligibility">Select Eligibility:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="eligibility[]" id="eligibility">
                    <?php foreach ($eligibility as $eligibilityies): ?>
                        <option value="<?= htmlspecialchars($eligibilityies['id']); ?>" <?= in_array($eligibilityies['id'], $selected_eligibility) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($eligibilityies['eligibility']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Minimum Quantum of Loan -->
            <div class="form-group">
                <label for="quantum_of_loan">Quantum of Loan</label>
                <div class="input-box">
                <input type="text" id="min_amount" name="min_amount" class="form-control" value="<?php echo htmlspecialchars($min_amount_display); ?>" required min="1" step="any" class="form-control">

                    <select id="min_unit" name="min_unit" required class="form-control">
                        <option value="lakhs">Lakhs</option>
                        <option value="crores">Crores</option>
                    </select>
                    <!-- <input type="number" id="max_amount" name="max_amount" value="<?php echo htmlspecialchars($max_amount_display); ?>" required min="1" step="any" class="form-control"> -->
                    <input type="text" id="max_amount" name="max_amount" class="form-control" value="<?php echo htmlspecialchars($max_amount_display); ?>" required min="1" step="any" class="form-control">
                    <select id="max_unit" name="max_unit" required class="form-control">
                        <option value="crores">Crores</option>
                        <option value="lakhs">Lakhs</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="borrower_margin">Borrower Margin/Contributor:</label>
                <input type="text" id="borrower_margin" name="borrower_margin" value="<?= htmlspecialchars($product_group['borrower_margin']); ?>" placeholder="Enter margin or contributor details" required class="form-control">
            </div>

            <div class="form-group">
            <label for="repayment_period"><strong>Repayment Period</strong></label>
            <div id="repayment_period">
            <?php if (!empty($product_group['repayment_period']) && is_array($product_group['repayment_period'])): ?>
            <?php foreach ($product_group['repayment_period'] as $index => $period): ?>
                <div class="repayment-period-group">
                    <input type="text" name="repayment_period[]" value="<?= htmlspecialchars($period); ?>" placeholder="Repayment Period <?= $index + 1 ?>" class="form-control mb-2">
                    <button type="button" class="remove-repayment-period btn btn-danger btn-sm">Remove</button>
                </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>No repayment periods available.</p>
            <?php endif; ?>
            </div>
            <button type="button" onclick="addRepaymentPeriod()" class="btn btn-primary mt-2">Add More</button>
            </div>


            <div class="form-group">
                <label for="roi_pricing">ROI/Pricing:</label>
                <input type="text" id="roi_pricing" name="roi_pricing" value="<?= htmlspecialchars($product_group['roi_pricing']); ?>" placeholder="Enter ROI or pricing" required class="form-control">
            </div>

            <div class="form-group">
                <label for="processing_fees">Processing Fees:</label>
                <input type="text" id="processing_fees" name="processing_fees" value="<?= htmlspecialchars($product_group['processing_fees']); ?>" placeholder="Enter processing fees details" required class="form-control">
            </div>

            <div class="form-group">
                <label for="primary_security">Select Primary Security:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="primary_security[]" id="primary_security">
                    <?php foreach ($primary_security as $value): ?>
                        <option value="<?= htmlspecialchars($value['id']); ?>" <?= in_array($value['id'], $selected_primary_security) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($value['primary_security']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="colletural_security">Select Collateral Security:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="colletural_security[]" id="colletural_security">
                    <?php foreach ($colletural_security as $value): ?>
                        <option value="<?= htmlspecialchars($value['id']); ?>" <?= in_array($value['id'], $selected_colletural_security) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($value['collectural_security']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="gurantees">Select Guarantees:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="gurantees[]" id="gurantees">
                    <?php foreach ($gurantees as $value): ?>
                        <option value="<?= htmlspecialchars($value['id']); ?>" <?= in_array($value['id'], $selected_gurantees) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($value['gurantees']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Other T&C:</label>
                <select class="selectpicker form-control" multiple data-selected-text-format="count > 3" data-live-search="true" name="title[]" id="title">
                    <?php foreach ($title as $term): ?>
                        <option value="<?= htmlspecialchars($term['id']); ?>" <?= in_array($term['id'], $selected_terms) ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($term['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.selectpicker').selectpicker();

            $('#repayment_period').on('click', '.remove-repayment-period', function() {
                $(this).parent().remove();
            });
        });

        function addRepaymentPeriod() {
            const container = document.getElementById('repayment_period');
            const index = container.children.length + 1;
            const newGroup = document.createElement('div');
            newGroup.className = 'repayment-period-group';
            newGroup.innerHTML = `
                <input type="text" name="repayment_period[]" placeholder="Repayment Period ${index}" class="form-control mb-2">
                <button type="button" class="remove-repayment-period btn btn-danger btn-sm">Remove</button>
            `;
            container.appendChild(newGroup);
        }
    </script>
</body>
</html>
