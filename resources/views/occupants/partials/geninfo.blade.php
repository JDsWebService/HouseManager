<div class="form-group">
	<label for="age">Age</label>
	{{ Form::number('age', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="race">Race</label>
	{{ Form::select('race', [
			''					=> 'Not Selected',
			'mixed' 			=> 'Mixed Race',
			'caucasian' 		=> 'Caucasian',
			'native_american' 	=> 'Native American',
			'asian' 			=> 'Asian',
			'pacific' 			=> 'Pacific',
			'african_american' 	=> 'African American',
			'other' 			=> 'Other'
		], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="gender">Gender</label>
	{{ Form::select('gender', ['male' => 'Male', 'female' => 'Female'], null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="phone_number">Phone Number</label>
	{{ Form::text('phone_number', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="nicknames">Nicknames</label>
	{{ Form::text('nicknames', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="date_of_birth">Date of Birth</label>
	{{ Form::date('date_of_birth', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="clean_date">Clean Date</label>
	{{ Form::date('clean_date', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="last_address">Last Known Address</label>
	{{ Form::text('last_address', null, ['class' => 'form-control']) }}
</div>