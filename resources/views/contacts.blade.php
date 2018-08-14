@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper w-100 " style="margin: 0; height: 1000px; z-index: 0;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                К
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">

                <div class="box-header">

                    <div class="text-left">
                        Контакты
                    </div>
                    <div class="box-tools">
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
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td style="padding-left: 15px;">{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->surname }}</td>
                                <td>{{ $contact->getManufacturersTitle()  }}</td>
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @endsection