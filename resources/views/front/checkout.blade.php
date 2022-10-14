@extends('front.layout.main')
@section('content')
<!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    {!! Form::open( ['route' => ['checkout.order' ]]) !!}

                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="first_name" placeholder="John" value="{{Auth::guard('customer')->user()->name}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="last_name" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="email" type="text" placeholder="{{Auth::guard('customer')->user()->email}}">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" name="mobile" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" placeholder="123 Street">
                        </div>
                       
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select" name="country">
                                <option selected value="Egypt">Egypt</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text"  name="city" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" name="state" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" name="zip_code" placeholder="123">
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                       

                        <div class="col-md-12 form-group">
                           
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                         @foreach ($products as $product)
                        <div class="d-flex justify-content-between">
                            <p>{{$product->product->name}}</p>
                            <p>${{$product->qty * $product->product->after_price}}</p>
                        </div>
                        @endforeach
                        <hr class="mt-0">
                        
                        
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">${{$total}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order</h4>
                    </div>
                    
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                     {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection