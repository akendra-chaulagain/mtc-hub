@push('title')
    Admission Form
@endpush


<link href="/website/css/form/form-style.min.css" type="text/css" rel="stylesheet" />


<style>
    table td input {
        margin-top: 4px;
    }

    form {
        background: #f5f5f5;
        padding: 20px 50px;
        border-radius: 5px;
    }

    .btn-primary:focus {
        outline: none;
        box-shadow: none;
    }

    .btn-primary {
        color: #fff;
        border: 1px solid #8d2927;
        background-color: #8d2927;
        display: inline-block;
        font-weight: 400;
        letter-spacing: 0.56px;
        padding: 10px 15px;
        margin-top: 10px;
        text-decoration: none;
        text-transform: uppercase;
        border-radius: 0;
    }

    input[type="text"],
    input[type="email"],
    input[type="url"],
    input[type="password"],
    input[type="search"],
    input[type="number"],
    input[type="tel"],
    input[type="range"],
    input[type="date"],
    input[type="month"],
    input[type="week"],
    input[type="time"],
    input[type="datetime"],
    input[type="datetime-local"],
    input[type="color"],
    textarea,
    select {
        border-radius: 0;
        border-color: #fff;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="password"]:focus,
    input[type="search"]:focus,
    input[type="number"]:focus,
    input[type="tel"]:focus,
    input[type="range"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="week"]:focus,
    input[type="time"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="color"]:focus,
    textarea:focus {
        box-shadow: none;
        border-color: #8d2927;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background: transparent;
    }

    .table thead th {
        font-size: 13px;
    }

    .table th,
    .table td {
        border-top: 0;
    }
</style>



<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 logo">
                <a href="/">
                <img src="https://nathm.gov.np/website/images/form-logo.jpg" alt="" />

                </a>
            </div>
        </div>
    </div>
</header>
<section class="form_body mb-5">
    <div class="container">
    </div>
</section>
<section class="form_body mb-5">
    @if (Session::has('admissions'))
        <script>
            alert('Form Submitted Successfully !')
        </script>
    @endif


    <div class="container">

        <form action="{{ route('admission_form') }}" method="post" class="wpcf7-form" enctype="multipart/form-data">

            @csrf

            <div class="row photo">
                <div class="col-lg-3">
                    <div class="form-group">
                        {{-- @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif --}}
                        <label for="cmat">CMAT Roll No</label>
                        <input type="text" class="form-control" name="cmat_rollno" id="cmat_roll"
                            placeholder="CMAT Roll No" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="photo">Photo ( Size less than 2Mb. JPG,PNG,jpg,png)</label>
                        <input type="file" name="personal_photo" class="form-control-file" id="photo">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <label for="">Select Course</label>
                    <select name="courses_title" id="" required>
                        <option value="none">--none--</option>

                        <option value="Bachelor In Hotel Management (BHM)">Bachelor In Hotel Management (BHM)</option>
                        <option value="Women"> Bachelor In Travel and Tourism
                            Management (BTTM)</option>
                        <option value="Master of Hospitality Management"> Master of Hospitality Management (MHM)
                        </option>
                    </select>

                </div>
                <div class="col-lg-6 col-md-6">
                    <label for="">Select Category</label>
                    <select name="category_group" id="">
                        <option value="none">--none--</option>

                        <option value="Open">Open</option>
                        <option value="Women"> Women</option>
                        <option value="Adibasi/Janajati"> Adibasi/Janajati</option>
                        <option value="Madhesi"> Madhesi</option>
                        <option value="Dalit"> Dalit</option>
                        <option value="Backward Area"> Backward Area</option>


                    </select>

                </div>
            </div>

            {{-- category --}}








            <div class="row mt-3">

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="name_en">Full Name</label>
                        <input type="text" class="form-control" name="full_Name" id="name_en"
                            placeholder="Full Name" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="name_ne">नाम</label>
                        <input type="text" class="UnicodeNepali" name="nepali_full_name" placeholder="पुरा नाम">
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                            required>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div class="mt-2">
                            <input type="radio" name="gender" value="Male"> Male

                            <input type="radio" name="gender" value="Female"> Female

                            <input type="radio" name="gender" value="Other"> Other
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" name="nationality" id="nationality"
                            placeholder="nationality">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="number" class="form-control" name="phone_no" id="phone_number"
                            placeholder="Phone Number" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control" name="DOB" id="dob" placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="email@mail.com">
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="number" class="form-control" name="mobile_no" id="mobile"
                            placeholder="Mobile Number">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <label for="permanent_address">Permanent Address</label>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 permanent-province_lists">
                    <label for="province">Province</label>
                    <input type="text" class="form-control" name="parmanent_address_provience"
                        id="permanent-province" placeholder="Province">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 permanent-district_lists">
                    <label for="district">District</label>
                    <input type="text" class="form-control" name="parmanent_address_disctict"
                        id="permanent-district" placeholder="District">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 permanent-local-government_lists">
                    <label for="municipality">Municipality/Rm</label>
                    <input type="text" class="form-control" name="parmanent_address_municipality"
                        id="permanent-municipality" placeholder="Municipality/Rm">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="municipality">W.No/Village</label>
                    <input type="text" class="form-control" name="parmanent_address_village"
                        id="temporary_ward_village" placeholder="W.No/Village">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <label for="permanent_address">Temporary Address</label>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 Temporary-province_lists">
                    <label for="province">Province</label>
                    <input type="text" class="form-control" name="temporary_address_provience"
                        id="temporary-province" placeholder="Province">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 permanent-district_lists">
                    <label for="district">District</label>
                    <input type="text" class="form-control" name="temporary_address_disctict"
                        id="temporary-district" placeholder="District">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 permanent-local-government_lists">
                    <label for="municipality">Municipality/Rm</label>
                    <input type="text" class="form-control" name="temporary_address_municipality"
                        id="temporary-municipality" placeholder="Municipality/Rm">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <label for="municipality">W.No/Village</label>
                    <input type="text" class="form-control" name="temporary_address_village"
                        id="temporary_ward_village" placeholder="W.No/Village">
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="father_name">Father`s Name</label>
                        <input type="text" class="form-control" name="father_name" id="father_name"
                            placeholder="Father Name">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        <label for="mother_name">Mother`s Name</label>
                        <input type="text" class="form-control" name="mother_name" id="mother_name"
                            placeholder="Mother`s Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label for="gaurdian_name">Name Of Guardian</label>
                        <input type="text" class="form-control" name="name_of_Guardian" id="gaurdian_name"
                            placeholder="Guardian`s Name">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label for="gaurdian_address">Address</label>
                        <input type="text" class="form-control" name="guardian_address" id="gaurdian_address"
                            placeholder="Address">
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="form-group">
                        <label for="gaurdian_phone">Phone</label>
                        <input type="number" class="form-control" name="Guardian_phone_number" id="gaurdian_phone"
                            placeholder="Phone">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <label>Academic Details (SEE/SLC and Above)</label>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <table id="academicTbl" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Name Of Institution</th>
                                <th scope="col">University/Board</th>
                                <th scope="col">Qualification</th>
                                <th scope="col">Year Of Graduation</th>
                                <th scope="col">Marks Obtained / Grade</th>
                                <th scope="col">Upload</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><input type="text" class="form-control" id="institutions"
                                        name="name_of_institute_1" placeholder="Name Of Institution">
                                </td>
                                <td><input type="text" class="form-control" id="board"
                                        name="university&board_1" placeholder="University/Board"></td>
                                <td><input type="text" class="form-control" id="qualification"
                                        name="qualification_1" placeholder="Qualification"></td>
                                <td><input type="date" class="form-control" id="graduation_year"
                                        name="year_of_graduation_1" placeholder="Year Of Graduation">
                                </td>
                                <td><input type="text" class="form-control" id="marks" name="obtaines_mark_1"
                                        placeholder="Marks Obtained / Grade"></td>
                                <td>
                                    <div class="form-group mt-2">
                                        <input type="file" class="form-control-file" name="file_1">
                                    </div>
                                </td>
                            </tr>





                            <tr>
                                <td><input type="text" class="form-control" id="institutions"
                                        name="name_of_institute_2" placeholder="Name Of Institution">
                                </td>
                                <td><input type="text" class="form-control" id="board"
                                        name="university&board_2" placeholder="University/Board"></td>
                                <td><input type="text" class="form-control" id="qualification"
                                        name="qualification_2" placeholder="Qualification"></td>
                                <td><input type="date" class="form-control" id="graduation_year"
                                        name="year_of_graduation_2" placeholder="Year Of Graduation">
                                </td>
                                <td><input type="text" class="form-control" id="marks" name="obtaines_mark_2"
                                        placeholder="Marks Obtained / Grade"></td>
                                <td>
                                    <div class="form-group mt-2">
                                        <input type="file" class="form-control-file" name="file_2">
                                    </div>
                                </td>
                            </tr>







                            <tr>
                                <td><input type="text" class="form-control" id="institutions"
                                        name="name_of_institute_3" placeholder="Name Of Institution">
                                </td>
                                <td><input type="text" class="form-control" id="board"
                                        name="university&board_3" placeholder="University/Board"></td>
                                <td><input type="text" class="form-control" id="qualification"
                                        name="qualification_3" placeholder="Qualification"></td>
                                <td><input type="date" class="form-control" id="graduation_year"
                                        name="year_of_graduation_3" placeholder="Year Of Graduation">
                                </td>
                                <td><input type="text" class="form-control" id="marks" name="obtaines_mark_3"
                                        placeholder="Marks Obtained / Grade"></td>
                                <td>
                                    <div class="form-group mt-2">
                                        <input type="file" class="form-control-file" name="file_3">
                                    </div>
                                </td>
                            </tr>




                        </tbody>
                    </table>



                    <div>
                        <button type="button" id="add_academic" class="btn btn-primary btn-sm">Add More
                            Details</button>
                    </div>
                    <label>Thd details provided in the form are true to the best of my knowledge. I have declare
                        that
                        the
                        provided in this form is true.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <button name="dsfds" value="save" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script type="application/javascript" src="website/css/form/jquery.min.js"></script>
    <script type="text/javascript" src="website/css/form/unicode.js"></script>
    <script language="javascript" type="text/javascript">
        InitializeUnicodeNepali();
    </script>

    <script>
        $(document).ready(function() {
            var i = 2;
            $("#add_academic").on("click", function(e) {
                i++;
                $('#academicTbl').append('<tr>' +
                    '<td><input type="text" class="form-control" id="institutions" name="academic_details[' +
                    i + '][institutions]" placeholder="Name Of Institution"></td>' +
                    '<td><input type="text" class="form-control" id="board" name="academic_details[' +
                    i + '][board]" placeholder="University/Board"></td>' +
                    '<td><input type="text" class="form-control" id="qualification" name="academic_details[' +
                    i + '][qualification]" placeholder="Qualification"></td>' +
                    '<td><input type="text" class="form-control" id="graduation_year" name="academic_details[' +
                    i + '][graduation_year]" placeholder="Year Of Graduation"></td>' +
                    '<td><input type="text" class="form-control" id="marks" name="academic_details[' +
                    i + '][marks]" placeholder="Marks Obtained / Grade"></td>' +
                    '<td> <div class="custom-file"><input type="file" name="academic_details[' + i +
                    '][file]" class="custom-file-input" id="file"> <label class="custom-file-label" for="file">Choose file</label>' +
                    '</div></td>' +
                    '</tr>'
                );

            });

        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</section>
