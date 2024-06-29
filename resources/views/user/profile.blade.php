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
                                        <p class="text-muted font-size-sm">{{Auth::user()->email}}</p>
                                        {{-- <button class="btn btn-primary">Follow</button> --}}
                                        <button class="btn btn-outline-primary">Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>


                {{-- start of Joined pools --}}
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                        <ol class="breadcrumb">                      
                            <li style="text-align: center" class="breadcrumb-item active" aria-current="page">Joined Pools</li>
                        </ol>
                    </nav>
                    <div class="row">
                        @if(!empty($join_pool) && count($join_pool) > 0)
                        @foreach($join_pool as $pool)
                            <div class="col-md-6 mb-5">
                                <div class="border p-3 "
                                    style="border-radius: 10px; background-color: #f8f9fa;">
                                    <div class="row">
                                    
                                        <div class="col-md-8">
                                            <p class="text-dark"><b>Pool Name: </b>{{ $pool->pool_name }}</p>
                                            <span class="text-muted"><b>ID: </b>{{ $pool->created_pool_id }}</span>
                                                <small class="text-black" style="margin-left: 100px">{{ $pool->created_at->diffForHumans() }}</small>
                                                <br>
                                                <br>
                                                <a class="btn btn-info" href="{{ route('view-pool-data', ['pool_id' => $pool->pool_id ,
                                                'created_pool_id' => $pool->created_pool_id
                                                ]) }}">View Pool Dashboard </a>

                                                {{-- <a href="{{ route('view-pool-data', ['pool_id' => $pool->pool_id, 'created_pool_id' => $pool->created_pool_id]) }}">View Pool Data</a> --}}
                                                {{-- <a href="{{ route('view-pool-data', ['created_pool_id' => $pool->created_pool_id]) }}">View Pool Data</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-12 text-center mt-5">
                            <h3>No Pool is Set</h3>
                            <p class="text-white">Start Joining your pools now!</p>
                            <a href="{{ url('All/Pools') }}" class="btn btn-primary mb-5">Join Pool</a>
                        </div>
                        @endif
                    </div>


                {{-- end of joined Pools --}}


                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                       
                        <li class="breadcrumb-item active" aria-current="page">Created Pools</li>
                    </ol>
                </nav>
                <div class="row">
                    @if(!empty($setPools) && count($setPools) > 0)
                    @foreach($setPools as $pool)
                        <div class="col-md-6 mb-5">
                            <a href="{{ route('pool.show', ['first_name' => $pool->user->first_name, 'last_name' => $pool->user->last_name, 'pool_id' => $pool->id]) }}">
                                <div class="border p-3 "
                                    style="border-radius: 10px; background-color: #f8f9fa;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p style="font-weight: bold; color: #343a40; display: inline;">{{
                                                $pool->user->first_name }}</p>
                                            <span style="display: inline; font-weight: bold; color: #343a40;">{{
                                                $pool->user->last_name }}</span>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="text-right">
                                                <span class="badge badge-dark">{{ $pool->pool_week }}</span>
                                            </div>
                                            <p class="text-dark">{{ $pool->pool_name }}</p>
                                            <p>{{ $pool->pool_format }}</p>
                                            <p>{{ $pool->pool_spread }}</p>
                                        
                                            <span class="text-muted"><b>ID: </b>{{ $pool->random_id }}</span>
                                                <small class="text-black" style="margin-left: 100px">{{ $pool->created_at->diffForHumans() }}</small>
                                            
                                            
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Your existing code -->
                                                <a href="{{ route('invite.friends', ['pool_id' => $pool->random_id]) }}" class="btn btn-primary">Invite Friends</a>
                                            </div>
                                        </div>
                                                
                                        </div>
                                    </div>
                                </div>
                            </a>

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


          
        </div>

    <!-- end old script -->
        @include('layouts.footer')
        <!-- .site-wrap -->
        @include('layouts.scriptingLinks')
</body>



</html>
