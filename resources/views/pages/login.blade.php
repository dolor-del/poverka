@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">

                <div class="leave-comment mr0"><!--leave comment-->
                    <h3 class="text-uppercase">Вход</h3>
                    @if(session('status'))
                        <div class="alert alert-danger">
                            {{session('status')}}
                        </div>
                    @endif
                    @include('admin.errors')
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="/login">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Войти</button>

                    </form>
                </div><!--end leave comment-->

            </div>
        </div>
    </div>
</div>
<!-- end main content-->
@endsection
