@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{isset ($registration) ? "Edit Registration" : "Add Registration" }}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{isset ($registration) ? "Edit Registration" : "Add Registration" }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')`
<form name="myForm" action="{{ isset ($registration) ? route('admin.registration.update',$registration->id) : route('admin.registration.store')}}" method="POST">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="row p-t-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{--  {{isset ($registration) && $row->id=$registration->patient_id ? $registration->patient_id  : $row->id}}  --}}
                            <label class="control-label">Patient</label>                            
                              
                            @if(isset($registration))
                            <select id="id" class="form-control custom-select" name="patient_id" disabled>
                                @foreach($patients as $row)
                                <option   value="{{$row->id}}">{{$row->id=str_pad($row->id, 6, '0', STR_PAD_LEFT)}} - {{ $row->name }} </option>                                                                   
                                @endforeach
                            </select>
                            @else
                            <select id="id" class="form-control custom-select" name="patient_id" >
                                @foreach($patients as $row)
                                <option   value="{{$row->id}}">{{$row->id=str_pad($row->id, 6, '0', STR_PAD_LEFT)}} - {{ $row->name }}</option>                                                                   
                                @endforeach
                            </select>
                            @endif                            
                            
                        </div>

                        <!-- <div class="form-group">
                            {{--  {{isset ($registration) && $row->id=$registration->patient_id ? $registration->patient_id  : $row->id}}  --}}
                            <label class="control-label">Doctors</label>                            
                                
                            @if(isset($registration))
                            
                            <select id="id" class="form-control custom-select" name="doctor_id" disabled>
                                @foreach($doctors as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach
                            </select>
                            @else
                            <select id="stafflist" class="form-control custom-select" name="doctor_id" >
                                @foreach($doctors as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach                                                                   
                            </select>
                            @endif                            
                            
                        </div> -->

                    </div>
                    <!--/span-->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Type</label>
                            <div class="m-b-10">

                                <label class="custom-control custom-radio">
                                    <input id="radio5" value= "0" name="radio_type" type="radio" class="custom-control-input" checked>
                                    <span class="custom-control-label">General</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio6" value= "1" name="radio_type" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">Obgyn</span>
                                </label>                                                                  
                                
                            </div>
                        </div>
                    </div>                    
                    <!--/span-->
                </div>

                
                <!--/row-->
                <div class="row p-t-12">
                        <div class="col-md-6">
                        <div >
                                <label class="control-label">Blood Pressure</label>
                                <input type="text" id="blood" class="form-control" name="blood_pressure" value="{{isset ($registration) ? $registration->blood_pressure : ""  }}" >
                                <small class="form-control-feedback">  </small> 
                            </div>
                        <!-- <div >
                            <label class="control-label">Name</label>
                            <input type="text" id="name" disabled class="form-control" name="name" value="{{isset ($registration) ? $registration->patient->name : ""  }}" placeholder="{{isset ($registration) ? $registration->patient->name : ""  }}">
                            <small class="form-control-feedback">  </small>                         
                        </div> -->
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{--  {{isset ($registration) && $row->id=$registration->patient_id ? $registration->patient_id  : $row->id}}  --}}
                            <label id="label-doctor-midwife" class="control-label">Doctor</label>                            
                                
                            @if(isset($registration))
                            
                            <select id="select-doctor" class="form-control custom-select" name="doctor_id" >
                                @foreach($doctors as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach
                            </select>

                            <select id="select-midwife" class="form-control custom-select" name="midwife_id">
                                @foreach($midwifes as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach
                            </select>

                            @else
                            
                            <select id="select-doctor" class="form-control custom-select" name="doctor_id" >
                                @foreach($doctors as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach                                                                   
                            </select>
                            
                            <select id="select-midwife" class="form-control custom-select" name="midwife_id">
                                @foreach($midwifes as $row)
                                <option   value="{{$row->id}}">{{ $row->name }} </option>                                                                   
                                @endforeach
                            </select>
                            @endif                            
                            
                        </div>
                    </div>
                </div>
                    <!--/span-->

                <div class="row p-t-12">
                    <div class="col-md-6">
                        <div >
                            <label class="control-label">Weight</label>
                            <input type="text" class="form-control" name="weight" value="{{isset ($registration) ? $registration->weight : ""  }}" >
                            <small class="form-control-feedback">  </small> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div >
                            <label class="control-label">High</label>
                            <input type="text" class="form-control" name="high" value="{{isset ($registration) ? $registration->high : ""  }}" >
                            <small class="form-control-feedback">  </small> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Complaint</label>
                            <textarea class="textarea_editor form-control" rows="3"  name="complaint"   >{{isset ($registration) ? $registration->complaint :  "" }}</textarea>
                            
                        </div>
                    </div>
                </div>

                 

                

                

                <!--/row-->
                
                <!--/row-->
                
            <div class="form-actions">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                <button type="reset" class="btn btn-inverse">Cancel</button>
            </div>
                
            </div>
        </div>
    </div>
</div>

</form>
<!-- <script>
    var rad = document.myForm.type;
    var prev = null;
    for(var i = 0; i < rad.length; i++) {
        rad[i].onclick = function() {
            if(this !== prev) {
                prev = this;
                console.log(this.value);
                if(this.value == "0"){
                    $('#stafflist').empty();
                    $.each(doctors, function(index,value){
                        $('#stafflist').append('<option   value="'+value.id+'">"'+value.name+'" </option>');
                    });
                    
                }
            }
        };
    }
</script>  -->
@endsection

@section('script')
<script>
$('#id').on('change', function() {
    var selected = $(this).val();
    $("#name").val(selected);
})
</script>`
<script>

    // var rad = document.myForm.myRadios;
    // var prev = null;
    // for(var i = 0; i < rad.length; i++) {
    //     rad[i].onclick = function() {
    //         (prev)? console.log(prev.value):null;
    //         if(this !== prev) {
    //             prev = this;
    //         }
    //         console.log(this.value)
    //     };
    // }

    $(document).ready(function() {
        $('#select-midwife').hide();
    });

    $(document).on('click', '[name="radio_type"]', function () {
        if($(this).val() == 0){
            $('#label-doctor-midwife').html('Doctor');
            $('#select-doctor').show();
            $('#select-midwife').hide();
        }
        else{
            $('#label-doctor-midwife').html('Midwife');
            $('#select-doctor').hide();
            $('#select-midwife').show();
        }
    });
</script>
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection
