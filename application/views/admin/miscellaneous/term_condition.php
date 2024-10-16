<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>R.K Advisory</title>
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
                    <div id="mydivs">
                        <?php  echo $this->session->flashdata('message');  ?>
                    </div>
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Manage Term & Condition</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>


                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <div class="button-container" style="float: right;">
                                    <button type="button" class="btn btn-primary" id="prbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop_add">Add Term & Condition</button>
                                </div>
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Body</th>
                                        <th>Send At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $this->db->select('*');
                                        $this->db->from('tbl_term_condition');
                                        $this->db->order_by('id','desc');
                                        $q = $this->db->get();
                                        $data = $q->result_array();
                                        $i = 1;
                                        foreach ($data as $value){
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td valign="top"><?php echo limitWords($value['body'], 15) ?></td>
                                            <td valign="top"><?php echo limitWords($value['created_at'], 5); ?></td>
                                            <td valign="top">
                                                <a href="<?php echo base_url('term_condition/delete/'.$value['id']); ?>" class="btn btn-danger btn-md center-inline-block">Delete</a>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update</button>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
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

<!--Add Topic Modal -->
 <?php
  $this->db->select('*');
  $this->db->from('tbl_term_condition');
  $q = $this->db->get();
  $data = $q->result_array();
  foreach ($data as $value) {
?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-focus="false" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="staticBackdropLabel">Update Term & Condition</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url()?>update_term_condition">
                <div class="mb-3">
                    <textarea  rows="20" class="form-control" name="body" id="body" aria-describedby="topichelp"><?php echo $value['body']; ?></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </div>
<?php } ?>


<div class="modal fade" id="staticBackdrop_add" data-bs-backdrop="static" data-bs-focus="false" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="staticBackdropLabel">Add Term & Condition</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?php echo base_url()?>addterm_condition">
                <div class="mb-3">
                    <textarea  rows="20" class="form-control" name="body_add" id="body_add" aria-describedby="topichelp"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </div>
<script src="assets/admin/assets/table/script.js"></script>

<script src="assets\ckeditor\ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body', {
    // Disable security notifications.
    versionCheck: false
  } );
    CKEDITOR.replace( 'body_add', {
    // Disable security notifications.
    versionCheck: false
  } );
</script>

<script type="text/javascript">
  new DataTable('#datatables');
</script>
<script> 
    setTimeout(function() {
        $('#mydivs').hide('slow');
    }, 2000);
</script>
