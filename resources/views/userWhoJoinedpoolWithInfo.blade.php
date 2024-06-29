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
                        <li class="breadcrumb-item active" aria-current="page">User Profile / Pool Matches</li>
                    </ol>
                </nav>

                <h1 class="text-center text-light mt-5 mb-5">
                    Stats of your PICKS
                </h1>
                <p class="text-center">All the picks that you have made</p>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-lg-8">
            
                            <div class="widget-next-match p-4">
                                <table id="basic-datatables" class=" table custom-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Rounds</th>
                                            <th>Name</th>
                                            <th>Team</th>
                                            <th>Points</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($AllPicks as $pick)
                                            <tr>
                                                <td>{{ $pick->id }}</td>
                                                <td>{{ $pick->rnd }}</td>
                                                <td>{{ $pick->name }}</td>
                                                <td><strong class="text-white">{{ $pick->teamname }}</strong></td>
                                                <td>{{ $pick->points }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                          
                          </div>
                    </div>
               </div>
               <br><br>
        </div>

    <!-- end old script -->
        @include('layouts.footer')
        <!-- .site-wrap -->
        @include('layouts.scriptingLinks')
</body>

<script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

<script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var column = this;
              var select = $(
                '<select class="form-select"><option value=""></option></select>'
              )
                .appendTo($(column.footer()).empty())
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function () {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });
  </script>


</html>
