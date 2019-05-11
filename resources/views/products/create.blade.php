@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Product')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Product Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addVariation">{{ __('Add Variation') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data" >
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{{ __('Description') }}</label>
                                        <input type="text" name="description" class="form-control"  value="" required >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{{ __('Product Code') }}</label>
                                        <input type="text" name="productCode" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Purchase Price') }}</label>
                                        <input type="text" name="purchase_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Sale Price') }}</label>
                                        <input type="text" name="sale_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Purchase VAT') }}</label>
                                        <input type="text" name="purchase_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Sale VAT') }}</label>
                                        <input type="text" name="sale_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Brand') }}</label>
                                        <select class="form-control" name="brand" required>
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Category') }}</label>
                                        <select class="form-control" name="category" required>
                                            <option></option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Variation') }}</label>
                                        <select class="form-control" name="variation" required>
                                            <option></option>
                                            @foreach($variations as $variation)
                                            <option value="{{$variation->id}}">{{$variation->name}}:{{$variation->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('On Hand Quantity') }}</label>
                                        <input type="text" name="quantity" class="form-control"  value="" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label class="form-control-label" >{{ __('Product Cover Image') }}</label>
                                        <input type="file" name="coverImage" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                        <input type="file" name="imageOne" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                        <input type="file" name="imageTwo" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                        <input type="file" name="imageThree" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addVariation" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <form method="post" action="{{ route('products.variation.store') }}" autocomplete="off">
                            @csrf 
                            <h6 class="heading-small text-muted mb-2">{{ __('Add New Variation') }}</h6>
                            
                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-12 mb-1">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus>
                                    </div>
                                    <div class="form-group col-md-12 mb-1">
                                        <label class="form-control-label" for="input-name">{{ __('Value') }}</label>
                                        <input type="text" name="value" id="input-name" class="form-control"  value="" required >
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success w-100 ">{{ __('Save') }}</button>
                                </div>
                            
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.dropify').dropify({
                messages: {
                    'default': 'Product Image',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection