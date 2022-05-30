@extends('layouts.dashboard')

@section('title')
Profile Setting
@endsection

@section('content')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">

        <form action="{{ route('profile.update',  [Auth::user()->id]) }}" method="post" enctype="multipart/form-data">

            <div class="container-fluid">
                <div class="dashboard-heading">
                    <h2 class="dashboard-title">Edit Profile</h2>
                    <p class="dashboard-subtitle">
                    Please Compleate Your Data Information
                    </p>
                </div>

                    @csrf
                    @method('PUT')

                    <!-- personal information -->
                    <div class="dashboard-content personal">
                        <div class="row">

                            <div class="col-11">

                                    <div class="card">
                                        <div class="card-body">

                                            <h5>
                                                Personal Information
                                            </h5>

                                            <div class="dropdown-divider"></div>
                                            <div class="mb-2 row" id="locations">

                                                <div class="mb-5 col-md-12">
                                                    <div class="flex items-center mt-1">
                                                        {{-- Image validation if profile image is null --}}
                                                        @if (auth()->user()->detail_user()->first()->photo != NULL)
                                                            <img src="{{ url(Storage::url(auth()->user()->detail_user()->first()->photo)) }}" alt="photo profile"
                                                                srcset="" class="w-16 h-16 rounded-full">
                                                        @else
                                                            <span class="inline-block w-16 h-16 overflow-hidden bg-gray-100 rounded-full">
                                                                <svg class="inline w-12 h-12 mr-3 text-gray-300 rounded-full" fill="currentColor" viewBox="0 0 24 24">
                                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                                                </svg>
                                                            </span>
                                                        @endif

                                                        <label for="choose" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Choose File</label>

                                                        <input type="file" accept="image/*" id="choose" name="photo" hidden>

                                                        <a href="" type="button" class="px-3 py-2 ml-5 text-sm font-medium leading-4 text-red-700 bg-transparent rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
                                                        onclick="return confirm( 'Are you sure want to delete your photo?' )">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="first_name"
                                                            aria-describedby="emailHelp"
                                                            name="first_name"
                                                            value="{{ $data_user->first_name ?? ' ' }}"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input
                                                            type="last_name"
                                                            class="form-control"
                                                            id="last_name"
                                                            aria-describedby="emailHelp"
                                                            name="last_name"
                                                            value="{{ $data_user->last_name ?? ' ' }}"
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth_place">Place of Birth</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="placeOfBirth"
                                                            aria-describedby="emailHelp"
                                                            name="birth_place"
                                                            value="{{ $data_user->detail_user->birth_place ?? ' ' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="birth_date">Date Of Birth</label>
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="dateOfBirth"
                                                            aria-describedby="dateHelp"
                                                            name="birth_date"
                                                            value="{{ $data_user->detail_user->birth_date ?? ' ' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="gender">Gender</label>
                                                        <select name="gender" required class="form-control">
                                                            <option value="{{ $data_user->detail_user->gender }}">{{ $data_user->detail_user->gender }}</option>
                                                            <option value="Male" {{ $data_user->detail_user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                            <option value="Female" {{ $data_user->detail_user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="marital">Marital Status</label>
                                                        <select name="marital" required class="form-control"required>
                                                            <option value="Single" {{ $data_user->detail_user->marital == 'Single' ? 'selected' : '' }}>Single</option>
                                                            <option value="Married" {{ $data_user->detail_user->marital == 'Married' ? 'selected' : '' }}>Married</option>
                                                            <option value="Widowed" {{ $data_user->detail_user->marital == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                            <option value="Divorced" {{ $data_user->detail_user->marital == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>About Me</label>
                                                        <textarea name="about_me" id="editor">{!! $data_user->detail_user->about_me !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="occupation">Current Occupation</label>
                                                        <select name="occupation" class="form-control" required>
                                                            <option value="Student" {{ $data_user->detail_user->occupation == 'Student' ? 'selected' : '' }} >Student</option>
                                                            <option value="Scholar" {{ $data_user->detail_user->occupation == 'Scholar' ? 'selected' : '' }}>Scholar</option>
                                                            <option value="Freelancer" {{ $data_user->detail_user->occupation == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                                                            <option value="Bussinesman" {{ $data_user->detail_user->occupation == 'Bussinesman' ? 'selected' : '' }}>Bussinesman</option>
                                                            <option value="Worker" {{ $data_user->detail_user->occupation == 'Worker' ? 'selected' : '' }}>Worker</option>
                                                            <option value="Hotel Employee" {{ $data_user->detail_user->occupation == 'Hotel Employee' ? 'selected' : '' }}>Hotel/Restaurant Employee</option>
                                                            <option value="Cruise Ship Crew" {{ $data_user->detail_user->occupation == 'Cruise Ship Crew' ? 'selected' : '' }}>Cruiseship Crew</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input
                                                            type="email"
                                                            class="form-control"
                                                            id="email"
                                                            aria-describedby="emailHelp"
                                                            name="email"
                                                            value="{{ $data_user->email ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="skype">Skype Id</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="skype"
                                                            aria-describedby="emailHelp"
                                                            name="skype"
                                                            value="{{ $data_user->detail_user->skype ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone_number">Mobile Number</label>
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            id="phone_number"
                                                            aria-describedby="emailHelp"
                                                            name="phone_number"
                                                            value="{{ $data_user->detail_user->phone_number ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="address"
                                                            aria-describedby="emailHelp"
                                                            name="address"
                                                            value="{{ $data_user->detail_user->address ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="provinces">Province</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="provinces"
                                                            aria-describedby="emailHelp"
                                                            name="provinces"
                                                            value="{{ $data_user->detail_user->provinces ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="regencies">City</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="address"
                                                            aria-describedby="emailHelp"
                                                            name="regencies"
                                                            value="{{ $data_user->detail_user->regencies ?? '' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="zip_code">Postal Code</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="zip_code"
                                                            name="zip_code"
                                                            value="{{ $data_user->detail_user->zip_code}}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="country"
                                                            name="country"
                                                            value="Indonesia"
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="text-right col">
                                                    <button
                                                    type="submit"
                                                    class="px-5 btn btn-success"
                                                    >
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                        </div>
                    </div>
                    <!-- end personal information -->

                    <!-- educations Information -->
                    <div class="dashboard-content personal">
                        <div class="row">
                                <div class="col-11">

                                    <div class="card">
                                        <div class="card-body">
                                            <h5>
                                                Education Background
                                            </h5>
                                            <div class="dropdown-divider"></div>

                                            @forelse ($education_user as $key => $education)

                                            <div class="mb-2 row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="institution_name">Institution Name</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="education_name"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->name }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="course">Course Study</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_course"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->course }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="degree">Study Degree</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_course"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->degree ?? ' ' }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="addressOne">Start From</label>
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="education_start"
                                                            aria-describedby="emailHelp"
                                                            name=" {{ 'education['.$education->id.']' }} "
                                                            value="{{ $education->start }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="graduate">Graduate</label>
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            id="'education_graduate"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->graduate }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_address"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->address }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="regencies">City</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_regencies"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->address }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="provinces">Province</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_provinces"
                                                            aria-describedby="emailHelp"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->address }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="postalCode">Postal Code</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_zip"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->address }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="country">Country</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            id="'education_country"
                                                            name="{{ 'education['.$education->id.']' }}"
                                                            value="{{ $education->address }}"
                                                            required
                                                        />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Education Certificate</label>
                                                        <input type="file" class="form-control" name="{{ 'education['.$education->id.']' }}" value="{{ $education->certificate }}" required />
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="dropdown-divider bold"></div>


                                            @empty
                                                {{-- empty --}}
                                            @endforelse

                                            <div class="row" id="newEducationRow">
                                                <div class="col-11" >

                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <button typr="button" class="btn btn-secondary btn-block" id="addEducationRow">
                                                        Add Education
                                                    </button>
                                                </div>

                                                <div class="text-right col">
                                                    <button type="submit" class="px-5 mt-4 btn btn-success">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <!-- end of educational -->
            </div>

        </form>
    </div>
@endsection

@push('addon-script')

    {{-- Package CK Editor --}}
    <script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor' );
    </script>
    {{-- end Package CK editor --}}

    {{-- API Location with VUE JS --}}
    <script src="{{ url('vendor/vue/vue.js') }}"></script>
    <script src="{{ url('https://unpkg.com/vue-toasted') }}"></script>
    <script src="{{ url('https://unpkg.com/axios/dist/axios.min.js') }}"></script>
    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                var self = this;
                axios.get('{{ route('api-provinces') }}')
                    .then(function (response) {
                        self.provinces = response.data;
                    })
                },
                getRegenciesData() {
                var self = this;
                axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                    .then(function (response) {
                        self.regencies = response.data;
                    })
                },
            },
            watch: {
                provinces_id: function (val, oldVal) {
                this.regencies_id = null;
                this.getRegenciesData();
                },
            }
        });
    </script>
    {{-- End API Location with VUE JS--}}

    <script type="text/javascript">
        // add row
        $("#addEducationRow").click(function() {
            var html_education_name = '';
            html_education_name += '<div class="col-md-6"><div class="form-group"><label for="institution_name">Institution Name</label><input type="text"class="form-control"id="education_name[]" aria-describedby="emailHelp" name="education_name[]"value="education_name[]" required/></div></div></div>';
            var html_education_course = '';
            html_education_course += '<div class="col-md-6"><div class="form-group"><label for="institution_name">Institution Name</label><input type="text"class="form-control"id="education_name[]"aria-describedby="emailHelp"name="education_name[]"value="education_name[]" required/></div></div></div>';
            var  html_education_start= '';
            html_education_start += '<div class="col-md-6"><div class="form-group"><label for="institution_name">Institution Name</label><input type="text"class="form-control"id="education_name[]"aria-describedby="emailHelp"name="education_name[]"value="education_name[]" required/></div></div></div>';
            var  html_education_graduate= '';
            html_education_graduate += '<div class="col-md-6"><div class="form-group"><label for="institution_name">Institution Name</label><input type="text"class="form-control"id="education_name[]"aria-describedby="emailHelp"name="education_name[]"value="education_name[]" required/></div></div></div>';

            $('#newEducationRow').append(html_education_name, html_education_course, html_education_start, html_education_graduate );
        });



        // remove row
        $(document).on('click', '#removeAdvantagesRow', function() {
            $(this).closest('#inputFormAdvantagesRow').remove();
        });
    </script>

@endpush
