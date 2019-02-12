<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                @if($colors)
                    <table class="table table-bordered table-hover dataTable">
                        <thead>
                        <div class="row">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Название</th>
                                <th>Картинка</th>
                                <th>Цена</th>
                                <th style="width: 40px">Действие</th>

                            </tr>
                        </div>
                        </thead>
                        <tbody>
                        <tbody>

                        @foreach($colors as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{!! Html::link(route('admin.colors.show',['brands'=>$item->id]),mb_strtoupper($item->color)) !!}</td>
                                <td>{!!  Html::image(asset('/assets/images/colors/'.$item->img),$item->color, ['width' => '100px'])!!}</td>
                                <td><b>{{$item->price}}</b> </td>
                                <td>{!! Form::open(['url' => route('admin.colors.destroy',['colors'=>$item->id]),'class'=>'form-horizontal delete','method'=>'POST']) !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    {!! Form::button('Удалить', ['class' => 'btn-danger','type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Html::link(route('admin.colors.create'), 'Добавить новую расцветку', ['class'=>'btn btn-success', ])!!}
    </div>
</div>

<script>
    $(".delete").on("submit", function(){
        return confirm("Вы действительно хотите удалить этот элемент?");
    });
</script>