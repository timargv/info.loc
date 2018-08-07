

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
                    <h3 class="box-title">Контакты</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>

                        </thead>
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Компания</th>
                            <th>email</th>
                            <th>Мобильный</th>
                            <th></th>
                        </tr>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->surname }}</td>
                                <td>{{ $contact->getManufacturersTitle()  }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->mobile_phone }}</td>
                                <td>
                                    <a href="#">ред.</a>
                                    <a href="#">удалить</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $contacts->links() }}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--$table->string('name');--}}
{{--$table->string('surname');--}}
{{--$table->integer('manufacturers_id')->nullable();--}}
{{--$table->string('email')->nullable();--}}
{{--$table->string('mobile_phone')->nullable();--}}
{{--$table->string('office_phone')->nullable();--}}
{{--$table->string('office_phone_dop')->nullable();--}}
{{--$table->string('function')->nullable();--}}