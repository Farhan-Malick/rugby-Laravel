<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <title>Rugby &mdash; </title> --}}
    @include('layouts.headLinks')
    <style>
        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>
        @include('layouts.header2')


        <div class="container-fluid">
            <div class="main-body">

                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
                <!-- /Breadcrumb -->

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4 class="text-dark">{{ Auth::user()->first_name }} {{ Auth::user()->last_name
                                            }}</h4>
                                        <p class="text-dark mb-1">{{ Auth::user()->country }}</p>
                                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                        <button class="btn btn-primary">Follow</button>
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="card mt-3">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe mr-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://bootdey.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-github mr-2 icon-inline">
                                            <path
                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                            </path>
                                        </svg>Github</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter mr-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram mr-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook mr-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->phone }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Country</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->country }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Bay Area, San Francisco, CA
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-info " target="__blank"
                                            href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    @if(!empty($setPools) && count($setPools) > 0)
                    @foreach($setPools as $pool)
                    <div class="col-md-6 mb-5">
                        <div class="border p-3 team-box" data-team-id="1"
                            style="border-radius: 10px; background-color: #f8f9fa;">
                            <div class="row">
                                <div class="col-md-4">
                                    <p style="font-weight: bold; color: #343a40; display: inline;">{{
                                        $pool->user->first_name }}</p>
                                    <span style="display: inline; font-weight: bold; color: #343a40;">{{
                                        $pool->user->last_name }}</span>
                                </div>

                                <div class="col-md-8">
                                    <div class="text-right mb-2">
                                        <span class="badge badge-dark">{{ $pool->pool_week }}</span>
                                    </div>
                                    <h4 class="text-dark">{{ $pool->pool_name }}</h4>
                                    <p>{{ $pool->pool_format }}</p>
                                    <p>{{ $pool->pool_spread }}</p>

                                    <div class="text-right">
                                        <small class="text-muted">{{ $pool->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                    @else
                    <div class="col-12 text-center mt-5">
                        <h3>No Pool is Set</h3>
                        <p class="text-white">Start creating your pools now!</p>
                        <a href="{{ url('/create-pool') }}" class="btn btn-primary mb-5">Create Pool</a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- end section set pools show --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i
                                            class="material-icons text-info mr-2">Team Selection Form</h6>

                                    <style>
                                        .team-box.selected {
                                            outline: 2px solid blue;
                                        }
                                    </style>

                                    <form action="{{ route('submit-picks') }}" method="post" id="team-selection-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="1" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/wales.png') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <h4 class="text-dark">Wales</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="ml-4"> VS </span>
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="2" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/ireland.png') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <h4 class="text-dark">Ireland</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="3" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/itly.avif') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <h4 class="text-dark">Italy</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="ml-4"> VS </span>
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="4" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/france.png') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-8">

                                                        <h4 class="text-dark">France</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="5" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/england.jpg') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h4 class="text-dark">England</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="ml-4"> VS </span>
                                            <div class="col-md-5 ml-5 mr-2 border 1px p-3 mb-5 team-box"
                                                data-team-id="6" style="border-radius: 10px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('assets/images/scotland.png') }}" alt=""
                                                            style="border-radius:10px" height="60px">
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h4 class="text-dark">Scotland</h4>
                                                        <p>Sports</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Add similar code for the remaining teams -->
                                        <div class="text-center">
                                            <button class="btn btn-secondary select-team w-50 ">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add the following script at the bottom of your HTML file -->
        //     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- old script for picks -->
    //     <script>
    //         $(document).ready(function() {
    // $('#team-selection-form').submit(function(event) {
    //     event.preventDefault();

    //     var selectedTeams = [];
    //     $('.team-box.selected').each(function(index) {
    //         var teamId = $(this).data('team-id');
    //         var teamName = $(this).find('h4').text();
    //         selectedTeams.push({ id: teamId, name: teamName, priority: index + 1 });
    //     });

    //         // Send the selected team IDs and names to the server
    //         $.ajax({
    //             url: '{{ route('submit-picks') }}',
    //             method: 'POST',
    //             data: {
    //                 teams: selectedTeams,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 // Handle the success response
    //                 console.log(response);
    //                 // Redirect the user to a specific URL
    //                 window.location.href = '{{ URL('/myPicks') }}';
    //             },
    //             error: function(xhr) {
    //                 // Handle the error response
    //                 console.error(xhr);
    //                 // Optionally, you can show an error message to the user
    //             }
    //         });
    //     });
    // });
    //     </script>

    <!-- end old script -->



        @include('layouts.footer')

        <!-- .site-wrap -->

        @include('layouts.scriptingLinks')


</body>


<script>
            $(document).ready(function() {
        $('.team-box').click(function() {
            // Get the parent row
            var row = $(this).closest('.row');

            // Remove the 'selected' class from all team boxes within the same row
            row.find('.team-box').removeClass('selected');

            // Toggle the 'selected' class for the clicked team box
            $(this).toggleClass('selected');
        });
    });
        </script>


<script>
    $(document).ready(function() {
        $('#team-selection-form').submit(function(event) {
            event.preventDefault();

            var selectedTeams = [];
            $('.team-box.selected').each(function(index) {
                var teamId = $(this).data('team-id');
                var teamName = $(this).find('h4').text();
                selectedTeams.push({ id: teamId, name: teamName, priority: index + 1 });
            });

            // Send the selected team IDs and namephs to the server
            $.ajax({
                url: '{{ route('submit-picks') }}',
                method: 'POST',
                data: {
                    teams: selectedTeams,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Picks submitted successfully',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.href = '{{ URL('/myPicks') }}';
                    });
                },
                error: function(xhr) {
                    // Handle the error response
                    console.error(xhr);
                    // Optionally, you can show an error message to the user
                }
            });
        });
    });
</script>




<script>
    $(document).ready(function() {
        $('.team-box').click(function() {
            // Check if the user already has three picks
            var userPicksCount = {{ $user->picks()->count() }};
            if (userPicksCount >= 3) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You have already selected three teams',
                });
                return;
            }

            // Get the parent row
            var row = $(this).closest('.row');

            // Remove the 'selected' class from all team boxes within the same row
            row.find('.team-box').removeClass('selected');

            // Toggle the 'selected' class for the clicked team box
            $(this).toggleClass('selected');
        });
    });
</script>


</html>
