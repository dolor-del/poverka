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

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Пользователи</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('users.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Имя</th>
                  <th>E-mail</th>
                  <th>Права</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
	                <tr>
	                  <td>{{$user->name}}</td>
	                  <td>{{$user->email}}</td>
                      <td>{{$user->role->description}}</td>
	                  <td><a href="{{route('users.edit', $user->id)}}" class="fa fa-pencil"></a>
	                  {{Form::open(['route'=>['users.destroy', $user->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>

	                   {{Form::close()}}
	                  </td>
	                </tr>
                @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
