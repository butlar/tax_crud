@extends('layout.master')
@section('page_title', 'lists')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="container center">
                <div class="col-lg-12 col-md-12 ">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Product Listings</h4> 
                            <a type="button" class="btn btn-warning" href="{{ url('/post/add' ) }}">Add</a>
                        </div>
                        @if (Session::has('msg'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span>
                            </button>
                            <strong> {{ session('msg') }}</strong>
                        </div>

                        @endif
                        <div class="card-body p-1 ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <tr>
                                            <th>SR.No</th>
                                            <th>ID</th>
                                            <th width='15%'>Image</th>
                                            <th width='1%'>Name</th>
                                            <th width='1%'>Description</th>
                                            <th width='1%'>Product Type</th>
                                            <th width='1%'>Price</th>
                                            <th width='1%'>Tax Type</th>
                                            <th width='1%'>Tax Percentage</th>
                                            <th width='1%'>Net Price (calculated ) </th>
                                            <th width='1%'>Tax Amount (calculated) </th>
                                            <th>ACTION </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $list)
                                        <tr>
                                            {{-- <td class="fa fa-star">{{ $no++ }}</td> --}} {{-- For sr.no iteration coming from controller --}}
                                            <td class="fa fa-star">{{ $loop->iteration }}</td> {{-- For sr.no iteration --}}
                                            <td class="fa fa-star">{{ $list->id }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/post/' . $list->image) }}" width="50%"
                                                    height="20%" />
                                            </td>
                                            <td>{{$list->name}}</td>
                                            <td>{{$list->description}}</td>
                                            <td>{{$list->product_type}}</td>
                                            <td>{{$list->price}}</td>
                                            <td>{{$list->tax_type}} </td>
                                            <td>{{$list->tax_percent}}</td>
                                            <td>{{$list->net_price}}</td>
                                            <td>{{$list->tax_amount}}</td>
                                            <td width="20%">
                                                <a type="button" class="btn btn-info color_white"
                                                    href="{{ url('/post/edit/'.$list->id ) }} ">Edit</a>

                                                <a type="button" class="btn btn-danger color_white"
                                                    href="{{ url('/post/delete/'.$list->id ) }}">Del</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>