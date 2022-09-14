@extends('layouts.main') @section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<meta name="_token" content="{{csrf_token()}}" />


<style type="text/css">

header {
    background-color: #0d1b26;
    color: #fff;
    padding: 10px 0;
}

.hide-element {
    display: none;
}

.notificaton-icon,
.avater {
    display: inline-block;
}
</style>

<!---------------- section --------------------->

<section class="bg-white p-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-lg-8">
                <br>
                <h5 class="mb-4 mt-5">My Files & Folders Dashboard</h5>
                <div class="schedule-meeting mt-4 upload-btns mb-4">
                    <!-- 				<input type="file" name="" class="upload-doc"> -->
                    <a href="#upload-a-file" data-toggle="modal">Upload a file</a>
                     
                </div>
                
                    @if(session()->has('success'))
                    <div class="alert alert-success col-sm-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('success') }}
                    </div>
                @endif
                
                @if(session()->has('error'))
                    <div class="alert alert-danger col-sm-4">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                        {{ session()->get('error') }}
                    </div>
                @endif
                <h6 class="border-bottom pb-2">Folders</h6>
                <form  method="post" action="{{ route('folder.store')}}" enctype="multipart/form-data" class="mt-2 upload-folder">
                    <img src="{{ url('/') }}/site/images/folder.png" alt="folder" class="mr-2">
                    @csrf
                    <input type="text" maxlength="60" name="name" placeholder=" Type the new folder name here">
                    <input type="submit" name="" value="Add Folder" class="ml-3 mr-2">
                </form>
                <ul class="font-14 lesson-files view-lesson-files">
                    @foreach($floders as $f)
                    
                    <li><img src="{{ url('/') }}/site/images/folder.png" alt="folder" class="mr-2">
                     {{$f->name}}                  
                            <span class="three-dots">...</span>
                        <div class="sahre-delete-box">
                        <a href="#delete-files{{$f->id}}" data-toggle="modal"><i class="fa fa-trash"></i>Delete</a>
                        <a href="#edit-files{{$f->id}}" data-toggle="modal"><i class="fa fa-edit"></i>Rename</a>
                             <a href="{{ route('folder', $f->id)}}"><i class="fa fa-eye"></i> view</a>
                            </div>
                    </li>
                    <!-- Modal -->
<div class="modal fade" id="delete-files{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this folder?</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('folder.delete') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$f->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="delete" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-files{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete {{$f->name}}</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('folder.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$f->id}}" style="display: none;" />
                    <input type="text" maxlength="60" name="name" value="{{$f->name}}"  />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    @endforeach
                     
                </ul>
               
                <div class="page-padding"></div>
            </div>
            <div class="col-sm-3 col-lg-3 border-left offset-lg-1">
                <div class="col-lg-12 pb-4 mt-5">
           
                    <h6 class="mb-3 mt-3"> Files</h6>
                    <ul class="font-14 lesson-files view-lesson-files">
                    @foreach($files as $f)
                    
                    <li><img src="{{ url('/') }}/site/images/pdf.png" alt="folder" class="mr-2">
                     {{$f->name}}                  
                            <span class="three-dots">...</span>
                        <div class="sahre-delete-box">
                        <a href="#delete-files{{$f->id}}" data-toggle="modal"><i class="fa fa-trash"></i>Delete</a>
                        <a href="#edit-files{{$f->id}}" data-toggle="modal"><i class="fa fa-edit"></i>Rename</a>
                        <a href="#move-files{{$f->id}}" data-toggle="modal"><i class="fa fa-edit"></i>Move</a>
                             <a href="/storage/users/{{$f->file}}" target="_blank"><i class="fa fa-download"></i>Download</a> 
                            </div>
                    </li>
                    <!-- Modal -->
<div class="modal fade" id="delete-files{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">delete {{$f->name}}</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('file.delete2') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$f->id}}" style="display: none;" />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="delete" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="edit-files{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rename</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('file.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$f->id}}" style="display: none;" />
                    <input type="text" maxlength="60" name="name" value="{{$f->name}}"  />
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="save" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="move-files{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Move to</h5>
            </div>
            <div class="modal-body form-style">
            
            <form action="{{ route('file.edit') }}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" value="{{$f->id}}" style="display: none;" />
                    <label class="font-weight-bold">Select folder</label>
                    <select name="folder_id" class="w-100">
                            <option disabled selected>selecte folder</option>
                                                  @foreach ($floders as $folder)
                                                  <option value="{{ $folder->id }}"
                                                  {{ $folder->id == $f->folder_id ? 'selected' : '' }}                                                   
                                                  >{{ $folder->name }}</option>
                                                  @endforeach
                                                  <option value="" >Null</option>
                                                </select>
                                  <div class="row">
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <input type="reset" name="" value="Cancel" class="bg-white" data-dismiss="modal" />
                            <input  type="submit" name="" value="Move" class="bg-white" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                    @endforeach
                     
                </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="upload-a-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body m-4">
            <form method="post" action="{{ route('file.store')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
    @csrf
    
</form>
<div class="modal-footer">
         <a href="/files">Upload</a>
       </div>
 
                        
            </div>
        </div>
    </div>
</div>
 
 






@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>

<script type="text/javascript">
        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return file.name;
            },
            //acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ route('file.delete') }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                 
                flashBox('success');
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                console.log(response);
                $('.modal-backdrop').hide();
                flashBox('success');
            },
            error: function(file, response)
            {
               return false;
            }
            
  
};

</script>
@endpush