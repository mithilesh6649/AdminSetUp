@extends('adminlte::page')

@section('title', 'Edit Mobile Content')

@section('content_header')
@stop

@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="card">
        <div class="card-header alert d-flex align-items-center justify-content-between">
          <h3 class="w-100">Edit Mobile Content</h3>
          <a class="btn btn-sm btn-success back-button" href="{{ url()->previous() }}">{{ __('adminlte::adminlte.back') }}</a>
        </div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form id="editContentForm" method="post" action="{{ route('update_mobile_page') }}">
            @csrf
              <div class="form-group">
                <label for="page_title">Title</label>
                <input type="hidden" name="id" value="{{ $pageContent->id }}" readonly>
                <input type="title" name="title" class="form-control" id="page_title" value="{{ $pageContent->title }}">
                @if($errors->has('title'))
                  <div class="error">{{ $errors->first('title') }}</div>
                @endif
              </div>
              <div class="form-group">
                <label for="section">Section</label>
                <select name="section" class="form-control" id="section" disabled>
                  @foreach($pageSections as $pageSection)
                    <option value="{{ $pageSection->slug }}" {{ $pageContent->section == $pageSection->slug ? 'selected' : '' }}>{{ $pageSection->title }}</option>
                  @endforeach
                </select>
                @if($errors->has('section'))
                  <div class="error">{{ $errors->first('section') }}</div>
                @endif
              </div>
              <label for="content">Page Content</label>
              <textarea id="content" name="content">{{ $pageContent->content }}</textarea>
              <div class="form-group mb-0">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="content" class="custom-control-input">
                @if($errors->has('content'))
                  <div class="error">{{ $errors->first('content') }}</div>
                @endif
                </div>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" id="status" >
                   <option value="1" {{$pageContent->status==1?'selected':''}}>Active</option>
                   <option value="0" {{$pageContent->status==0?'selected':''}}>Inactive</option>
                </select>
                @if($errors->has('status'))
                  <div class="error">{{ $errors->first('status') }}</div>
                @endif
              </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection

@section('css')
@stop

@section('js')
 

  <script>
    $(document).ready(function() {
      // content
      // CKEDITOR.replace( 'content', {
      //   customConfig : 'config.js',
      //   toolbar : 'simple',
      //   allowedContent : true,
      // })

         CKEDITOR.replace( 'content', {
      allowedContent : true,
    // Define the toolbar: https://ckeditor.com/docs/ckeditor4/latest/features/toolbar.html
    // The full preset from CDN which we used as a base provides more features than we need.
    // Also by default it comes with a 3-line toolbar. Here we put all buttons in a single row.
    // toolbar: [
    //   { name: 'document', items: [ 'Print' ] },
    //   { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
    //   { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
    //   { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
    //   { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    //   { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
    //   { name: 'links', items: [ 'Link', 'Unlink' ] },
    //   { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
    //   { name: 'insert', items: [ 'Image', 'Table' ] },
    //   { name: 'tools', items: [ 'Maximize' ] },
    //   { name: 'editing', items: [ 'Scayt' ] }
    // ],

    // Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
    // One HTTP request less will result in a faster startup time.
    // For more information check https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-customConfig
    customConfig: '',

    // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
    // For more information check:
    //  - About Advanced Content Filter: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_advanced_content_filter.html
    //  - About Disallowed Content: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_disallowed_content.html
    //  - About Allowed Content: https://ckeditor.com/docs/ckeditor4/latest/guide/dev_allowed_content_rules.html
    disallowedContent: 'img{width,height,float}',
    extraAllowedContent: 'img[width,height,align]',

    // Enabling extra plugins, available in the full-all preset: https://ckeditor.com/cke4/presets-all
    extraPlugins: 'tableresize,uploadimage,uploadfile',

    /*********************** File management support ***********************/
    // In order to turn on support for file uploads, CKEditor has to be configured to use some server side
    // solution with file upload/management capabilities, like for example CKFinder.
    // For more information see https://ckeditor.com/docs/ckeditor4/latest/guide/dev_ckfinder_integration.html

    // Uncomment and correct these lines after you setup your local CKFinder instance.
    // filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
    // filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    /*********************** File management support ***********************/

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

    // Define the list of styles which should be available in the Styles dropdown list.
    // If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
    // (and on your website so that it rendered in the same way).
    // Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
    // that file, which means one HTTP request less (and a faster startup).
    // For more information see https://ckeditor.com/docs/ckeditor4/latest/features/styles.html
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
  } );
      $('#editContentForm').validate({
        ignore: [],
        debug: false,
        rules: {
          title: {
            required: true
          },
          content:{
            required: function() {
              CKEDITOR.instances.content.updateElement();
            },
            minlength:10
          }
        },
        messages: {
          title: {
            required: "The Page Title field is required."
          },
          content: {
            required: "The Page Content field is required.",
            minlength: "Minimum Length must be 10"
          }
        }
      });
    });
  </script>
@stop
