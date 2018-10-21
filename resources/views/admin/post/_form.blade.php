<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title of Post']) !!}
    @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('body')) has-error @endif">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Body of Post...']) !!}
    @if ($errors->has('body')) <p class="help-block">{{ $errors->first('body') }}</p> @endif
</div>

<!-- Text body Form Input -->
<div class="form-group @if ($errors->has('body')) has-error @endif">
    {!! Form::label('cked', 'Body') !!}
    {!! Form::textarea('cked', null, ['class' => 'form-control ckeditor', 'placeholder' => 'Body of Post...']) !!}
    @if ($errors->has('cked')) <p class="help-block">{{ $errors->first('cked') }}</p> @endif
</div>

@push('scripts')
<script src="//cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

<script>
    var editor = CKEDITOR.replace( 'cked', {
        extraPlugins: 'uploadimage',//,image2',
        height: 500,

        // Upload images to a CKFinder connector (note that the response type is set to JSON).
        // uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
        uploadUrl: 'upload',

        // Configure your file manager integration. This example uses CKFinder 3 for PHP.
        // filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
        // filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
        // filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        // filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        // filebrowserUploadUrl: 'upload?command=QuickUpload&type=Files',
        // filebrowserImageUploadUrl: 'upload?command=QuickUpload&type=Images',

        // The following options are not necessary and are used here for presentation purposes only.
        // They configure the Styles drop-down list and widgets to use classes.

        stylesSet: [
            { name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
            { name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
        ],

        // Load the default contents.css file plus customizations for this sample.
        // contentsCss: [ CKEDITOR.basePath + 'contents.css', 'https://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

        // Configure the Enhanced Image plugin to use classes instead of styles and to disable the
        // resizer (because image size is controlled by widget styles or the image takes maximum
        // 100% of the editor width).
        // image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
        // image2_disableResizer: true
    } );
    editor.on( 'fileUploadRequest', function( evt ) {
        var xhr = evt.data.fileLoader.xhr;

        // xhr.setRequestHeader( 'Cache-Control', 'no-cache' );
        xhr.setRequestHeader( 'X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content') );
        // xhr.withCredentials = true;
    } );
</script>
@endpush