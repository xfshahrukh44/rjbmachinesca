<!DOCTYPE html>
<html lang="en">
<head>

	<?php
	   $favicon = DB::table('imagetable')->where('table_name', 'favicon')->first();
	?>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin Mintone">
    <meta name="author" content="Admin Mintone">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset(!empty($favicon->img_path)?$favicon->img_path:'')}}">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors.min.css')}}">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-extended.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/colors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/components.min.css')}}">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/palette-gradient.min.css')}}">
    <!-- END: Page CSS-->
    <link href="{{asset('plugins/vendors/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/vendors/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    @stack('before-css')
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
   <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>


    <!-- Custom CSS -->
    <!-- <link href="{{asset('assets/css/style.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('after-css')

</head>
<style>

/*#color_check{*/
/*    display:none;*/
/*}*/
.newImage{
    display: none;
}

.media-box {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

.media-box .media {
    height: 150px;
    width: 150px;
    border: 1px solid #000;
    margin: 2px;
}

.media-box .media:hover {
    border: 3px solid #000;
}

.media-box .media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.media {
    position: relative;
}

.media input {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
}

.modal-body .media-box {
    height: 70vh;
    overflow-y: scroll;
}

.mediaImage{
    display: none;
}

.checked-border {
    border: 3px solid #000 !important;
}

div#imageContainer img {
    height: 150px;
    width: 150px;
}

.newGallery{
    display: none;
}


</style>

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css')}} -->
<!-- ============================================================== -->
@include('layouts.admin.header')

@include('layouts.admin.sidebar')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

@include('layouts.admin.footer')

<!-- BEGIN: Vendor JS-->
<script src="{{asset('assets/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{asset('assets/js/app-menu.min.js')}}"></script>
<script src="{{asset('assets/js/app.min.js')}}"></script>
<script src="{{asset('assets/js/customizer.min.js')}}"></script>

<!-- END: Theme JS-->
<<!-- script src="{{asset('plugins/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/vendors/jquery/spartan-multi-image-picker.min.js')}}"></script>
<script src="{{asset('plugins/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plugins/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/vendors/ps/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/js/waves.js')}}"></script>
<script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
<script src="{{asset('assets/js/custom.min.js')}}"></script>
<script src="{{asset('plugins/vendors/toast-master/js/jquery.toast.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/edituser.js') }}"></script> -->


<script>
    if($('#summary-ckeditor').length != 0){
        CKEDITOR.replace( 'summary-ckeditor' );
    }
    if($('#summary-ckeditor1').length != 0){
        CKEDITOR.replace( 'summary-ckeditor1' );
    }
    if($('#summary-ckeditor2').length != 0){
        CKEDITOR.replace( 'summary-ckeditor2' );
    }
</script>



<script>

    // $(document).ready(function() {
    //     $('#category').select2();
    // });

	 $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif


            @if(\Session::has('flash_message'))
            $.toast({
                heading: 'Info!',
                position: 'top-center',
                text: '{{session()->get('flash_message')}}',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 3000,
                stack: 6
            });
            @endif


        });

        if($('#category option:selected').val() == 1 || $('#category option:selected').val() == 2 || $('#category option:selected').val() == 3){
               $('#color_check').slideDown();
           }

        $('#category').change(function(){
           if($(this).val() == 1 || $(this).val() == 2 || $(this).val() == 3){
               $('#color_check').slideDown();
           }else{
               $('#color_check').slideUp();
           }
        });

    $(document).ready(function() {
        // Add event listener for change event on radio buttons
        $('input[name="media_image"]').change(function() {
            // Remove the 'checked-border' class from all parent divs
            $('.media').removeClass('checked-border');

            // Add the 'checked-border' class to the parent div of the checked radio button
            if ($(this).is(':checked')) {
                $(this).parent('.media').addClass('checked-border');
            }
        });
    });

    $(document).ready(function() {
        // Add event listener for change event on checkboxes
        $('input[name="media_galleryimage_checkbox\\[\\]"]').change(function() {
            // Remove the 'checked-border' class from all parent divs
            $('.media').removeClass('checked-border');

            // Loop through all checkboxes and add 'checked-border' class to their parent divs if checked
            $('input[name="media_galleryimage_checkbox\\[\\]"]').each(function() {
                if ($(this).is(':checked')) {
                    $(this).parent('.media').addClass('checked-border');
                }
            });

            // Initialize an array to store the values of checked checkboxes
            var checkedValues = [];

            // Loop through all checkboxes
            $('input[name="media_galleryimage_checkbox\\[\\]"]').each(function() {
                // Check if the checkbox is checked
                if ($(this).is(':checked')) {
                    // If checked, push the value of the checkbox to the array
                    checkedValues.push($(this).val());
                }
            });

            // Join the array of checked values into a single string separated by comma
            var srcValues = checkedValues.join(',');

            // Clear previous images in #imageContainer
            $('#imageContainer').empty();

            // Split srcValues into an array of image URLs
            var imageUrls = srcValues.split(',');
            var base_url = "{{ url('/') }}/";
            console.log(imageUrls);
            // Append new <img> elements with src attributes set to the image URLs
            $.each(imageUrls, function(index, imageUrl) {
                var imgElement = $('<img>').attr('src', base_url+imageUrl);
                // var galImage = base_url+imgElement;
                $('#imageContainer').append(imgElement);
            });

            $('input[name="mediaGallery[]"]').val(srcValues);
            // alert($('input[name="mediaGallery[]"]').val());
        });
    });

    $(document).ready(function() {
        $('#media_image').attr('accept', '.jpg, .jpeg, .png, .gif');
    });

	$('#uploadNew').click(function(){
        $('.newImage').slideDown('fast');
    });

    $('#uploadgalleryNew').click(function(){
        $('.newGallery').slideDown('fast');
    });



    $('#uploadExisting').click(function(){
        $('.newImage').slideUp();
        // $('.mediaImage').slideDown('fast');
    });

    $('#uploadgalleryExisting').click(function(){
        $('.newGallery').slideUp();
        // $('.mediaImage').slideDown('fast');
    });

    $('#showMedia').click(function(){
    // Get the value of the selected radio button
        var selectedValue = $('input[name="media_image"]:checked').val();
        var base_url = "{{ url('/') }}/";
        // alert(base_url+selectedValue);
        // Set the src attribute of the image element
        $('#media_imageshow').attr('src', base_url+selectedValue);

        // Set the data-default-file attribute of the image element
        $('#media_image').val(selectedValue);

        // Slide down the image element (assuming it has the class 'mediaImage')
        $('.mediaImage').slideDown('fast');
    });

    // $('#showgalleryMedia').click(function(){
    // // Get the value of the selected radio button
    //     var selectedValue = $('input[name="media_galleryimage_checkbox\\[\\]"]').val();
    //     var base_url = "{{ url('/') }}/";

    //     // Set the src attribute of the image element
    //     //$('#media_imageshow').attr('src', base_url+selectedValue);

    //     // Set the data-default-file attribute of the image element
    //     //$('#media_image').val(selectedValue);

    //     // Slide down the image element (assuming it has the class 'mediaImage')
    //     //$('.mediaImage').slideDown('fast');
    // });






</script>

<script type="text/javascript">
            $(document).ready(function() { $("#e1").select2(); });
</script>

<script type="text/javascript">
            $(document).ready(function() { $("#e2").select2(); });
</script>

<!-- ============================================================== -->
@stack('js')
<style>
.form-group {
    display: flex;
    flex-direction: column;
}

.chosen-container.chosen-container-multi {
    width: 100% !important;
    border: 1px solid #cacfe7;
    padding: 10px;
}

ul.chosen-choices {
    border: none !important;
}
</style>

</body>
</html>
