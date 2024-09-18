@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Управление пользователями
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
		{{Form::open(['route' => 'users.store'])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Добавление пользователя</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Имя</label>
              <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <label>E-mail</label>
              <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
              <label>Пароль</label>
              <input type="text" name="password" class="form-control">
            </div>
            <label>Права</label>
            {{Form::select('role',
            \App\Enums\UserRole::asSelectArray(),
            null,
            ['class' => 'form-control select2', 'placeholder' => 'Укажите права'])
            }}
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('users.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
