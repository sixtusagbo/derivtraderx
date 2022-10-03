@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
            <img src="close.soon" alt="" style="display: none" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode);},6000); })(this);">
        </div>
    @endforeach  
@endif

@if (session('success'))
    <div class="d-flex justify-content-start mb-10">
        <div class="alert alert-success">
            <h5 class="text-bold ">{{session('success')}}</h5>
            <img src="close.soon" alt="" style="display: none" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode);},4000); })(this);">
        </div>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error')}}
        <img src="close.soon" alt="" style="display: none" onerror="(function(el){ setTimeout(function(){ el.parentNode.parentNode.removeChild(el.parentNode);},6000); })(this);">
    </div>
@endif