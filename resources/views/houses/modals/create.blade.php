<!-- Create House Modal -->
<div class="modal fade" id="createHouseModal" tabindex="1" role="dialog" aria-labelledby="createHouseModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createHouseModal">Add New House</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['route' => 'houses.store']) }}
                <div class="modal-body">
                        <div class="form-group mb-0">
                            {{ Form::label('name', 'House Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group mb-0 mt-2">
                            {{ Form::label('gender', 'Gender') }}
                            {{ Form::select('gender', ['male' => 'Male', 'female' => 'Female', 'coed' => 'Co-Ed'], null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group mb-0 mt-2">
                            {{ Form::label('max_occupants', 'Max Occupants') }}
                            {{ Form::number('max_occupants', null, ['class' => 'form-control']) }}
                        </div>
                        
                        <div class="form-group mb-0 mt-2">
                            {{ Form::label('address', 'House Address') }}
                            {{ Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) }}
                        </div>

                        <div class="form-group mb-0 mt-2">
                            {{ Form::label('rent', 'Rent Per Month') }}
                            {{ Form::text('rent', null, ['class' => 'form-control', 'placeholder' => '375.50']) }}
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Add House</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>