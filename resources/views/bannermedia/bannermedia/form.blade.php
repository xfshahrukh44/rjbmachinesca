<div class="form-body">
    <div class="row">
		<div class="col-md-12">
            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    <input class="form-control dropify" name="image" type="file" id="image"
                        {{ $bannermedia->image != '' ? "data-default-file = /$bannermedia->image" : '' }}
                        {{ $bannermedia->image == '' ? 'required' : '' }} value="{{ $bannermedia->image }}">
                </div>
            </div>
        </div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
