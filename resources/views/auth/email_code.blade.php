@extends('templates.shoes.master')
@section('title') {{__('sentence.verify_account')}} @endsection
@section('content')
<div class="container" style="margin-top: 200px; margin-bottom: 150px">
    <div style="width: 70%;margin: 0 auto">
        @if (Session::has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ôi...',
                text: 'Mã xác thực sai, vui lòng thử lại!',
            })
        </script>
        @endif

        <form action="{{route('shoes.auth.postActiveAc',$object->id)}}" method="post">
            @csrf
            <div class="form-group">
            <h4>{{__('sentence.hello')}} <strong style="color:red">{{$object->fullname}}</strong>, {{__('sentence.verify_title')}}</h4>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">{{__('sentence.verify_code')}}</label>
                <input type="text" value="{{ Request::old('acitve') }}" class="form-control" name="acitve"
                    placeholder="Mã xác nhận">
                <span class="alert-danger">{{$errors->first('active')}}</span>
            </div>
            <div style="text-align: center">
                <input type="submit" value="{{__('sentence.active_account')}}" class="btn btn-default">
            </div>
        </form>
    </div>
</div>
@endsection
