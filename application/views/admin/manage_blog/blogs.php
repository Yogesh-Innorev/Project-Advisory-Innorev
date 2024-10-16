<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Loan Type</title>
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
                        <h4 class="card-title">Manage Blog</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>


                        <div class="material-datatables">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <div class="button-container" style="float: right;">
                                    <a href="<?php echo site_url('admin/blog/add_blog'); ?>"><button type="button" class="btn btn-primary">Add Blog</button></a>
                                </div>
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Blog Title</th>
                                        <th>Blog Description</th>
                                        <th>Blog Category</th>
                                        <th>Blog Thumbnail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $this->db->select('*');
                                        $this->db->from('tbl_blog');
                                        $this->db->order_by('id','desc');
                                        $q = $this->db->get();
                                        $data = $q->result_array();
                                        $i = 1;
                                        foreach ($data as $value){
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td valign="top"><?php echo limitWords($value['title'], 5) ?></td>
                                            <td valign="top"><?php echo limitWords($value['description'], 5); ?></td>
                                            <td><?php echo htmlspecialchars($value['category']); ?></td>
                                            <td> <img src="uploads/blogs/<?php echo $value['image'];?>" style="width: 100px; height: 100px;border-radius: 50%;"></td>
                                            <td valign="top">
                                                <a href="<?php echo base_url('blog/delete/'.$value['id']); ?>" class="btn btn-danger btn-md center-inline-block">Delete</a>
                                                <a href="<?php echo base_url ('blog/edit/'.$value['id']); ?>" class="btn btn-info btn-md center-inline-block">View</a>
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

<script type="text/javascript">
  new DataTable('#datatables');
</script>
<script> 
    setTimeout(function() {
        $('#mydivs').hide('slow');
    }, 2000);
</script>
