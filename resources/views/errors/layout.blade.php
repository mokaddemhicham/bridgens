@extends('master.layout')
@section('content')
    <section style="background: rgba(0, 0, 0, 0) url('../uploads/images/1.png') repeat scroll center bottom / cover;">
        <div class="container" >
            <div class="row">
                <div class="col-md-6 offset-md-3 col-sm-12  d-flex align-items-center" style="height: 100vh">
                    @yield('error')
                </div>
            </div>
        </div>
    </section>
@endsection