<div class="form-group">
	<label for="probation_officer_name">Probation Officer Name</label>
	{{ Form::text('probation_officer_name', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="probation_officer_phone">Probation Officer Phone Number</label>
	{{ Form::text('probation_officer_phone', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="probation_reason">Probation Reason</label>
	{{ Form::text('probation_reason', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="probation_court_date">Probation Court Date</label>
	{{ Form::date('probation_court_date', null, ['class' => 'form-control']) }}
</div>