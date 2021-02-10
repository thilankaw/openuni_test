@extends('layouts.app')

@section('content')
<style> table.edTable { width: 100%; font: 17px calibri; } table, table.edTable th, table.edTable td { border: solid 1px #9b58b5; border-collapse: collapse; padding: 2px 3px; text-align: center; } table.edTable td { background-color: #ffffff; color: #000000; font-size: 14px; } table.edTable th { background-color : #000000; color: #ffffff; } tr:hover td { background-color: #9b58b5; color: #dddddd; } </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Edit Application</div>

                <div class="card-body">
                    <form method="POST" onsubmit="return validateForm(this)" action="{{ route('application.update') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Surname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="surname" value="{{ $applicant->surname }}" required autocomplete="name" autofocus>
                                <input type="hidden" id="applicant_id" name="applicant_id" value="{{ $applicant->id }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="first_name" value="{{ $applicant->first_name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">National Id No</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="national_id_no" value="{{ $applicant->national_id_no }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Mobile No</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="mobile_no" value="{{ $applicant->mobile_no }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $applicant->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" value="{{ $applicant->age }}" name="age" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" value="{{ $applicant->age }}" name="address" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Educational Qulifications</label>
                            <div class="col-md-6">
                                <button type="button" id="eduAddBtn" data-eduRowCount="0" onclick="addRow()" class="btn btn-success">Add</button>
                            </div>                          
                        </div>

                        <div class="form-group row">
                            <table class="table" id="education_tbl" name="education_tbl">
                                <thead>
                                <tr>
                                    <th>Title of degree/diploma</th>
                                    <th>Class</th>
                                    <th>University name</th>
                                    <th>Effective Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($eduQli as $key => $edu)
                                <tr>
                                    
                                    <td><input type="text" value="{{ $edu->title_of_degree_or_certificate }}" name="title[]"></td>
                                    <td><input type="text" value="{{ $edu->class }}" name="class[]"></td>
                                    <td><input type="text" value="{{ $edu->university_name }}" name="university[]"></td>
                                    <td><input type="date" value="{{ $edu->date_of_graduation }}" name="efe_date[]"></td>
                                    <td><input type="button" value="Remove" class="btn btn-danger" onclick="removeRowEdu(this)"></td>                          
                                </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                            <input id="educational_qli" type="hidden" name="educational_qli[]" >
                            
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Work Experience</label>
                            <div class="col-md-6">
                                <button type="button" id="workAddBtn" data-workRowCount="0"  onclick="addRowWork()" class="btn btn-success">Add</button>
                            </div>                           
                        </div>

                        <div class="form-group row">
                            <table class="table" name="work_exp_tbl" id="work_exp_tbl">
                                <thead>
                                <tr>
                                    <th>Company Name</th>
                                    <th>Position</th>
                                    <th>From</th>
                                    <th>To</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($workExp as $key => $wExp)
                                <tr>
                                    
                                    <td><input type="text" value="{{ $wExp->company_name }}" name="company_name[]"></td>
                                    <td><input type="text" value="{{ $wExp->position }}" name="possition[]"></td>
                                    <td><input type="text" value="{{ $wExp->start_date }}" name="start_date[]"></td>
                                    <td><input type="date" value="{{ $wExp->end_date }}" name="end_date[]"></td>
                                    <td><input type="button" value="Remove" class="btn btn-danger" onclick="removeRowEdu(this)"></td>                          
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <input id="work_exp" type="hidden" name="work_exp[]" >
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

   $(document).ready(function () {
        //$('#education_tbl').hide();
        //$('#work_exp_tbl').hide();
        $('#logBtn').click(function () {
            $("#work_exp_tbl").show();
            $('#education_tbl').show();
            //$("#work_exp_tbl").fadeToggle('fast');
        });
    });
    // first create a TABLE structure by adding few headers.
   /* function createTable() {
        var empTable = document.createElement('table');
        empTable.setAttribute('id', 'empTable');  // table id.

        var tr = empTable.insertRow(-1);

        for (var h = 0; h < arrHead.length; h++) {
            var th = document.createElement('th'); // the header object.
            th.innerHTML = arrHead[h];
            tr.appendChild(th);
        }

        var div = document.getElementById('cont');
        div.appendChild(empTable);    // add table to a container.
    }
*/
    // function to add new row.
    function addRow() {

        var btnRowCount = $("#eduAddBtn").attr("data-eduRowCount");
        if( btnRowCount == 0){
            
            $("#eduAddBtn").html('+');
            btnRowCount++;
            
        }else if(btnRowCount > 0){
            $("#eduAddBtn").html('+');
            btnRowCount++;
        }
        var empTab = document.getElementById('education_tbl');

        var rowCnt = empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < 5; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if(c == 4) {   // if its the first column of the table.
                // add a button control.
                var button = document.createElement('input');

                // set the attributes.
                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
                button.setAttribute('class', 'btn btn-danger');

                // add button's "onclick" event.
                button.setAttribute('onclick', 'removeRowEdu(this)');

                td.appendChild(button);
            }
            else if (c == 3 ) {
                
                var ele = document.createElement('input');
                ele.setAttribute('type', 'date');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'efe_date[]');

                td.appendChild(ele);
            }
            else if (c == 0 ){
                // the 2nd, 3rd and 4th column, will have textbox.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'title[]');

                td.appendChild(ele);
            }else if (c == 1 ){
                // the 2nd, 3rd and 4th column, will have textbox.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'class[]');

                td.appendChild(ele);
            }else if (c == 2 ){
                // the 2nd, 3rd and 4th column, will have textbox.
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'university[]');

                td.appendChild(ele);
            }
        }
        $("#eduAddBtn").attr("data-eduRowCount", btnRowCount);
        $('#education_tbl').show();
    }

    function addRowWork() {

        var btnRowCount = $("#workAddBtn").attr("data-workRowCount");
        if( btnRowCount == 0){
            
            $("#workAddBtn").html('+');
            btnRowCount++;
            
        }else if(btnRowCount > 0){
            $("#workAddBtn").html('+');
            btnRowCount++;
        }

        var workExp = document.getElementById('work_exp_tbl');

        var rowCnt = workExp.rows.length;    // get the number of rows.
        var tr = workExp.insertRow(rowCnt); // table row.
        tr = workExp.insertRow(rowCnt);

        for (var c = 0; c < 5; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if(c == 4) {   
                var button = document.createElement('input');

                button.setAttribute('type', 'button');
                button.setAttribute('value', 'Remove');
                button.setAttribute('class', 'btn btn-danger');

                button.setAttribute('onclick', 'removeRowWork(this)');

                td.appendChild(button);
            }
            else if (c == 2) {
                
                var ele = document.createElement('input');
                ele.setAttribute('type', 'date');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'start_date[]');

                td.appendChild(ele);
            } else if (c == 3 ) {
                
                var ele = document.createElement('input');
                ele.setAttribute('type', 'date');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'end_date[]');

                td.appendChild(ele);
            }else if (c == 0 ) {
                
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'company_name[]');

                td.appendChild(ele);
            }
            else if (c == 1 ) {
                
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('value', '');
                ele.setAttribute('name', 'possition[]');

                td.appendChild(ele);
            }
        }
        $("#workAddBtn").attr("data-workRowCount", btnRowCount);
        $('#work_exp_tbl').show();
    }

    // function to delete a row.
    function removeRowEdu(removeButton) {
        var btnRowCount = $("#eduAddBtn").attr("data-eduRowCount");
        alert(btnRowCount);
        if( btnRowCount == 1){
            
            $("#eduAddBtn").html('Add');
            --btnRowCount;
            $('#education_tbl').hide();
            
        }else if(btnRowCount > 1){
            $("#eduAddBtn").html('+');
            $('#education_tbl').show();
            --btnRowCount;
        }
        var empTab = document.getElementById('education_tbl');
        empTab.deleteRow(removeButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        $("#workAddBtn").attr("data-workRowCount", btnRowCount);
        
    }

    function removeRowWork(removeButton) {
        var btnRowCount = $("#workAddBtn").attr("data-workRowCount");
        if( btnRowCount == 1){
            
            $("#workAddBtn").html('Add');
            --btnRowCount;
            $('#work_exp_tbl').hide();
            
        }else if(btnRowCount > 1){
            $("#workAddBtn").html('+');
            $('#work_exp_tbl').show();
            --btnRowCount;
        }
        var empTab = document.getElementById('work_exp_tbl');
        empTab.deleteRow(removeButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
        $("#workAddBtn").attr("data-workRowCount", btnRowCount);
    }

    // function to extract and submit table data.
    function validateForm(form) { 
         
         var isValid = new Boolean();
             isValid = true;   
         var eduBtnRowCount = $("#eduAddBtn").attr("data-eduRowCount");
         var workBtnRowCount = $("#workAddBtn").attr("data-workRowCount");
         
         if(eduBtnRowCount == 0){
                 alert("please Add Eduqational Qulifications");
                 $('#education_tbl').focus();
                 isValid =  false;
                 return false;
         }else if(workBtnRowCount == 0){
             alert("please Add Work Experience");
                 $('#work_exp_tbl').focus();
                 isValid =  false;
                 return false;
         }    
         return isValid; 
     }
</script>
