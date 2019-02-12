<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                @if($orders)
                    {!!Form::open(['url'=>route('ordersEdit'),'class'=>'form-horizontal', 'method'=>'POST'])!!}
                    <table class="table table-bordered table-hover dataTable>
                    <thead>
                    <div class="row">
                    <tr>

                        <th style="width: 10px">#</th>
                        <th>Имя</th>
                        <th>Фамилия</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Модель авто</th>
                        <th>Адрес</th>
                        <th>Сообщение</th>
                        <th>Дата</th>
                        <th>Отметить</th>


                    </tr>
            </div>
            </thead>
            <tbody>
            @foreach($orders as $key => $order)

                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->second_name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->model}}</td>
                    <td>{{$order->adress}}</td>
                    <td>{{$order->message}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{!! Form::checkbox('item[]',$order->id, false) !!}</td>


                </tr>
            @endforeach
            </tbody></table>
            @endif

            <div class="row col-md-6"><input class="btn btn-danger pull-right" type="submit" name="delUser" value="Удалить отмеченные"></div>


            {!!Form::close()!!}
        </div><!-- /.box-body -->
    </div>

</div>
</div>