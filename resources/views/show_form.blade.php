<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ url('/public/css/style.css') }}" />
@if(!Auth::check())
<div class="login_cstm">
<a href="{{route('login')}}">Login</a>
<a href="{{route('register')}}">Register</a>
</div>
@else
<div class="login_cstm">
<a href="{{route('logout')}}">Logout</a>
</div>
@endif
<form class="fomrs" action="{{route('getdata')}}" method="post">
	@csrf
   <div class="wrap">
   <div class="search">
      <input type="text" name="actual_url" class="searchTerm" placeholder="Enter Your Url">
      <button type="submit" name="button_data" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
</form>

     @isset($urldata_cs)
         <table class="table table-striped table-hover">
            <thead>
               <tr>
               <th>Actual Url</th>
               <th>Tiny Url</th>
               <th>Date</th>
               </tr>
            </thead>
            <tbody>
               @foreach($urldata_cs as $key=>$value)
               <tr>
               <td><a href="{{$value['actual_url']}}">{{$value['actual_url']}}</a></td>
               <td><a href="{{$value['tiny_url']}}">{{$value['tiny_url']}}</a></td>
               <td>{{date('d-m-Y', strtotime($value['created_at']))}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      @endisset  
		@if (session('new_url'))
                        <div class="alert alert-success" role="alert">
                            <span>Tiny Url:</span><a href="{{ session('new_url') }}" target="_blank">{{ session('new_url') }}</a>
                        </div>
      @endif

      @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul style="color:red;">
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif