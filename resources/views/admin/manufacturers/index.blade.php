@extends('admin.layout')


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Список Поставщиков
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                    <div class="">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> &nbsp; Добавить</button>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-md" style="width: 450px; margin-top: 6px;">
                            <form class="input-group input-group-md" action="{{route('manufacturers.index')}}" method="GET">


                                <input type="text" name="q" class="form-control pull-right" value="{{ request('q') }}" placeholder="Поиск менеджера">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    @if(!empty(request('q')))
                                        <a href="{{route('manufacturers.index')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                    @endif
                                </div>
                            </form>


                        </div>
                    </div>
                    <p></p>
                </div>
                <div class=" box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th style="padding-left: 15px;">ID</th>
                            <th>Название</th>
                            <th>Код Тора</th>
                            <th>Сайт</th>
                            <th>email</th>
                            <th>Номер</th>
                            <th width="300px">Адрес</th>
                            <th></th>
                        </tr>
                        @foreach($manufacturers as $manufacturer)
                            <tr>
                                <td style="padding-left: 15px;">{{ $manufacturer->id }}</td>
                                <td>{{ $manufacturer->title }}</td>
                                <td>{{ $manufacturer->code_product }}</td>
                                <td><a href="{{ $manufacturer->site_link }}" target="_blank">ссылка</a> </td>
                                <td>{{ $manufacturer->email }}</td>
                                <td>{{ $manufacturer->number }}</td>
                                <td>{{ $manufacturer->address }}</td>

                                <td width="150px">
                                    <div class="form-inline">
                                        <a class="form-inline" href="{{ route('manufacturers.edit', $manufacturer->id) }}">ред.</a>

                                        {{ Form::open(['route' => ['manufacturers.destroy', $manufacturer->id], 'method' => 'delete', 'class' => 'form-group']) }}
                                        <button onclick="return confirm('Удалить?')" class="btn btn-link">удалить</button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{$manufacturers->appends(['q' => \Illuminate\Support\Facades\Input::get('q')])->links()}}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Добавить Поставщика</h4>
                </div>
                {!! Form::open(['route' => 'manufacturers.store']) !!}

                <div class="modal-body">

                    <div class="">

                        @include('admin.errors')
                        <div class="clearfix row">
                            <div class="col-xs-12">
                                <label>Название</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="title" type="text" class="form-control" placeholder="ООО Атис"></div>
                            </div>
                        </div>
                        <br>
                        <div class="clearfix row">
                            <div class="col-xs-6">
                                <label>Email адрес</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input name="email" type="text" class="form-control" placeholder="info@atis36.ru"></div>
                            </div>

                            <div class="col-xs-6">
                                <label>Телефон</label>
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="number" type="text" class="form-control " placeholder="+ 7 (999) 111-22-33"></div>
                            </div>
                        </div>
                        <br>

                        <label>Сайт</label>
                        <div class="input-group ">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input name="site_link" type="text" class="form-control " placeholder="Пример: www.atis36.ru"></div>
                        <br>

                        <label>Код продукта</label>
                        <div class="input-group ">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input name="code_product" type="text" class="form-control " placeholder="Пример: 100 "></div>
                        <br>

                        <label>Адрес</label>
                        <div class="input-group ">
                            <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                            <input name="address" type="text" class="form-control " placeholder="Воронеж, ул. Антонова-Овсеенко, 7"></div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button  class="btn btn-primary">Сохранить</button>
                </div>
                {!! Form::close() !!}

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection
