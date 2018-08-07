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
                    <h3 class="box-title">Поставщики</h3>

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
                            <th>Название</th>
                            <th>Номер</th>
                            <th>email</th>
                            <th>Ссылка</th>
                            <th>Код продукта</th>
                            <th></th>
                        </tr>
                        @foreach($manufacturers as $manufacturer)
                            <tr>
                                <td>{{ $manufacturer->id }}</td>
                                <td>{{ $manufacturer->title }}</td>
                                <td>{{ $manufacturer->number }}</td>
                                <td>{{ $manufacturer->email }}</td>
                                <td>{{ $manufacturer->site_link }}</td>
                                <td>{{ $manufacturer->code_product }}</td>
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
                    {{ $manufacturers->links() }}
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

{{--$table->increments('id');--}}
{{--$table->string('title');--}}
{{--$table->string('slug');--}}
{{--$table->string('number')->nullable();--}}
{{--$table->string('email')->nullable();--}}
{{--$table->string('site_link')->nullable();--}}
{{--$table->string('code_product')->nullable();--}}
{{--$table->string('address')->nullable();--}}
{{--$table->timestamps();--}}