@extends('layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Patient Detail</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            
            <li class="breadcrumb-item"><a href="{{ route('midwife.patient.list')}}">Patient</a></li>
            <li class="breadcrumb-item active">Patient Detail</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="#" class="tab-wizard wizard-circle">
                    <!-- Patient Info -->
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Patient :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$patient->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Phone Number :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$patient->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name1">Patient Name :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$patient->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Date of Birth :</label>
                                    <input type="date" class="form-control" id="date1" disabled value="{{$patient->dob}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1">Address :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$patient->address}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="blood1">Blood Type :</label>
                                    <input type="text" class="form-control" disabled id="blood1" value="{{$patient->blood_type}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="gender1">Gender :</label>
                                    <input type="text" class="form-control" disabled id="gender1" value="{{ $patient->gender === "M" ? "Male" : "Female" }}">
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
                <hr>
                <label>Patient History</label>
                <table id="myTable" class="table table-bordered table-striped">
                    <tr>
                        <thead>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Download Diagnosis</th>
                        </thead>
                    </tr>
                    @foreach($registration as $row)
                    @if(isset($registration))
                       <tr>
                            <td>{{ $row->diagnosis->id}}</td>
                            <td>{{ $row->diagnosis->created_at}}</td>
                            <td>
                                    @if (isset($row->evidence)){
                                        <a href="{{ Storage::url($row->evidence) }}"><span><i class="fa fa-download"></i></span></a>                                    
                                    @else
                                        <a href="{{ route('midwife.diagnosis.detail2', $row->id) }}"><span><i class="fa fa-search"></i></span></a>                                    
                                    @endif
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>

  
@endsection