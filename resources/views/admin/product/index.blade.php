<?php
?>
@extends('admin.home')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li><a href="#">Products</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <a href="{{ url('admincp/product/create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i>
            <span>Add Product</span>
        </a>
        <p style="height: 5px"></p>
        @if (Session::has('message'))
            <div class="alert alert-info"> {{ Session::get('message') }}</div>
        @endif
        <input type="text" id="myInput" onkeyup="searchByColumnNo('1')" placeholder="Search for names.." class="form-control">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-sm-12">
                        @if (isset($listProduct) && count($listProduct) >0)
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">ID</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Mô tả</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Nội dung</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Giá</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="">Actions</th></tr>
                            </thead>
                            <tbody>
                            @if (isset($listProduct) && count($listProduct) >0)
                                @foreach($listProduct as $product)
                                    <tr role="row" class="odd">
                                        <td>{{ $product->id }}</td>
                                        <td class="sorting_1">{{ $product->name }}</td>
                                        <td>{{ $product->desc }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('admincp/product')}}/{{ $product->id }}/edit" class="btn btn-default bg-purple">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Edits</span>
                                                </a>
                                                <a href="#" class="btn btn-default bg-red btnDelete"  data-value="{{ $product->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @else
                            <h1>Không có data</h1>
                        @endif
                        <div style="float:right">
                            {!! $listProduct->render() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    <form action="" method="post" id="formDelete">
        <input type="hidden" name="_method" value="DELETE">
        {{ csrf_field() }}
    </form>
    <div id="confirm" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirm delete</h4>
                </div>
                <div class="modal-body">
                    <p> Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
                    <button type="button" data-dismiss="modal" class="btn">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-js-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btnDelete').click(function(){
                var userId = $(this).attr('data-value');
                $('#confirm')
                    .modal({ backdrop: 'static', keyboard: false })
                    .one('click', '#delete', function (e) {
                        //delete function
                        var actionLink = "{{ url('admincp/product')}}/"+ userId;
                        $('#formDelete').attr('action', actionLink).submit();
                    });
            });
        });
    </script>
@endsection
