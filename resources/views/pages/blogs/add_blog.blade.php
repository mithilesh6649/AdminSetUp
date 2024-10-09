@extends('adminlte::page')

@section('title', 'Add Blog')

@section('content_header')

    <style type="text/css">
        .text-dangers {
            color: red !important;
        }

        #content_en-error {
            display: block;
            font-weight: 400px !important;
        }

        #content_ar-error {
            display: block;
            font-weight: 400px !important;
        }
    </style>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-sm btn-success back-button"
                            href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
                        <h3>Add Blog</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form id="addBlogsForm" method="POST" action="{{ route('save_blogs') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12 col-12">
                                        <div class="form-group">
                                            <label for="page_title">Title<span class="text-danger">
                                                    *</span></label>
                                            <input type="text" name="title" class="form-control" id="title_en"
                                                maxlength="100">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="section">Content<span class="text-danger">
                                            *</span></label>
                                    <textarea id="content" name="content"></textarea>
                                </div>


                                <div class="form-group mt-3">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                       <option value="1">Active</option>
                                       <option value="0">Deactive</option>
                                    </select>

                                </div>

                                {{-- Add Image Here --}}

                                <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-2 pt-4">
                                    <div class="form-group mt-3">
                                        <label><strong>Blog Image (320X320)</strong></label>
                                    </div>
                                    <div class="row row_justify justify-content-center">


                                        <div class="card-body main_body form p-0">
                                            <div class="upload_img row row_justify justify-content-center">
                                                <div class="new_image img_upload_one" style="display: block "
                                                    style="display:none;">
                                                    <img id="image_pre" src="{{ asset('assets/images/add-image.png') }}"
                                                        alt="">
                                                    <label>Upload Blog Image (320X320)</label>

                                                    <i class="remove_temp_image remove_image_new fa fa-times"
                                                        aria-hidden="true" style="display: none;"></i>
                                                    <input type="file" name="Media_image" id="product_image"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <input type="hidden" name="error_msg" id="error_msg" value="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{--  ------------- --}}

                                {{-- Blog Date And Status --}}

                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group mt-3">
                                            <label class="text-left" for="city">Select Blog Date</label>
                                            <input class="form-control" data-type="date" type="text" id="date"
                                                name="date" value="{{ date('d/m/Y') }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-6 col-xl-6 col-12">
                                        <div class="form-group mt-3">
                                            <label class="text-left" for="city">Select Blog Date Status</label>
                                            <select class="form-control" name="date_status">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                {{-- ------------------- --}}

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="button btn_bg_color common_btn text-white">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>


    <style>
        i.remove_temp_image.remove_image_new.fa.fa-times {
            right: 50px !important;
        }

        .new_image.img_upload_one,.exsist_image.img_upload_one {
            position: relative;
        }
        .new_image.img_upload_one img#image_pre,
        .exsist_image.img_upload_one img {
            width: 80px;
            display: block;
            cursor: pointer;
            margin: 0 auto;
            border: 1px solid #cccccc;
            border-radius: 8px;
            width: 100px;
            height: 100px;
            padding: 10px;
        }
        .new_image.img_upload_one input#product_image {
            position: absolute;
            top: 0px;
            left: 0;
            right: 0;
            margin: 0 auto;
            display: block;
            text-align: center;
            opacity: 0;
            height: 100px;
            cursor: pointer;
            width: 100px;
        }
        .new_image.img_upload_one i.remove_temp_image.remove_image_new.fa.fa-times,
        .exsist_image.img_upload_one i.remove_image.fa.fa-times {
            border-radius: 50px;
            height: 40px;
            width: 40px;
            padding: 9px 11px;
            opacity: 1;
            margin: 0;
            background-color: #F43127;
            border-color: #F43127;
            font-size: 16px;
            color: #ffffff;
            position: absolute;
            font-weight: bold;
            right: -14px;
            top: -10px;
            border: 3px solid #ffffff;
            outline-style: none;
            z-index: 1;
            cursor: pointer;
        }
        .upload_img {
            border: 2px dotted #cccccc;
            height: 200px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            width: 100%;
            margin: 0 auto;
        }
        .new_image.img_upload_one label, .exsist_image.img_upload_one label {
            text-align: center;
            margin-top: 8px;
            font-size: 16px;
            margin-bottom: 0;
            color: #000000;
        }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $("#date").datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: new Date()
        });
    </script>
    
    <script>
        $(document).ready(function() {
            CKEDITOR.replace( 'content', {
                allowedContent : true,
                customConfig: '',

                disallowedContent: 'img{width,height,float}',
                extraAllowedContent: 'img[width,height,align]',

                // Enabling extra plugins, available in the full-all preset: https://ckeditor.com/cke4/presets-all
                extraPlugins: 'tableresize,uploadimage,uploadfile',

            
                // Make the editing area bigger than default.
                height:500,

                // An array of stylesheets to style the WYSIWYG area.
                // Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
                contentsCss: [ 'https://cdn.ckeditor.com/4.8.0/full-all/contents.css', 'mystyles.css' ],

                // This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
                bodyClass: 'document-editor',

                // Reduce the list of block elements listed in the Format dropdown to the most commonly used.
                format_tags: 'p;h1;h2;h3;pre',

                // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
                removeDialogTabs: 'image:advanced;link:advanced',

   
                stylesSet: [
                /* Inline Styles */
                { name: 'Marker', element: 'span', attributes: { 'class': 'marker' } },
                { name: 'Cited Work', element: 'cite' },
                { name: 'Inline Quotation', element: 'q' },

                /* Object Styles */
                {
                    name: 'Special Container',
                    element: 'div',
                    styles: {
                    padding: '5px 10px',
                    background: '#eee',
                    border: '1px solid #ccc'
                    }
                },
                {
                    name: 'Compact table',
                    element: 'table',
                    attributes: {
                    cellpadding: '5',
                    cellspacing: '0',
                    border: '1',
                    bordercolor: '#ccc'
                    },
                    styles: {
                    'border-collapse': 'collapse'
                    }
                },
                { name: 'Borderless Table', element: 'table', styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
                { name: 'Square Bulleted List', element: 'ul', styles: { 'list-style-type': 'square' } }
                ]
            });

            $('#addBlogsForm').validate({
                ignore: [],

                rules: {
                    title_en: {
                        required: true
                    },
                    title_ar: {
                        required: true
                    },
                    content_en: {

                        required: function() {
                            CKEDITOR.instances.content_en.updateElement();
                        },
                        minlength: 10

                    },
                    content_ar: {
                        required: function() {
                            CKEDITOR.instances.content_ar.updateElement();
                        },
                        minlength: 10
                    },
                },
                messages: {
                    title_en: {
                        required: "Title(en) is required"
                    },
                    title_ar: {
                        required: "Title(ar) is required"
                    },
                    content_en: {
                        required: "Content(en) is required"
                    },
                    content_ar: {
                        required: "Content(ar) is required"
                    },
                }
            });




            // $('#addBlogsForm').submit(function(e){
            //       $(".text-dangers").hide();

            //       var title_en = $('#title_en').val().length;
            //       var title_ar = $('#title_ar').val().length;
            //       var thumbnail = $('#thumbnail').val().length;
            //       var banner = $('#banner').val().length;

            //         if(!thumbnail){

            //          $("<span class='text-dangers thumbnail'></span>").insertAfter($("#thumbnail"));
            //             $(".thumbnail").text('Thumbnail is required');
            //             e.preventDefault();
            //       }


            //          if(!banner){

            //          $("<span class='text-dangers banner'></span>").insertAfter($("#banner"));
            //             $(".banner").text('Banner is required');
            //             e.preventDefault();
            //       }

            //       if(!title_en){

            //          $("<span class='text-dangers title_en'></span>").insertAfter($("#title_en"));
            //             $(".title_en").text('Title(en) is required');
            //             e.preventDefault();
            //       }

            //       if(!title_ar){
            //              $("<span class='text-dangers title_ar'></span>").insertAfter($("#title_ar"));
            //             $(".title_ar").text('Title(ar) is required');
            //             e.preventDefault();
            //       }

            //       var content_english = CKEDITOR.instances['content_en'].getData().replace(/<[^>]*>/gi, '').length;
            //         if(!content_english){
            //             $("<span class='text-dangers content_en'></span>").insertAfter($("#content_en"));
            //             $(".content_en").text('Content(en) is required');
            //             e.preventDefault();
            //         }

            //      var content_arabic = CKEDITOR.instances['content_ar'].getData().replace(/<[^>]*>/gi, '').length;
            //         if(!content_arabic){
            //             $("<span class='text-dangers content_ar'></span>").insertAfter($("#content_ar"));
            //             $(".content_ar").text('Content(ar) is required');
            //             e.preventDefault();
            //         }

            // });












        });
    </script>


    <!-- show image on change -->

    <script type="text/javascript">
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail_preview_1').css('display', 'block');
                    $('#thumbnail_preview_1').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail_preview_2').css('display', 'block');
                    $('#thumbnail_preview_2').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!-- show image on change -->

    <script>
        $(document).on('change', '#product_image', function(evt) {

            const [file] = product_image.files
            if (file) {

                if (file.type == "image/png" || file.type == "image/jpeg" || file.type == "image/jpg") {
                    if (file.size > 10546513) {

                        toastr.error("File size should be less then 8 MB");
                    } else {


                        image_pre.src = URL.createObjectURL(file);
                        image_pre.onload = function() {
                            width = image_pre.naturalWidth;
                            height = image_pre.naturalHeight;
                            console.log(width);
                            console.log(height);

                            if (width == 320 && height == 320) {
                                $('#product_image').css('display', 'none');
                                $('#image_pre').css('display', 'block');
                                $('.remove_temp_image').css('display', 'block');
                                $('#error_msg').val('');
                            } else {

                                $('#product_image').css('display', 'none');
                                $('#image_pre').css('display', 'block');
                                $('.remove_temp_image').css('display', 'block');
                                $('#error_msg').val('');

                                // toastr.error(
                                //     'Please upload an image with 320 x 320 pixels dimension'
                                // );
                                // $('#product_image').css('display', 'block');
                                // $('#error_msg').val(1);
                            }
                        }

                    }
                } else {

                    alert("Invalid File type !");
                }
            }
        });

        $(document).on('click', '.remove_temp_image', function(evt) {
            $("#product_image").val('');
            $('#image_pre').attr('src', "{{ asset('images/add-image.png') }}");
            $('#product_image').css('display', 'block');
            $('.remove_temp_image').css('display', 'none');
        });
        
    </script>

@stop
