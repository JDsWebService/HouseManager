<div class="row">
	<div class="col-4">
		<div class="list-group" id="list-tab" role="tablist">
			<a class="list-group-item list-group-item-action active"
			id="list-general-list"
			data-toggle="list"
			href="#list-general"
			role="tab"
			aria-controls="general">
				General Information
			</a>
			<a class="list-group-item list-group-item-action"
			id="list-medical-list"
			data-toggle="list"
			href="#list-medical"
			role="tab"
			aria-controls="medical">
				Medical Information
			</a>
			<a class="list-group-item list-group-item-action"
			id="list-emergency-list"
			data-toggle="list"
			href="#list-emergency"
			role="tab"
			aria-controls="emergency">
				Emergency Information
			</a>
			<a class="list-group-item list-group-item-action"
			id="list-probation-list"
			data-toggle="list"
			href="#list-probation"
			role="tab"
			aria-controls="probation">
				Probation Information
			</a>
			<a class="list-group-item list-group-item-action"
			id="list-dates-list"
			data-toggle="list"
			href="#list-dates"
			role="tab"
			aria-controls="dates">
				Important Dates
			</a>
		</div>
	</div>
	<div class="col-8">
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active"
			id="list-general"
			role="tabpanel"
			aria-labelledby="list-general-list">
				@include('occupants.partials.geninfo')
			</div>
			<div class="tab-pane fade"
			id="list-medical"
			role="tabpanel"
			aria-labelledby="list-medical-list">
				@include('occupants.partials.medicalinfo')
			</div>
			<div class="tab-pane fade"
			id="list-emergency"
			role="tabpanel"
			aria-labelledby="list-emergency-list">
				@include('occupants.partials.emergencyinfo')
			</div>
			<div class="tab-pane fade"
			id="list-probation"
			role="tabpanel"
			aria-labelledby="list-probation-list">
				@include('occupants.partials.probationinfo')
			</div>
			<div class="tab-pane fade"
			id="list-dates"
			role="tabpanel"
			aria-labelledby="list-dates-list">
				@include('occupants.partials.datesinfo')
			</div>
		</div>
	</div>
</div>