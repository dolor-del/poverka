@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Маршрутный лист
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Дата</th>
                  <th>Имя</th>
                  <th>Адрес</th>
                  <th>Телефон</th>
                  <th>Заявлено</th>
                  <th>Выполнено</th>
                  <th>Комментарий</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
					<tr>
                      <td>{{$order->date}}</td>
	                  <td>{{$order->name}}</td>
	                  <td>{{$order->address}}</td>
	                  <td>{{$order->phone}}</td>
	                  <td>{{$order->declared}}</td>
	                  <td>{{$order->meters->count()}}</td>
	                  <td>{{$order->description}}</td>
	                  <td><a href="{{route('itinerary.edit', $order->id)}}" class="fa fa-pencil"></a>

	                  {{Form::open(['route'=>['itinerary.destroy', $order->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>
	                   {{Form::close()}}

                       {{Form::open(['route'=>['itinerary.complete', $order->id], 'method'=>'put'])}}
	                  <button type="submit" class="delete">
	                   <i class="fa fa-check"></i>
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
