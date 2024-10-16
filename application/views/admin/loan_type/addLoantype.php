
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Add Loan Types</h4>
                        </div>
                        <div class="card-body">
                            <div class="toolbar">

                            </div>


                            <div class="material-datatables">
                                <div class="container">
                                    <form action="<?php echo base_url(); ?>admin/header/storeLoanType" method="post">

                                        <center><label for="loanType_name">Loan Type</label>
                                            <input type="text" name="loanType_name" id="loanType_name" style="width:500px;" placeholder="Enter loan type" required></center>
                                            <br>
                                        <center><button type="submit" class="btn btn-primary">Submit</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

