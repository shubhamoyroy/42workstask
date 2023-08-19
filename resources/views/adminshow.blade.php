<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ url('/public/css/style.css') }}" />
@isset($admindata)
<table class="table table-striped table-hover admintable">
            <thead>
               <tr>
               <th>Actual Url</th>
               <th>Tiny Url</th>
               <th>Date</th>
               </tr>
            </thead>
            <tbody>
               @foreach($admindata as $key=>$value)
               <tr>
               <td><a href="{{$value['actual_url']}}">{{$value['actual_url']}}</a></td>
               <td><a href="{{$value['tiny_url']}}">{{$value['tiny_url']}}</a></td>
               <td>{{date('d-m-Y', strtotime($value['created_at']))}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
@endisset