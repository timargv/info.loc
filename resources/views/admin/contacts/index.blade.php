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

                    <div class="">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> &nbsp; Добавить</button>
                    </div>
                    <div class="box-tools">
                        <div class="input-group input-group-md" style="width: 450px; margin-top: 6px;">
                            <form class="input-group input-group-md" action="{{route('contacts.index')}}" method="GET">


                                <input type="text" name="q" class="form-control pull-right" value="{{ request('q') }}" placeholder="Поиск менеджера">

                                <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    @if(!empty(request('q')))
                                        <a href="{{route('contacts.index')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
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
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Компания</th>
                            <th>email</th>
                            <th>Мобильный</th>
                            <th></th>
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td style="padding-left: 15px;">{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->surname }}</td>
                                <td>{{ $contact->getManufacturersTitle()  }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->mobile_phone }}</td>
                                <td width="150px">
                                    <div class="form-inline">
                                    <a class="form-inline" href="#">ред.</a>

                                    {{ Form::open(['route' => ['contacts.destroy', $contact->id], 'method' => 'delete', 'class' => 'form-group']) }}
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
                    {{$contacts->appends(['q' => \Illuminate\Support\Facades\Input::get('q')])->links()}}
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
                    <h4 class="modal-title">Добавить Контакт</h4>
                </div>
                {!! Form::open(['route' => 'contacts.store']) !!}

                <div class="modal-body">

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


                            {{Form::select('manufacturers_id',
                                $manufacturers,
                                null,
                                ['class' => 'form-control select2', 'style' => 'width: 100%'])
                              }}
                        </div>

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
