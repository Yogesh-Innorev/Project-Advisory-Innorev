
<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header card-header-primary card-header-icon">
<div class="card-icon">
<i class="material-icons">assignment</i>
</div>
<h4 class="card-title">Edit Eligibility</h4>
</div>
<div class="card-body">
<div class="toolbar">

</div>


<div class="material-datatables">
<div class="container">
<?php echo form_open('admin/products/updateEligibility'); ?>

<?php if ($this->session->flashdata('success')): ?>
    <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
<?php elseif ($this->session->flashdata('error')): ?>
    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<input type="hidden" name="id" value="<?php echo htmlspecialchars($eligibility['id']); ?>">

<div>
    <center><label for="eligibility">Eligibility:</label>
    <input type="text" name="eligibility" id="eligibility" value="<?php echo htmlspecialchars($eligibility['eligibility']); ?>" style="width: 500px;">
    <?php echo form_error('eligibility'); ?>
</div>

<br><center>
<input type="submit" value="Update" class="btn btn-primary">
</center>
    </div>
    </div>
</div>
</div>


</tbody>
</table>
</div>
</div>

</div>

