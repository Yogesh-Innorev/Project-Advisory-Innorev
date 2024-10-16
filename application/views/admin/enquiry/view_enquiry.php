<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Manage Eligibility</title>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <meta name="description" content="" />
  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
  <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
  <!-- data table cdn -->
  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
  <style>
    .highlighted {
        background-color: #ffff99; /* Light yellow background */
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
                            <h4 class="card-title">EnquiryTable</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">

                            </div>
                            <?php
    // Database configuration
                            $host = 'localhost';
                            $username = 'root';
                            $password = '';
                            $database = 'demo';

    // Create connection
                            $conn = new mysqli($host, $username, $password, $database);

    // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

    // Database query
    $sql = "SELECT * FROM tbl_entries"; // Replace 'your_table' with your actual table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch data into an array
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        $data = [];
    }
    $conn->close();
    ?>

    <div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Company Name</th>
                    <th>Nature Of Business</th>
                    <th>Sector</th>
                    <th>Estimated Turnover</th>
                    <th>Funding Purpose</th>
                    <th>Loan Type</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Advisory Needed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php foreach ($data as $value): ?>
                        <?php
                            // Check if 'advisory_needed' is 'yes' (case-insensitive)
                        $isHighlighted = strtolower(trim($value['advisory_needed'])) === 'yes';
                        $rowClass = $isHighlighted ? 'highlighted' : '';
                        ?>
                        <tr class="<?php echo htmlspecialchars($rowClass); ?>">
                            <td><?php echo htmlspecialchars($value['name']); ?></td>
                            <td><?php echo htmlspecialchars($value['c_name']); ?></td>
                            <td><?php echo htmlspecialchars($value['nature_of_business']); ?></td>
                            <td><?php echo htmlspecialchars($value['sector']); ?></td>
                            <td><?php echo htmlspecialchars($value['estimatedTurnover']); ?></td>
                            <td><?php echo htmlspecialchars($value['fundingPurpose']); ?></td>
                            <td><?php echo htmlspecialchars($value['loanType']); ?></td>
                            <td><?php echo htmlspecialchars($value['email']); ?></td>
                            <td><?php echo htmlspecialchars($value['pnumber']); ?></td>
                            <td><?php echo htmlspecialchars($value['advisory_needed']); ?></td>
                            <td>
                                <!-- <a href="view.php?id=<?php echo htmlspecialchars($value['id']); ?>" class="action-button">View</a> -->
                                <a href="<?php echo base_url('admin/header/edit_enquiry/' . $value['id']); ?>" class="btn btn-info btn-md center-inline-block">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11">No data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>


</tbody>
</table>
</div>
</div>

</div>

</div>
<script type="text/javascript">
  new DataTable('#datatables');
</script>
