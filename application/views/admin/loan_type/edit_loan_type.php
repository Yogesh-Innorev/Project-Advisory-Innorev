
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Edit Loan Type</h4>
                    </div>
                    <div class="card-body">
                        <div class="toolbar">

                        </div>


                        <div class="material-datatables">
                            <div class="container">
                                <?php echo form_open('admin/header/updateLoanType'); ?>

                                <?php if ($this->session->flashdata('success')): ?>
                                    <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
                                <?php elseif ($this->session->flashdata('error')): ?>
                                    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
                                <?php endif; ?>

                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($loanType['id']); ?>">

                                <div>
                                    <center><label for="loanType_name">Loan Type:</label>
                                        <input type="text" name="loanType_name" id="bank_loanType_namename" value="<?php echo htmlspecialchars($loanType['loanType_name']); ?>" style="width:500px;">
                                        <?php echo form_error('loanType_name'); ?>
                                </div>
                                    <br>
                                    <center>
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

</div>
</div>

</div>
</div>
