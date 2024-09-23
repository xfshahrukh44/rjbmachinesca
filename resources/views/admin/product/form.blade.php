<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::Label('category', 'Select Subcategory:') !!}
                <select data-placeholder="Choose Subcategory..." class="chosen-select" multiple tabindex="3"
                    name="category[]">

                    @php

                        $category = App\Models\Subcategory::all();
                    @endphp
                    @foreach ($category as $value)
                        @php
                            $cat = json_decode($product->category);

                        @endphp
                        <option value="{{ $value->id }}" <?php if ($cat !== null && in_array($value->id, $cat)) {
                            echo 'selected';
                        } ?>>{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('product_title', 'Product Title') !!}
                {!! Form::text(
                    'product_title',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
       
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text(
                    'price',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('stock_inventory', 'Stock Inventory') !!}
                {!! Form::text(
                    'stock_inventory',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control'],
                ) !!}
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
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('is_featured', 'Featured Product?') !!}
                <select class="form-control" name="is_featured" id="is_featured">
                    <option value="1" {{ $product->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $product->is_featured == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('product_type', 'Product Type') !!}
                <select class="form-control" name="product_type" id="product_type">
                    <option value="0" {{ $product->product_type == 0 ? 'selected' : '' }}>Request a Quote
                    </option>
                    <option value="1" {{ $product->product_type == 1 ? 'selected' : '' }}>For Sale</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" id="color_check">
            <div class="form-group">
                {!! Form::label('color_type', 'Color Type') !!}
                <select class="form-control" name="color_type" id="color_type">
                    <option value="0" {{ $product->color_type == 0 ? 'selected' : '' }} disabled>Select Color
                        Type</option>
                    <option value="1" {{ $product->color_type == 1 ? 'selected' : '' }}>Multifunction</option>
                    <option value="2" {{ $product->color_type == 2 ? 'selected' : '' }}>B&amp;W MFP</option>
                    <option value="3" {{ $product->color_type == 3 ? 'selected' : '' }}>Colour MFP</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('short_desc', 'Short Description') !!}
                {!! Form::textarea(
                    'short_desc',
                    null,
                    'required' == 'required' ? ['class' => 'form-control', 'id' => 'summary-ckeditor1'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('quarter_special', 'Quarter Special') !!}
                {!! Form::text(
                    'quarter_special',
                    null,
                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('quarter_special_price', 'Quarter Special Price') !!}
                {!! Form::text(
                    'quarter_special_price',
                    null,
                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('rental_or_lease', 'Rental or Lease') !!}
                {!! Form::text(
                    'rental_or_lease',
                    null,
                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('optional', 'Optional') !!}
                {!! Form::text(
                    'optional',
                    null,
                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('cost_per_page', 'Cost Per Page') !!}
                {!! Form::text(
                    'cost_per_page',
                    null,
                    'required' == 'required' ? ['class' => 'form-control'] : ['class' => 'form-control'],
                ) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('ebrochure', 'Upload eBrochure') !!}
                <input class="form-control dropify" name="ebrochure" type="file" id="ebrochure"
                    {{ $product->ebrochure != '' ? "data-default-file = /$product->ebrochure" : '' }}
                    value="{{ $product->ebrochure }}">
            </div>
        </div>
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLongTitle">Media</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @php
                                $media = App\Models\Medium::all();
                            @endphp
                            <div class="media-box">
                                @foreach ($media as $item)
                                    <div class="media">
                                        <input type="radio" name="media_image" value="{{ $item->image }}"/>
                                        <img src="{{ asset($item->image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="showMedia" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <div class="pt-2 pb-2">
                    <button type="button" id="uploadNew" class="btn btn-primary mr-2">Upload new Image</button>
                    <button type="button" id="uploadExisting" class="btn btn-primary" data-toggle="modal"
                        data-target="#mediaModal">Upload from Media</button>
                </div>
                <div class="newImage">
                    <input class="form-control dropify" name="image" type="file" id="image"
                        {{ $product->image != '' ? "data-default-file = /$product->image" : '' }} value="{{ $product->image }}">
                </div>
                <div class="mediaImage">
                    <img src="" id="media_imageshow" alt="" height="200" width="200">
                    <input class="form-control" name="imageExist"  accept=".jpg, .jpeg, .png, .gif" type="hidden" id="media_image">
                </div>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('additional_image', 'Gallary Image') !!}
                <div class="gallery Images">
                    @foreach ($product_images as $product_image)
                        <div class="image-single">
                            <img src="{{ asset($product_image->image) }}" alt="" id="image_id">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""
                                onclick="getInputValue({{ $product_image->id }}, this);"> <i
                                    class="ft-x"></i>Delete</button>
                        </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="mediagalleryModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title" id="exampleModalLongTitle">Media</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body gallery">
                                @php
                                    $media = App\Models\Medium::all();
                                @endphp
                                <div class="media-box">
                                    @foreach ($media as $item)
                                        <div class="media">
                                            <input type="checkbox" name="media_galleryimage_checkbox[]" value="{{ $item->image }}"/>
                                            <img src="{{ asset($item->image) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="showgalleryMedia" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-2 pb-2">
                    <button type="button" id="uploadgalleryNew" class="btn btn-primary mr-2">Upload new Image</button>
                    <button type="button" id="uploadgalleryExisting" class="btn btn-primary" data-toggle="modal"
                        data-target="#mediagalleryModal">Upload from Media</button>
                </div>
                <div id="imageContainer"></div>
                <div class="newGallery">
                    <input class="form-control dropify" name="images[]" type="file" id="images"
                    {{ $product->additional_image != '' ? "data-default-file = /$product->additional_image" : '' }}
                    value="{{ $product->additional_image }}" multiple>
                </div>
                <input type="hidden" name="mediaGallery[]">

            </div>
        </div>

        {{-- <div class="repeater-default col-md-12">
            <div data-repeater-list="attribute">
                <div data-repeater-item="" class="row">

                    <div class="form-group mb-1 col-sm-12 col-md-3">
                        <label for="email-addr">Attribute</label>
                        <br>
                        <select class="form-control" id="attribute_id" name="attribute_id" onchange="getval(this)">
                            @foreach ($att as $atts)
                                <option value="{{ $atts->id }}">{{ $atts->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-3">
                        <label for="pass">value</label>
                        <br>
                        <select class="form-control value" id="value" name="value">

                        </select>
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-2">
                        <label for="bio" class="cursor-pointer">Price</label>
                        <br>
                        <input type="number" name="v-price" class="form-control" id="price">
                    </div>
                    <div class="form-group mb-1 col-sm-12 col-md-2">
                        <label for="bio" class="cursor-pointer">qty</label>
                        <br>
                        <input type="number" name="qty" class="form-control" id="qty">
                    </div>
                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                        <button type="button" class="btn btn-danger" data-repeater-delete=""> <i
                                class="ft-x"></i>
                            Delete</button>
                    </div>

                    <hr>
                </div>
            </div>
            <div class="form-group overflow-hidden">
                <div class="">
                    <button type="button" data-repeater-create="" class="btn btn-primary">
                        <i class="ft-plus"></i> Add
                    </button>
                </div>
            </div>
        </div> --}}
    </div>
</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
