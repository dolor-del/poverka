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
        <div class="box-header with-border">
          <h3 class="box-title">Изменение информации о счетчике</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['meters.update',$meter->id], 'method'=>'put'])}}
          <div class="col-md-6">
            <div class="form-group">
                <label>Адрес</label>
                {{Form::select('order_id',
                    $orders,
                    $meter->order->id ?? null,
                    ['class' => 'form-control select2', 'placeholder' => 'Выберите заявку'])
                }}
                <br><br><label>№ документа</label>
                <input type="text" class="form-control" name="doc_number" value="{{ $meter->doc_number }}"><br>
                <label>№ в госреестре</label>
                <input type="text" class="form-control" name="state_register" value="{{ $meter->state_register }}"><br>
                <label>№ счетчика</label>
                <input type="text" class="form-control" name="meter_number" value="{{ $meter->meter_number }}"><br>
                <label>Модификация</label>
                <input type="text" class="form-control" name="modification" value="{{ $meter->modification }}"><br>
                <label>t жидкости</label>
                <input type="text" class="form-control" name="temperature" value="{{ $meter->temperature }}"><br>
                <label>Дата поверки</label>
                <input type="date" class="form-control" name="date_contract" value="{{ $meter->date_contract }}"><br>
                <label>Действует до</label>
                <input type="date" class="form-control" name="date_expire" value="{{ $meter->date_expire }}"><br>
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <a href="{{route('meters.index')}}" class="btn btn-default">Назад</a>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
