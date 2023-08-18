@extends('master.front.master')
@section('body')
    @include('master.front.masterheader')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                   <h3 class="text-center text-success">Welcome {{Session::get('customer_name')}} Your Order Place successfully.we will contact with you soon...</h3>
                </div>
            </div>
        </div>
    </section>


    
@endsection
