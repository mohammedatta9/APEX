@extends('layouts.admin.main')
@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content-tab">

            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="float-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#"></a></li>
                                    <li class="breadcrumb-item active">Profile</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Community detail</h4>
                        </div>
                        <!--end page-title-box-->
                    </div>
                    <!--end col-->
                    @include('layouts.success')
                    @include('layouts.error')
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="met-profile">
                                    <!-- aeaeaevd -->
                                </div><!--end f_profile-->
                            </div><!--end card-body-->
                            <div class="card-body p-0">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Post" role="tab"
                                           aria-selected="true">Main settings</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Settings" role="tab"
                                           aria-selected="false">Home page settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#posts" role="tab"
                                           aria-selected="false">Site information</a>
                                    </li>
                               
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#a" role="tab"
                                           aria-selected="false">Social media</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#b" role="tab"
                                           aria-selected="false">Email settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#c" role="tab"
                                           aria-selected="false">Seo</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane p-3 active" id="Post" role="tabpanel">
                                     <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Site name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="site_name" type="text" value="{{$setting['site_name']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Footer title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="footer_title" type="text" value="{{$setting['footer_title']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Footer about</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="footer_about" rows="5" >{{$setting['footer_about']}}</textarea>                                      
                                           </div>
                                        </div>
                                     

                                        </div>

                                    <div class="col-lg-6">
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['header_logo'])
                                            <img src="{{asset('/storage/users/'.$setting['header_logo'])}}" alt="header_logo"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change header logo</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="header_logo" class="form-control"  />   
                                             </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['footer_about'])
                                            <img src="{{asset('/storage/users/'.$setting['footer_logo'])}}" alt="header_logo"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change footer logo</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="footer_logo" class="form-control"  />   
                                             </div>
                                        </div> 
                                         
                                    </div>
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                     
                                    <div class="tab-pane p-3" id="Settings" role="tabpanel">
                                    <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Main title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="main_title" type="text" value="{{$setting['main_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 1 Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section1_title" type="text" value="{{$setting['section1_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 1 header</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section1_header" type="text" value="{{$setting['section1_header']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Section 1 details</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="section1_details" rows="5" >{{$setting['section1_details']}}</textarea>                                      
                                           </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 1 url</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section1_url" type="text" value="{{$setting['section1_url']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['section1_image'])
                                            <img src="{{asset('/storage/users/'.$setting['section1_image'])}}" alt="section1_image"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change section 1 image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="section1_image" class="form-control"  />   
                                             </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 2 Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section2_title" type="text" value="{{$setting['section2_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 2 header</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section2_header" type="text" value="{{$setting['section2_header']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Section 2 details</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="section2_details" rows="5" >{{$setting['section2_details']}}</textarea>                                      
                                           </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 2 url</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section2_url" type="text" value="{{$setting['section2_url']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['section2_image'])
                                            <img src="{{asset('/storage/users/'.$setting['section2_image'])}}" alt="section2_image"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change section 2 image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="section2_image" class="form-control"  />   
                                             </div>
                                        </div> 
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 3 Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section3_title" type="text" value="{{$setting['section3_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 3 header</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section3_header" type="text" value="{{$setting['section3_header']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Section 3 details</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="section3_details" rows="5" >{{$setting['section3_details']}}</textarea>                                      
                                           </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 3 url</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section3_url" type="text" value="{{$setting['section3_url']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['section3_image'])
                                            <img src="{{asset('/storage/users/'.$setting['section3_image'])}}" alt="section3_image"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change section 3 image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="section3_image" class="form-control"  />   
                                             </div>
                                        </div> 

                                        </div>

                                    <div class="col-lg-6">
                                         
                                    <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 4 Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section4_title" type="text" value="{{$setting['section4_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 4 header</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section4_header" type="text" value="{{$setting['section4_header']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Section 4 details</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="section4_details" rows="5" >{{$setting['section4_details']}}</textarea>                                      
                                           </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 4 url</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section4_url" type="text" value="{{$setting['section4_url']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['section4_image'])
                                            <img src="{{asset('/storage/users/'.$setting['section4_image'])}}" alt="section4_image"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change section 4 image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="section4_image" class="form-control"  />   
                                             </div>
                                        </div> 

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 5 Title</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section5_title" type="text" value="{{$setting['section5_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 5 header</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section5_header" type="text" value="{{$setting['section5_header']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Section 5 details</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="section5_details" rows="5" >{{$setting['section5_details']}}</textarea>                                      
                                           </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Section 5 url</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="section5_url" type="text" value="{{$setting['section5_url']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end"></label>
                                            <div class="col-sm-9">
                                            @if($setting['section5_image'])
                                            <img src="{{asset('/storage/users/'.$setting['section5_image'])}}" alt="section5_image"  width="100">
                                            @endif
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3 row">
                                            <label   class="col-sm-3 col-form-label text-end">Change section 5 image</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="section5_image" class="form-control"  />   
                                             </div>
                                        </div> 
                                         
                                    </div>
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                        </div>
                                        <div class="tab-pane p-3" id="posts" role="tabpanel">
                                        <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">phone1</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="phone1" type="text" value="{{$setting['phone1']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">phone2</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="phone2" type="text" value="{{$setting['phone2']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Address</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="address" type="text" value="{{$setting['address']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="email" type="email" value="{{$setting['email']}}" id="example-text-input">
                                            </div>
                                        </div>

                                         
                                        </div>

                                     
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                     </div>
                                     <div class="tab-pane p-3" id="a" role="tabpanel">
                                     <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Link facebook </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="facebook_link" type="text" value="{{$setting['facebook_link']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Link Linkedin</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="Linkedin_link" type="text" value="{{$setting['Linkedin_link']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Link Instagram </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="instagram_link" type="text" value="{{$setting['instagram_link']}}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Link youtube </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="youtube_link" type="text" value="{{$setting['youtube_link']}}" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Link twitter </label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="twitter_link" type="text" value="{{$setting['twitter_link']}}" id="example-text-input">
                                            </div>
                                        </div>
                     
                                        </div>

                                     
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                        </div>
                                        <div class="tab-pane p-3" id="b" role="tabpanel">
                                        <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Wellcome email </label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="wellcome_email" rows="5" >{{$setting['wellcome_email']}}</textarea>                                      
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Reset password email</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="reset_password_email" rows="5" >{{$setting['reset_password_email']}}</textarea>                                      
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Order email </label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="order_email" rows="5" >{{$setting['order_email']}}</textarea>                                      
                                            </div>
                                        </div>
                     
                                        </div>

                                     
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                     </div>
                                     <div class="tab-pane p-3" id="c" role="tabpanel">
                                      
                                        <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                                    @csrf 
                                        <div class="row">
                                        
                                        <div class="col-lg-6">
                                       
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Meta title</label>
                                            <div class="col-sm-9">
                                            <input class="form-control" name="meta_title" type="text" value="{{$setting['meta_title']}}" id="example-text-input">
                                            </div>
                                        </div>
                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Meta description</label>
                                            <div class="col-sm-9">
                                            <textarea class="form-control" name="meta_description" rows="5" >{{$setting['meta_description']}}</textarea>                                      
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-3 col-form-label text-end">Meta tage </label>
                                            <div class="col-sm-9">
                                            <input class="form-control" name="meta_tage" type="text" value="{{$setting['meta_tage']}}" id="example-text-input">
                                            </div>
                                        </div>
                     
                                        </div>

                                     
                                    
                                    </div><!--end row-->
                                        <div class="form-group mb-3 row">
                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                            <button type="submit" class="btn btn-de-primary">
                                                Update
                                            </button>
                                             
                                        </div>
                                        </div>
                                    </form>
                                     </div>
                                    
                                </div>
                            </div> <!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->

            </div><!-- container -->

            <!--Start Rightbar-->
            <!--Start Rightbar/offcanvas-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                    <button type="button" class="btn-close text-reset p-0 m-0 align-self-center"
                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <h6>Account Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch1">
                            <label class="form-check-label" for="settings-switch1">Auto updates</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                            <label class="form-check-label" for="settings-switch2">Location Permission</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch3">
                            <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                    <h6>General Settings</h6>
                    <div class="p-2 text-start mt-3">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch4">
                            <label class="form-check-label" for="settings-switch4">Show me Online</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                            <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                        </div><!--end form-switch-->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="settings-switch6">
                            <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                        </div><!--end form-switch-->
                    </div><!--end /div-->
                </div><!--end offcanvas-body-->
            </div>
            <!--end Rightbar/offcanvas-->
            <!--end Rightbar-->


        </div>
        <!-- end page content -->
    </div>

@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
$('.deletem_b').on("click", function (e) {
              //  e.preventDefault();
               
         var id = $(this).attr('deletem_b');
         
         
         $.ajax({
                type: "post",
                url: "{{ route('delete_member') }}",
                data: { _token: '{{ csrf_token() }}',
                     "id" : id },
                    dataType: 'json',              // let's set the expected response format
                    success: function (data) {
                        $(".R_m"+ data.id).remove();
                       
                    },
                    error: function (err) {
                        if (err.status == 422) { // when status code is 422, it's a validation issue
                            console.log(err.responseJSON);
                            $('#success_message_notifications').fadeIn().html('<div class="alert alert-danger border-0 alert-dismissible">' + err.responseJSON.message +'</div>');


                        }
                    }
                });   
          
    });
 </script>



@endpush