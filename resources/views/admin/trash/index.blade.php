@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Удаленные заявки
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Корзина</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Дата удаления</th>
                  <th>Дата</th>
                  <th>Имя</th>
                  <th>Адрес</th>
                  <th>Телефон</th>
                  <th>Заявлено</th>
                  <th>Выполнено</th>
                  <th>Исполнитель</th>
                  <th>Комментарий</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
					<tr>
                      <td>{{$order->deleted_at}}</td>
                      <td>{{$order->date}}</td>
	                  <td>{{$order->name}}</td>
	                  <td>{{$order->address}}</td>
	                  <td>{{$order->phone}}</td>
	                  <td>{{$order->declared}}</td>
	                  <td>{{$order->meters->count()}}</td>
	                  <td>{{$order->user->name ?? '-'}}</td>
	                  <td>{{$order->description}}</td>
                      <td>
                        {{Form::open(['route'=>['trash.update', $order->id], 'method'=>'put'])}}
                        <button type="submit" class="delete">
                        <i class="fa fa-undo"></i>
                        </button>
                        {{Form::close()}}

                        {{Form::open(['route'=>['trash.destroy', $order->id], 'method'=>'delete'])}}
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
