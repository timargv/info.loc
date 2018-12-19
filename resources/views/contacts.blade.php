@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper w-100 " style="margin: 0; height: 1000px; z-index: 0;">
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">   

        <!-- Content Header (Page header) -->
        <section class="content-header" role="tablist">
                <h1>Контакты</h1>
        </section>

         
        <!-- Main content -->
        <div class="row">
            <div class="col-xs-9">
                <section class="content">
                    <div class="box">

                        <div class="box-header">

                            <div class="text-left">
                                Контакты
                            </div>
                            {{-- <div class="box-tools">
                                <div class="input-group input-group-md" style="max-width: 450px; margin-top: 6px;">
                                    <form class="input-group input-group-md" action="{{route('contacts')}}" method="GET">


                                        <input type="text" name="q" class="form-control pull-right" value="{{ request('q') }}" placeholder="Поиск менеджера">

                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                            @if(!empty(request('q')))
                                                <a href="{{route('contacts')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                            @endif
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <p></p> --}}
                        </div>
                        <div class=" box-body">
                            <table id="example2" class="table table-hover text-left dataTable">
                                <thead>
                                  <tr role="row">
                                    <th style="padding-left: 15px;">ID</th>
                                    <th><i class="fa fa-user"></i> Имя</th>
                                    <th><i class="fa fa-user"></i> Фамилия</th>
                                    <th><i class="fa fa-building-o"></i> Компания</th>
                                    <th><i class="fa fa-envelope"></i> E-mail </th>
                                    <th>Телефон <i class="fa fa-phone"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td style="padding-left: 15px;">{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->surname }}</td>
                                        <td>
                                            @if($contact->getManufacturerID())
                                            <a target="_blank" href="{{ $contact->getManufacturerHreaf() }}">{{ $contact->getManufacturersTitle() }}</a>
                                            @else
                                            {{ $contact->manufacturer_other }}
                                            @endif

                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->mobile_phone }}</td>

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
            </div>
            <div class="col-xs-3">
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
                                    <div class="col-xs-12">
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                            <input name="name" type="text" class="form-control" placeholder="* Имя"></div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                                            <input name="surname" type="text" class="form-control " placeholder="Фамилия"></div>
                                    </div>
                                </div>
                                 
                                <div class="clearfix row">
                                    <div class="col-xs-12">
                                        <label></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input name="email" type="text" class="form-control" placeholder="E-mail"></div>
                                    </div>
                                    <br />
                                    <br />
                                    <br />
                                    <div class="col-xs-12">
                                        <label></label>
                                        <div class="input-group ">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input name="mobile_phone" type="text" class="form-control " placeholder="+ 7 (999) 111-22-33"></div>
                                    </div>
                                </div>
                                <br>
     
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                                    {{Form::select('manufacturer_id', [null=>'Компания'] + 
                                        $manufacturers_list,
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
                        <button  class="btn btn-primary">Сохранить</button>
                    </div>
                    {{ Form::close() }}
                </div>
                </section>
            </div> 
        </div>  
        <!-- /.content -->

        </div>

        <div role="tabpanel" class="tab-pane fade" id="messages">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    П
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">

                    <div class="box-header">

                        <div class="text-left">
                            Поставщики
                        </div>
                        {{-- <div class="box-tools">
                            <div class="input-group input-group-md" style="max-width: 450px; margin-top: 6px;">
                                <form class="input-group input-group-md" action="{{route('manufacturers')}}" method="GET">


                                    <input type="text" name="q" class="form-control pull-right" value="{{ request('q') }}" placeholder="Поиск менеджера">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        @if(!empty(request('q')))
                                            <a href="{{route('manufacturers')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                        @endif
                                    </div>
                                </form>


                            </div>
                        </div>
                        <p></p> --}}
                    </div>
                    <div class="box-body ">
                        <table id="example1" class="table table-hover text-left dataTable">
                            <thead>
                            <tr role="row">
                                <th style="padding-left: 15px;">ID</th>
                                <th>Название</th>
                                <th>Код Товара</th>
                                <th>Сайт</th>
                                <th>email</th>
                                <th>Номер</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($manufacturers as $manufacturer)
                                <tr>
                                    <td style="padding-left: 15px;">{{ $manufacturer->id }}</td>
                                    <td>{{ $manufacturer->title }}
                                        @if($manufacturer->comment)
                                            <a tabindex="0" class="" role="button" data-toggle="popover" data-trigger="focus" title="Коммент" data-content="{{ $manufacturer->comment }}"><i class="fa fa-info-circle"></i></a>
                                        @endif
                                    </td>
                                    <td>{{ $manufacturer->code_product }}</td>
                                    <td><a href=" {{ $manufacturer->site_link }}" target="_blank">ссылка</a> </td>
                                    <td>{{ $manufacturer->email }}</td>
                                    <td>{{ $manufacturer->number }}</td>

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
        </div>

    </div>
    <!-- /.content-wrapper -->
    @endsection