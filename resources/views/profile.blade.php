
    @extends('layouts.header_profile')
    @section('content')

      <div class="row pt-5 pb-2 text-biru">
        <div class="col col-lg-12">
          <div class="row">
            <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
              <div class="container pt-5">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Profile</li>
                    <li class="breadcrumb-item active">{{ $user->username }} </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row pb-2" style="background-color: #FFF8DC">
        <div class="col col-lg-8 col-sm-12 bg-white offset-lg-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="row">
            @if(Auth::user()->username == $user->username)
        
            <label class="col-md-4 col-form-label">Your post starts here... </label>
            <div class="col col-md-12">
              <form action="{{route('summernotePersist')}}" method="POST" id="newpost" class="sr-only">
                  {{ csrf_field() }}

                  <input type="text" name="title" class="form-control" placeholder="title">
                  <textarea name="summernoteInput" class="summernote" id="summernote"></textarea>
                  <br>
                  <div class="row">
                    <div class="col col-md-2">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="postpone" v-model="checked" v-bind:value="false">
                        <label class="custom-control-label" for="postpone">Postpone</label>
                      </div>
                    </div>
                    <div class="col col-md-3">
                      <div id="rowdatepost" class="sr-only" v-if="checked === true">
                          <input type="text" name="date-post" class="form-control" id="datepicker">
                      </div>
                    </div>
                    <div class="col col-md-7">
                      <div class="float-right">
                        <button id="reset" class="btn border-warning btn-sm">Clear</button>
                        <button type="submit" class="btn btn-primary btn-sm">Post now</button>
                      </div>
                    </div>
                  </div>
                  
              </form>
            </div>
            @endif
          </div>
        </div>
      </div>

      @foreach($post as $r)
        <div class="row pb-2" style="background-color: #FFF8DC">
          <div class="col-lg-8 col-sm-12 bg-white offset-lg-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <div>
              <h2>{{$r->title}}</h2>
            </div>
            <hr>
            <div>
              {!!$r->content!!}
            </div>
            <hr>
            <div>
              <span class="created_by">Posted by : <a href="{{ url('profile', $r->user->username)}}">{{ isset($r->user->name) ? $r->user->name : "" }}</a> {{ ' at '.$r->created_at}}</span>
            </div>
          </div>
        </div>
      @endforeach
      
    @endsection

    @section('js')
    <script type="text/javascript">
      
      $(document).ready(function() {
        $('#newpost').removeClass('sr-only');
        $('.summernote').summernote({
              height: 150,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true                  // set focus to editable area after initializing summernote
        });

      

        /*$('#newpost').on('submit', function(e){
            e.preventDefault();
            if ($('#summernote').summernote('isEmpty'))
            {
              swal({
                type: 'error',
                text: 'type something please'
              })
            }else{
              $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
              });
              let notes = $('#summernote').summernote('code');
              let postpone = $('#datepicker').val();
              $.ajax({
                type: "POST",
                url : "/post-note/store",
                data: {summernoteInput: notes, datepost: postpone},
                dataType: 'JSON',
                success: function(data){
                  console.log('berhasil')
                },
                error: function(data){
                  console.log(data)
                }

              })
              //console.log($('.summernote').summernote('code'));
            }
        })*/ 

        /*new Vue({
          el: '#newpost',
          data: {
            datepicker: '',
            checked: false,
          },
        })*/
        
        $('#reset').on('click', function(e){
            e.preventDefault();
            $('.summernote').summernote('reset');    
        })
        $('#datepicker').datetimepicker({
          uiLibrary: 'bootstrap4', size: 'small',
          format: 'dd-mm-yyyy HH:MM',
          footer: true,
        });
        $('#postpone').prop('checked', false);
        $('#postpone').on('change', function(e){
          let value = $(this).prop('checked');
          if(value === true)
          {
            $('#rowdatepost').removeClass('sr-only');
          }else{
            $('#rowdatepost').addClass('sr-only');
          }
        })
      })

    </script>
  @endsection