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
                            <h4 class="card-title">Gurantees</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">

                            </div>
                            <div class="material-datatables">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                    <div class="button-container" style="float: right;">
                                        <a href="<?php echo site_url('admin/products/addGurantees'); ?>"><button type="button" class="btn btn-primary">Add Gurantees</button></a>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Gurantees</th>
                    <!-- <th>Action</th>
                        <th>Status</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($gurantees as $value): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($value['id']); ?></td>
                            <td><?php echo htmlspecialchars($value['gurantees']); ?></td>
                        </tr>
                    <?php endforeach; ?>
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
