@extends('admin.layouts.master')

@section('page')
    Dashboard
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="fa fa-id-card"></i>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="numbers">
                                <p>Bar Infringement Notice (BIN)</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{ url('admin/viewbin') }}"><i class="ti-panel"></i> Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-danger text-center">
                                <i class="fa fa-id-card"></i>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="numbers">
                                <p>Entertainment Infringement Notice (EIN)</p>

                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <a href="{{ url('admin/viewein') }}"><i class="ti-panel"></i> Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection