
<div class="box box-primary">
    <div class="box-header with-border">

    </div>
    <!-- /.box-header -->
    <!-- form start -->

    {!! Form::open (['url'=>(isset($colors->id)) ? route('admin.colors.update',['item'=>$colors->id]) : route('admin.colors.store'),'class'=>"form-horizontal", 'enctype'=>'multipart/form-data'])!!}
    <div class="box-body">
        <div class="form-group">

        </div>
        <div class="form-group">
            {!! Form::label('color','Название цвета ',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('color', isset($colors->color) ? $colors->color :old('color'), ['placeholder'=>'Название цвета', 'class'=>'form-control','required'=>'required', 'id'=>'color']) !!}
            </div>
        </div>

        {{--       // IMG        --}}

        @if(isset($colors->img))
            <div class="form-group">
                {!! Form::label('img','Фото',['class'=>'col-sm-3 control-label']) !!}
                <div class="col-sm-9">

                    {!!  Html::image(asset('/assets/images/colors/thumbs/'.$colors->img),$colors->color, ['class'=>'img-responsive'])!!}
                    {!!Form::hidden('old_image', $colors->img)!!}
                </div>
            </div>
        @endif
        <div class="form-group">
            {!! Form::label('img','Загрузить фото',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::file('img',['class'=>'filestyle','data-buttonText'=>'Выберете файл','data-buttonName'=>'btn-primary', 'data-placeholder'=>'Файл не выбран', isset($colors->img) ? '' :'required="required"']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('price','Цена',['class'=>'col-sm-3 control-label']) !!}
            <div class="col-sm-9">
                {!! Form::text('price', isset($colors->price) ? $colors->price :old('price'), ['placeholder'=>'Цена', 'class'=>'form-control','required'=>'required', 'id'=>'price']) !!}
            </div>
        </div>


        @if(isset($colors->id))
            <input type="hidden" name="_method" value="PUT">
        @endif
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Сохранить', ['class'=>'btn btn-primary', 'type'=>'submit']) !!}
            </div>
        </div>
    </div><!-- //box-body -->
    <div class="box-footer">
    </div>
    {!! Form::close() !!}
</div>
