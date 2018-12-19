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
                {{ Form::open(['route' => 'contacts.store']) }}

                <div class=" box-body ">

                    <div class="">

                        <div class="">

                            @include('admin.errors')
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Имя</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="name" type="text" class="form-control" placeholder="Иван"></div>
                                </div>

                                <div class="col-xs-6">
                                    <label>Фамилия</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="surname" type="text" class="form-control " placeholder="Иванов"></div>
                                </div>
                            </div>
                            <br>
                            <div class="clearfix row">
                                <div class="col-xs-6">
                                    <label>Email адрес</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input name="email" type="text" class="form-control" placeholder="email"></div>
                                </div>

                                <div class="col-xs-6">
                                    <label>Телефон</label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input name="mobile_phone" type="text" class="form-control " placeholder="+ 7 (999) 111-22-33"></div>
                                </div>
                            </div>
                            <br>

                            <label>Телефон</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-building-o"></i></span>


                                {{Form::select('manufacturer_id', [null=>'Компания'] + 
                                    $manufacturers,
                                    null,
                                    ['class' => 'form-control select2', 'style' => 'width: 100%'])
                                  }}


                            </div>

                            <div class="clearfix row">
                                <div class="col-xs-12">
                                    <label></label>
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                        <input name="manufacturer_other" type="text" class="form-control " placeholder="Другая Компания"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="box-footer clearfix">
                    <button  class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button  class="btn btn-primary">Сохранить</button>
                </div>
                {{ Form::close() }}

            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
