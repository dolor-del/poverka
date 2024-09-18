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
            <div class="box-header">
              <h3 class="box-title">Заявки</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('meters.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Адрес</th>
                  <th>№ документа</th>
                  <th>№ в госреестре</th>
                  <th>№ счетчика</th>
                  <th>Модификация</th>
                  <th>t жидкости</th>
                  <th>Дата поверки</th>
                  <th>Действует до</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($meters as $meter)
					<tr>
	                  <td><a href="{{route('itinerary.edit', $meter->order->id)}}">{{$meter->order->address}}</a></td>
	                  <td>{{$meter->doc_number}}</td>
	                  <td>{{$meter->state_register}}</td>
	                  <td>{{$meter->meter_number}}</td>
	                  <td>{{$meter->modification}}</td>
	                  <td>{{$meter->temperature}}</td>
                      <td>{{$meter->date_contract}}</td>
                      <td>{{$meter->date_expire}}</td>
	                  <td><a href="{{route('meters.edit', $meter->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['meters.destroy', $meter->id], 'method'=>'delete'])}}
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
