<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with Vertical Partition</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <style>
        thead.thead-dark {
            background-color: #212529 !important;
        }
        .divider {
            border-left: 2px solid #ddd;
            margin-top: 30px;
            margin-bottom: 30px;
            height: 100%;
            width: 1px;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #218838;
            color: white;
        }
        .table th, .table td {
            text-align: center;
        }
        .table th {
            background-color: #f8f9fa;
        }
        .form-label {
            font-weight: bold;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: green;
            margin-bottom: 15px;
        }
        .guesthouselink {
            color: white;
        }
        .title {
            font-size: 1.5rem;
            font-weight: bold;
            color: green;
            margin-left: 60px;
            margin-bottom: 15px;
        }
        .btnsubmit {
    background: #77b729;
    color: #fff;
    border: 0;
    outline: 0;
    margin-bottom: 18px;
    padding: 10px 20px;
    border-radius: 4px;
    font-weight: 600;
}
    </style>
</head>
<body>
    <!-- "Book Online" Title above the Application Name -->
    <div class="ml-5 title">Book Online</div>

    <div class="container mt-5">
        
        <!-- Flash Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Flash Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- First Column -->
                <div class="col-md-6">
                    <!-- Application Name -->
                    <div class="mb-3">
                        <label for="application_name" class="form-label">
                            Application Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="application_name" name="application_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Organization</label><br>
                        <input type="radio" id="csir_radio" name="organization_type" value="CSIR"> CSIR
                        <input type="radio" id="non_csir_radio" name="organization_type" value="Non-CSIR"> Non-CSIR
                    </div>
                    
                    <!-- Organization Dropdown (Visible when CSIR is selected) -->
           <!-- CSIR Organization Dropdown -->
<div class="mb-3" id="organization_div" style="display: none;">
    <select id="organization" name="organization" class="form-control">
        <option value="">Select Organization</option>
        @foreach($org as $organization)
            <option value="{{ $organization->id }}">{{ $organization->organization }}</option>
        @endforeach
    </select>
</div>

                    
                    <!-- Manual Organization Input (Visible when Non-CSIR is selected) -->
                    <div class="mb-3" id="manual_organization_div" style="display: none;">
                        <input type="text" id="manual_organization" name="manual_organization" class="form-control" placeholder="Enter Organization Name">
                    </div>
                    <!-- Designation -->
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation<span class="text-danger">*</span></label>
                        <input type="text" id="designation" name="designation" class="form-control" required>
                    </div>
                    {{-- employee id --}}
                    <div class="mb-3">
                        <label for="employee" class="form-label">Employee Id<span class="text-danger">*</span></label>
                        <input type="text" id="employee_id" name="employee_id" class="form-control" required>
                    </div>

                    <!-- Contact Number -->
                    <div class="mb-3">
                        <label for="contact_no" class="form-label">Contact/Mobile No<span class="text-danger">*</span></label>
                        <input type="text" id="contact_no" name="contact_no" class="form-control" required>
                    </div>

                    <!-- Official Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Official Email Address<span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                </div>

                <!-- Vertical Divider -->
                <div class="col-md-1 divider"></div>

                <!-- Second Column -->
                <div class="col-md-5">
                    <!-- Scanned Office ID -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Scanned Copy of Office ID<span class="text-danger">*</span></label>
                        <h5 class="text-muted" style="font-size: 0.875rem; font-weight: lighter;">
                           <u> CSIR Employees/Pensioners - Please upload your CSIR ID only |</u> - Upload scanned copy of your office Identity Card (pdf/jpg/gif/png).
                        </h5>
                        <input type="file" name="image" id="image" accept="image/*" multiple required class="form-control">
                        @error('image')
                            <div style="color: red; font-size: 0.875em;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Purpose of Visit -->
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose of Visit<span class="text-danger">*</span></label>
                        <select id="purpose" name="purpose" class="form-control" required>
                            <option value="">Select Purpose</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>

                    <div class="mb-3 row">
                        <!-- Date of Arrival -->
                        <div class="col-md-6">
                            <label for="date_of_arrival" class="form-label">Date of Arrival <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_arrival" name="date_of_arrival" class="form-control" required>
                        </div>
                    
                        <!-- Time of Arrival -->
                        <div class="col-md-6">
                            <label for="time_of_arrival" class="form-label">Time of Arrival <span class="text-danger">*</span></label>
                            <input type="time" id="arrival_time" name="arrival_time" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <!-- Date of Departure -->
                        <div class="col-md-6">
                            <label for="date_of_departure" class="form-label">Date of Departure <span class="text-danger">*</span></label>
                            <input type="date" id="date_of_departure" name="date_of_departure" class="form-control" required>
                        </div>
                    
                        <!-- Time of Departure -->
                        <div class="col-md-6">
                            <label for="time_of_departure" class="form-label">Time of Departure <span class="text-danger">*</span></label>
                            <input type="time" id="departure_time" name="departure_time" class="form-control" required>
                        </div>
                    </div>

                    <!-- Number of Rooms -->
                    <div class="mb-3">
                        <label for="room" class="form-label">No. of Rooms Required<span class="text-danger">*</span></label>
                        <input type="number" id="room" name="room" class="form-control" required>
                    </div>

                    <!-- Payment to be Borne By -->
                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment to be Borne By<span class="text-danger">*</span></label>
                        <select id="payment" name="payment" class="form-control" required>
                            <option value="">Select Payment Option</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table for Guest Information -->
            <div class="mt-4">
                <div class="section-title guesthouselink btn btn-success">Guest Details</div>
                <div class="mb-3">
                    <input type="checkbox" id="is_guest" name="is_guest">
                    <label for="is_guest" class="form-label">Are you one of the guests?</label>
                </div>
                
                <table class="table table-striped table-bordered" id="guestTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Guest Name</th>
                            <th>Organization</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Contact</th>
                            <th>Category</th>
                            <th>Photo ID Proof No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><input type="text" name="guest_name[]" class="form-control" required></td>
                            <td><input type="text" name="organizations[]" class="form-control" required></td>
                            <td><input type="number" name="age[]" class="form-control" required></td>
                            <td>
                                <select name="gender[]" class="form-control" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                            <td><input type="text" name="contact[]" class="form-control" required></td>
                            <td>
                                <select name="category[]" class="form-control" required>
                                    <option value="VIP">VIP</option>
                                    <option value="General">General</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </td>
                            <td><input type="text" name="photo_id_proof[]" class="form-control" required></td>
                            <td><button type="button" class="btn btn-danger btn-sm deleteRow">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
            
            <!-- Button to Add Row -->
            <button type="button" id="addRow" class="btn btn-success mb-3">+ Add Row</button>
             

            <div class="">
                <label for="File1"> Remarks
                    <br>
                    <span style="font-size:10px;">Please provide room allotment preference/additional information (if any)<br>Eg. Guest 1 - Room 1;Guest 2 - Room 1;Guest 3 - Room 2; etc..</span> </label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="" value=" "  style="width:50%;">
                
            </div>
            <div class="form-group">
                <span style="font-size:14px;font-weight:bold;">
                    <input id="agree_terms_condition" type="checkbox" name="agree_terms_condition" value="1"><label for="ContentPlaceHolder1_chkIsGuest"> &nbspI Agree to the  <a href="#">Terms & Conditions</a> </label></span>
            </div>
    
            <b><span id="erragree_terms_condition" style="color: red;"></span></b></br>
            <input type="hidden" id="task" name="task" value="not_save_booking">
            <div class="form-group">
              <label>Captcha</label>
              <div class="g-recaptcha" id="RecaptchaField1" data-sitekey="6LdErxQqAAAAANYE7bSOeEAKOsJQYTvsr59lukxo" required></div> 
                             
                           <span id="captcha" style="color:red" ></span> <!-- this will show captcha errors -->   
                            </div>
            <!-- Submit Button -->
            <button type="submit" class="btnsubmit">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
  $(document).ready(function() {
    // Check the initial radio button selection and show/hide relevant sections
    if ($('#csir_radio').prop('checked')) {
        // Show dropdown and hide manual input if CSIR is selected
        $('#organization_div').show();
        $('#manual_organization_div').hide();
    } else if ($('#non_csir_radio').prop('checked')) {
        // Show manual input and hide dropdown if Non-CSIR is selected
        $('#organization_div').hide();
        $('#manual_organization_div').show();
    }

    // Add a new row
    $('#addRow').click(function() {
        var $tableBody = $('#guestTable tbody');
        var $lastRow = $tableBody.find('tr:last');
        var $newRow = $lastRow.clone(); // Clone the last row

        // Increment serial number for the new row
        var rowCount = $tableBody.children('tr').length + 1;
        $newRow.find('td:first').text(rowCount);

        // Clear input fields in the new row
        $newRow.find('input').val('');
        $newRow.find('select').prop('selectedIndex', 0); // Reset selects to default option

        // Append the new row
        $tableBody.append($newRow);
    });

    // Delete a row
    $(document).on('click', '.deleteRow', function() {
        // Ensure there is more than one row left
        if ($('#guestTable tbody tr').length > 1) {
            $(this).closest('tr').remove(); // Remove the row
            // Reassign the serial numbers to remaining rows
            $('#guestTable tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });

    // Toggle between dropdown and text input on radio button change
    $('#csir_radio').on('change', function() {
        $('#organization_div').show();
        $('#manual_organization_div').hide();
    });

    $('#non_csir_radio').on('change', function() {
        $('#organization_div').hide();
        $('#manual_organization_div').show();
    });
});

    </script>
</body>
</html>
