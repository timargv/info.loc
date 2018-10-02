@extends('admin.layout')


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Список Контактов
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                </div>
                {{ Form::open(['route' => ['manufacturers.update', $manufacturer->id], 'method' => 'put']) }}

                <div class=" box-body ">

                    <div class="">

                        <div class="">

                            @include('admin.errors')
                            <div class="clearfix row">
                                <div class="col-xs-12">
                                    <label>Название</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="title" type="text" class="form-control" value="{{ $manufacturer->title }}"></div>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Email адрес</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input name="email" type="text" class="form-control" value="{{ $manufacturer->email }}"></div>
                                </div>

                                <div class="col-xs-6">
                                    <label>Телефон</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="number" type="text" class="form-control " value="{{ $manufacturer->number }}"></div>
                                </div>
                            </div>
                            <br>

                            <label>Сайт</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <input name="site_link" type="text" class="form-control " value="{{ $manufacturer->site_link }}"></div>
                            <br>

                            <label>Код продукта</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <input name="code_product" type="text" class="form-control " value="{{ $manufacturer->code_product }}"></div>
                            <br>

                            <label>Адрес</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                <input name="address" type="text" class="form-control " value="{{ $manufacturer->address }}"></div>

                            <br>

                            <label>Комментарий</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-comment-o"></i></span>
                                <textarea name="comment"  class="form-control">{{ $manufacturer->comment }}</textarea>
                        </div>

                        </div>

                </div>
                <div class="box-footer clearfix">
                    <a href="{{ route('manufacturers.index') }}"  class="btn btn-default">Закрыть</a>
                    <button  class="btn btn-primary">Сохранить</button>
                </div>
                {{ Form::close() }}

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
