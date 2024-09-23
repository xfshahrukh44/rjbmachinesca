<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('parent', 'Parent') !!}
                <select class="form-control" name="parent">
                    <option value="">Select Parent Category</option>
                    @php
                        $category = App\Category::all();
                    @endphp
                    @foreach ($category as $value)
                        <option value="{{ $value->id }}" {{ ($subcategory->parent == $value->id) ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text(
                    'name',
                    null,
                    '' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($subcategory->image != '') ? "data-default-file = /$product->image" : ''}} {{ ($subcategory->image == '') ? "required" : ''}} value="{{$product->image}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea(
                    'description',
                    null,
                    'required' == 'required'
                        ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required']
                        : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        {{-- <div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('parent', 'Parent') !!}
    	    	{!! Form::text('parent', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    </div>
</div> --}}
    </div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
