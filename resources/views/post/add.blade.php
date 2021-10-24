@extends('layout.master')
@section('page_title', 'Add Items')

@section('content')
<div class="container  center">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Product</h2>

                        <div class="pt-2 pb-2">
                            <a class="btn btn-primary" href="{{ url('/post/list')}}">
                                Back</a>
                            <br>
                        </div>
                </div>
                @if(Session()->has('msg'))
                <div class="alert alert-success"> {{ Session::get('msg') }}</div>
                @endif
                <div class="card-body card-block">
                    <form action="{{url('/post/submit')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="name" name='name' class="form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="name" name="name" placeholder="Text" class="form-control">
                                    {{-- <small class="form-text text-muted">This is a help text</small> --}}
                                </div>
                                @error('name')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="description" class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea id="description" name="description" rows="3" placeholder="Content..."
                                        class="form-control"></textarea>
                                </div>
                                @error('description')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="product_type" class=" form-control-label">Product Type</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="product_type" id="product_type" class="form-control">
                                        <option value="">Please select</option>
                                        <option value="Mobile">Mobile</option>
                                        <option value="Watch">Watch</option>
                                        <option value="Book">Book</option>
                                        <option value="Apparels">Apparels</option>
                                    </select>
                                </div>
                                @error('product_type')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tax_type" class=" form-control-label">Tax Type</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <select name="tax_type" id="tax_type" class="form-control">
                                        <option value="">Please select</option>
                                        <option value="include">INCLUDE</option>
                                        <option value="exclude">EXCLUDE</option>
                                    </select>
                                </div>
                                @error('tax_type')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="price" class=" form-control-label">Price</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="price" name="price" placeholder="price" class="form-control">

                                </div>
                                @error('price')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="tax_percent" class=" form-control-label">Tax Percent</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="tax_percent" name="tax_percent" placeholder="tax percent"
                                        class="form-control">

                                </div>
                                @error('tax_percent')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="image" class="form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="image" name="image" class="form-control-file">
                                </div>
                                @error('image')
                                <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                         
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>



            </form>
        </div>
    </div>