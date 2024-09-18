@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Поверенные счетчики
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
      {!! Form::open(['route' => 'meters.store']) !!}
        <div class="box-header with-border">
          <h3 class="box-title">Добавление счетчика</h3>
            @if(session('status'))
                <div class="alert alert-danger">
                    {{session('status')}}
                </div>
            @endif
            @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Адрес</label>
              {{Form::select('order_id',
              	$orders,
              	null,
              	['class' => 'form-control select2', 'placeholder' => 'Выберите заявку'])
              }}
              <br><br><label>№ документа</label>
              <input type="text" class="form-control" name="doc_number" value="{{ old('doc_number') }}"><br>
              <label>№ в госреестре</label>
              <input type="text" class="form-control" name="state_register" value="{{ old('state_register') }}"><br>
              <label>№ счетчика</label>
              <input type="text" class="form-control" name="meter_number" value="{{ old('meter_number') }}"><br>
              <label>Модификация</label>
              <input type="text" class="form-control" name="modification" value="{{ old('modification') }}"><br>
              <label>t жидкости</label>
              <input type="text" class="form-control" name="temperature" value="{{ old('temperature') }}"><br>
              <label>Дата поверки</label>
              <input type="date" class="form-control" name="date_contract" value="{{ old('date_contract') }}"><br>
              <label>Действует до</label>
              <input type="date" class="form-control" name="date_expire" value="{{ old('date_expire') }}"><br>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('meters.index')}}" class="btn btn-default">Назад</a>
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
