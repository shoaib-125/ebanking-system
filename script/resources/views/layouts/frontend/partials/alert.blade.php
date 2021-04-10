@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@elseif(\Illuminate\Support\Facades\Session::has('success'))
    <div class="alert alert-success">
        {{\Illuminate\Support\Facades\Session::get('success', '')}}
    </div>
@endif