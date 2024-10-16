

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Add Bank</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>


                        <div class="material-datatables">
                            <div class="container">
                                <form action="<?php echo base_url('admin/header/store'); ?>" method="post">
                                  <div class="row">
                                      <div class="col">
                                        <label for="exampleInputEmail1">Bank Name</label>
                                        <input type="text" class="form-control"  name="bank_name" id="bank_name" placeholder="Bnak name" aria-label="First name" required>
                                      </div>
                                      <div class="col">
                                        <label for="exampleInputEmail1">Bank Url</label>
                                        <input type="text" class="form-control"  name="bank_url" id="bank_url" placeholder="bank URL" aria-label="Last name" required>
                                      </div>
                                   </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

