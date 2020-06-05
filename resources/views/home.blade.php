@extends('layouts.header')
@section('content')
<body class="">
    <div class="container-fluid" style="">
        <div class="row pt-5" style="min-height: 100vh;background-color: #FFF8DC">
         
            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2 pb-5" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col">
                            
                            <div class="row">
                                
                                <label class="col-md-4 col-form-label">Your status starts here...</label>
                                
                            </div>
                            <div class="row pb-3">
                                <div class="col">
                                  <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- <div class="row pb-5">
                                <div class="col col-md-2 col-sm-2">
                                     <img src="{{asset('picture/codeigniter.jpeg')}}" alt="codeigniter" class="rounded-circle" width="100%" height="100%">
                                </div>
                                <div class="col col-md-2">
                                    <img src="{{asset('picture/php_PNG26.png')}}" alt="php" class="rounded-circle" width="100%" height="100%">
                                </div>
                                <div class="col col-md-2">
                                    <img src="{{asset('picture/mysql.png')}}" alt="mysql" class="rounded-circle" width="100%" height="100%">
                                </div>
                                <div class="col col-md-2">
                                    <img src="{{asset('picture/js.png')}}" alt="js" class="rounded-circle" width="100%" height="100%">
                                </div>
                                <div class="col col-md-2">
                                    <img src="{{asset('picture/laravel.png')}}" alt="js" class="rounded-circle" width="100%" height="100%">
                                </div>
                            </div> -->
                            <div class="row">

                                <div class="col col-2 col-md-1 ">
                                    <div class="row float-right">
                                        <img src="{{asset('picture/codeigniter.jpeg')}}" alt="codeigniter" class="rounded-circle" width="50" height="50">
                                    </div>
                                </div>
                                <div class="col col-10 col-md-11">
                                    <span class="status">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </span>
                                    <span class="blockquote-footer"> by @username <i class="fa fa-clock-o"></i> {{date('Y-m-d H:i:s')}}</span>
                                </div>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col col-2 col-md-1 ">
                                    <div class="row float-right">
                                        <img src="{{asset('picture/user.png')}}" alt="codeigniter" class="rounded-circle" width="50" height="50">
                                    </div>
                                </div>
                                <div class="col col-10 col-md-11">
                                    <span class="status">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<a href="#">read more</a>
                                    </span>
                                    <span class="blockquote-footer"> by @username <i class="fa fa-clock-o"></i> {{date('Y-m-d H:i:s')}}</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2 d-none d-lg-block">
                
            </div>
        </div>
    </div>
</body>

@endsection
