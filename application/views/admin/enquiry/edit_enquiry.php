
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

<table>
<div class="details-view">
        <?php if (!empty($record)): ?>
            <!-- <h1>Details for ID: <?php //echo htmlspecialchars($data['id']); ?></h1> -->
            <ul>
                <li><strong>Name:</strong> <?php echo htmlspecialchars($record->name); ?></li>
                <li><strong>Company Name:</strong> <?php echo htmlspecialchars($record->c_name); ?></li>
                <li><strong>Nature Of Business:</strong> <?php echo htmlspecialchars($record->nature_of_business); ?></li>
                <li><strong>Sector:</strong> <?php echo htmlspecialchars($record->sector); ?></li>
                <li><strong>Estimated Turnover:</strong> <?php echo htmlspecialchars($record->estimatedTurnover); ?></li>
                <li><strong>Funding Purpose:</strong> <?php echo htmlspecialchars($record->fundingPurpose); ?></li>
                <li><strong>Loan Type:</strong> <?php echo htmlspecialchars($record->loanType); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($record->email); ?></li>
                <li><strong>Phone Number:</strong> <?php echo htmlspecialchars($record->pnumber); ?></li>
                <li><strong>Advisory Needed:</strong> <?php echo htmlspecialchars($record->advisory_needed); ?></li>
            </ul>
            <center><a href="<?php echo base_url(); ?>admin/header/view_enquiry" class="back-button">Back to List</a></center>
        <?php else: ?>
            <p>No details available.</p>
            <a href="<?php echo base_url(); ?>admin/header/view_enquiry" class="back-button">Back to List</a>
        <?php endif; ?>
    </div>

</div>
</div>


</tbody>
</table>
</div>
</div>

</div>

</div>

</div>

</div>
</div>