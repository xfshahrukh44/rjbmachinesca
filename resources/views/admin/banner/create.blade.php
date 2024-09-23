@extends('layouts.app')
@push('before-css')
  <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
@endpush
@section('content')
<style>
.media-box .media {
    height: 150px;
    width: 350px;
    border: 1px solid #000;
    margin: 2px;
}
</style>
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Create New Banner</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" href="{{url('admin/dashboard')}}">Home</li>
                    <li class="breadcrumb-item"><a href="{{url('admin/banner')}}">Banner Management</a></li>
                    <li class="breadcrumb-item active">Create New Banner</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
  <section id="basic-form-layouts">
      <div class="row match-height">
          <div class="col-md-7">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title" id="basic-layout-form">Banner Info</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                              <li><a data-action="close"><i class="ft-x"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-content collapse show">
                      <div class="card-body">
                          <form class="form" enctype="multipart/form-data" method="post" action="{{route('admin.banner.store')}}">
                              @csrf
                              <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input class="form-control" required="required" name="title" type="text" id="title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title">Order</label>
                                                <select class="form-control" id="order_by" name="order_by">
                                                    @php
                                                        $order = App\Banner::all();
                                                    @endphp
                                                    @foreach($order as $key => $value)
                                                    <option value="{{ $key+1 }}">{{ $key+1 }}</option>
                                                    @endforeach
                                                    <option value="{{ count($order)+1 }}">{{ count($order)+1 }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <!-- Modal -->
                                            <div class="modal fade" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                $media = App\Models\Bannermedia::all();
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
                                                <label for="summary-ckeditor">Banner Image</label>
                                                <div class="pt-2 pb-2">
                                                    <button type="button" id="uploadNew" class="btn btn-primary mr-2">Upload new Image</button>
                                                    <button type="button" id="uploadExisting" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#mediaModal">Upload from Media</button>
                                                </div>
                                                <div class="newImage">
                                                    <div class="upload-photo">
                                                        <input type="file" name="image" id="input-file-now" class="dropify" />
                                                    </div>
                                                </div>
                                                <div class="mediaImage">
                                                    <img src="" id="media_imageshow" alt="" height="200" width="400">
                                                    <input class="form-control" name="imageExist"  accept=".jpg, .jpeg, .png, .gif" type="hidden" id="media_image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="summary-ckeditor">Description</label>
                                                <textarea name="description" id="summary-ckeditor" cols="30" rows="10" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions text-right pb-0">
                                        <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Add
                                        </button>
                                    </div>
                              </div>


                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-5">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title" id="basic-layout-colored-form-control">Information</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                              <li><a data-action="close"><i class="ft-x"></i></a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="card-content collapse show">
                      <div class="card-body">
                          <div class="card-text">
                              @if ($errors->any())
                              <ul>
                                @foreach ($errors->all() as $error)
                                  <li class="alert alert-danger">
                                      {{ $error }}
                                  </li>
                                @endforeach
                              </ul>
                              @endif
                              @if(Session::has('message'))
                              <ul>
                                  <li class="alert alert-success">
                                      {{ Session::get('message') }}
                                  </li>
                              </ul>
                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection
@push('js')
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>
  <script>
      $(function() {
          $('.dropify').dropify();
      });
  </script>
@endpush
