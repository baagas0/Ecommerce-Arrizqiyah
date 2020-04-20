@extends('layout.backend.main')
{{-- title --}}
@section('title', '')
{{-- breadcrumb --}}
@section('breadcrumb','')
{{-- css --}}
@push('css')
<link href="{{ asset('admin/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
@endpush
{{-- js --}}
@push('js')
<script src="{{ asset('admin/plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('admin/pages/jquery.form-upload.init.js') }}"></script>

<script src="https://cdn.tiny.cloud/1/h3i8dviz4wy36q3pvmcxgxvpzf9sc0ahuwk87cucba501jbq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>

tinymce.init({
  selector: 'textarea#full-featured-non-premium',
  plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  menubar: 'file edit view insert format tools table help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
  toolbar_sticky: true,
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: '//www.tiny.cloud/css/codepen.min.css',
  link_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  height: 400,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_mode: 'sliding',
  contextmenu: "link image imagetools table",
 });



</script>
@endpush
{{-- content --}}
@section('content')
 @if (count($errors) > 0)
    <div class="alert alert-danger">
    <strong>Whoops!</strong> Where the System Finds Human Error With Data Input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    Please <strong>Try Again !!!</strong>
    </div>
@endif
@if ($message = Session::get('success'))
<div class="container">
	<div class="">
      <div class="alert alert-success alert-block mt-3">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <p>{{ $message }}</p>
      </div>
	</div>
</div>
@endif
@if ($message = Session::get('erorr'))
<div class="container">
	<div class="">
      <div class="alert alert-success alert-block mt-3">
        <button type="button" class="close" data-dismiss="alert">×</button> 
          <p>{{ $message }}</p>
      </div>
	</div>
</div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                	<form action="{{ url('ip-admin/blog/post/store') }}" method="POST" enctype="multipart/form-data">
                	{{ csrf_field() }}
                        <h4 class="mt-0">Blog Post</h4>  
                        <hr>
                        <div class="col-sm-12">
                        	<label>Title Post</label>
                        	<input type="text" name="title" class="form-control">
                        </div>
                        <br>
                        <div class="col-sm-12">

                          <h4 class="mt-0 header-title">Thumbnail Post</h4>
                          <input type="file" accept='image/*' id="input-file-now" class="dropify" name="thumbnail" />

                        </div><!--end col-->
                        <br>
                        <div class="col-sm-12">
                        	<label>Content Post</label>
              						<textarea id="full-featured-non-premium" name="content">

              							<div class='demo-dfree'>
              							  <h2 class="dfree-header mce-content-body" contenteditable="true" style="position: relative;" spellcheck="false">
              							    The latest and greatest from TinyMCE
              							  </h2>
              							  <br/>
              							  <div class="dfree-body mce-content-body" contenteditable="true" style="position: relative;" spellcheck="false">
              							    <p><img src="https://tiny.cloud/images/medium-pic.jpg" style="display: block; margin-left: auto; margin-right: auto; width: 100%;" data-mce-style="display: block; margin-left: auto; margin-right: auto;" data-mce-selected="1"></p>
              							    <br/>
              							    <h2>The world’s first rich text editor in the cloud</h2>

              							    <p>
              							      Have you heard about Tiny Cloud? 
              							      It’s the first step in our journey to help you deliver great content creation experiences, no matter your level of expertise. 
              							      50,000 developers already agree. 
              							      They get free access to our global CDN, image proxy services and auto updates to the TinyMCE editor. 
              							      They’re also ready for some exciting updates coming soon.
              							    </p>
              							  
              							  
              							    <p>
              							      One of these enhancements is <strong>Tiny Drive</strong>: imagine file management for TinyMCE, in the cloud, made super easy. 
              							      Learn more at <a href='https://www.tiny.cloud/tinydrive/'>tiny.cloud/tinydrive</a>, where you’ll find a working demo and an opportunity to provide feedback to the product team.
              							    </p>
              							  
              							    <h3>An editor for every project</h3>
              							  
              							    <p>
              							      Here are some of our customer’s most common use cases for TinyMCE:
              							      <ul>
              							        <li>Content Management Systems (<em>e.g. WordPress, Umbraco</em>)</li>
              							        <li>Learning Management Systems (<em>e.g. Blackboard</em>)</li>
              							        <li>Customer Relationship Management and marketing automation (<em>e.g. Marketo</em>)</li>
              							        <li>Email marketing (<em>e.g. Constant Contact</em>)</li>
              							        <li>Content creation in SaaS systems (<em>e.g. Eventbrite, Evernote, GoFundMe, Zendesk</em>)</li>
              							      </ul>
              							    </p>
              							  
              							    <p>
              							      And those use cases are just the start. 
              							      TinyMCE is incredibly flexible, and with hundreds of APIs there’s likely a solution for your editor project. 
              							      If you haven’t experienced Tiny Cloud, get started today. 
              							      You’ll even get a free trial of our premium plugins – no credit card required!
              							    </p>
              							  </div>
              							</div>
              						</textarea>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="col-sm-12" >
                        	<button type="submit" style="float: right;" class="btn btn-outline-info waves-effect waves-light"><i class="mdi mdi-send mr-2"></i>Submit</button>
	                    </div>
                    </form>
                    </div>
                </div>            
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->                               
</div><!--end row--> 
@endsection
