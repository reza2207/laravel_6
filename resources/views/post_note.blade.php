@extends('layouts.header')

@section('content')

<body class="">
    <div class="container-fluid pt-5" style="min-height: 100vh;">
        <div class="row pt-5 pb-2" style="background-color: #FFF8DC">
            <div class="col col-lg-12">
              <div class="row">
                <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                  <div class="container pt-5">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Post Note</li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @foreach($lists as $r)
        <div class="row pt-2" style="background-color: #FFF8DC">

            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2 " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
               <div>
                  <h2>{{$r->title}}</h2>
                </div>
                <hr>
                <div>
                  {!!Str::limit($r->content, 400) !!} <a href='{{url("/post_notes/$r->id/$r->slug")}}'>read more...</a>
                </div>
                <div>
                  <span class="created_by"><i class="fa fa-notes"></i> Posted by : <a href="{{ url('profile', $r->user->username)}}">{{ isset($r->user->name) ? $r->user->name : "" }}</a> {{ ' at '.$r->created_at}}</span>
                </div>
                <hr>
                <div class="pb-5 comment">
                    <div id="header-comment"></div>
                    <div id="header-body">
                        <textarea class="form-control" placeholder="Your comments write here..."></textarea>
                    </div>
                    <div id="body-comment">
                        <i class="fa fa-comments"></i>
                        <ul class="list-group pt-3">
                            <li class="list-group-item">
                                <div class="row">
                                    <img src="{{url('picture/89e6ea03c68d27412d5f14b37df23785.jpg')}}" alt="..." class="rounded-circle" style="height: 50px;width: 50px">
                                    <div class="col col-lg-11">
                                        <blockquote class="blockquote">
                                          <p class="mb-0 h6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                          <footer class="blockquote-footer h6">Someone famous at </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>  
                </div>
            </div>

        </div>
        @endforeach
    </div>
</body>


@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
       
        $('.summernote').summernote({
          height: 150,                 // set editor height
          minHeight: null,             // set minimum height of editor
          maxHeight: null,             // set maximum height of editor
          focus: true                  // set focus to editable area after initializing summernote
        });

        $('#newpost').on('submit', function(e){
            e.preventDefault();

            if ($('.summernote').summernote('isEmpty'))
            {
              swal({
                type: 'error',
                text: 'type something please'
              })
            }else{

                console.log($('.summernote').summernote('code'));
            }
        })
        $('#reset').on('click', function(e){
            e.preventDefault();
            $('.summernote').summernote('reset');    
        })
        
        
            //set the content to summernote using `code` attribute.
        //$('.summernote').summernote('code', content);
        //$('#summernote').summernote('code');
    });
</script>
@endsection
