<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Edit Blog</title>
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
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 85%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
.back{
  float: right;
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
                            <h4 class="card-title">View Contact Us</h4>
                        <a href="javascript:window.history.go(-1);" class="btn btn-danger back">Back</a>

                        </div>
                        <div class="card-body">
                            <div class="container">
                              <form action="<?php echo base_url() ;?>update_blog/<?= $records->id ;?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-25">
                                    <label for="fname">Blog Title</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="text" id="title" name="title" value="<?php echo $records->name ?>" readonly>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="subject">Blog Description</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="text" id="title" name="title" value="<?php echo $records->email ?>" readonly>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="lname">Blog Category</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="text" id="category" name="category" value="<?php echo $records->phone ?>" readonly>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="lname">Blog Category</label>
                                  </div>
                                  <div class="col-75">
                                    <input type="text" id="category" name="category" value="<?php echo $records->subject ?>" readonly>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-25">
                                    <label for="subject">Blog Description</label>
                                  </div>
                                  <div class="col-75">
                                    <textarea id="description" rows="10" name="description" ><?php echo $records->message ?></textarea>
                                  </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
  new DataTable('#datatables');
</script>
