
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Add Eligibility</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>


                        <div class="material-datatables">
                            <div class="container">
                                <form action="<?php echo base_url('admin/products/storeEligibility'); ?>" method="post">

                                    <center><label for="eligibility">Eligibility </label>
                                        <input type="text" name="eligibility" id="eligibility" placeholder="Enter eligibility.." style="width:500px;" required>
                                    </center>
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

