@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Сформированные заявки
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      {!! Form::open(['route' => 'orders.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Добавление заявки</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Имя</label>
              <input type="text" class="form-control" name="name"  value="{{ old('name') }}"><br>
              <label>Адрес</label>
              <input type="address" class="form-control" name="address" value="{{ old('address') }}"><br>
              <label>Телефон</label>
              <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}"><br>
              <label>Заявлено</label>
              <select name="declared" class="form-control select2">
                @for ($i = 1; $i <= $maxCountDeclared; $i++)
                <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select><br><br>
              <label>Дата и время</label>
              <input type="datetime-local" class="form-control" name="date" value="{{ old('date') }}"><br>
              <label>Исполнитель</label>
              {{Form::select('user_id',
              	$users,
              	null,
              	['class' => 'form-control select2', 'placeholder' => 'Выберите исполнителя'])
              }}
              <br><br><label>Комментарий</label>
              <input type="text" class="form-control" name="description" value="{{ old('description') }}">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('orders.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-success pull-right">Добавить</button>
        </div>
        <!-- /.box-footer-->
        {!! Form::close() !!}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
