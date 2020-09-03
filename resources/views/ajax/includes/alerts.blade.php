@if ($errors->any())
<div class="text-center mt-4 mb-4 p-2 alert-danger">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
</div>
@endif