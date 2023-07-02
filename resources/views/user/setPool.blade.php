<!DOCTYPE html>
<html lang="en">

<head>
  {{-- <title>Rugby &mdash; </title> --}}
 @include('layouts.headLinks')
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

   <div class="container mb-5">
    <h1 class="text-center text-light mt-5 mb-5">
        SET UP YOUR RUGBY POOL
    </h1>
    {{-- <p class="text-center">Select the sport and game type of the pool you want to run below.</p> --}}

    <div class="container">

        <form class="form-horizontal" data-parsley-validate="true" name="demo-form"
            action="{{ url('set-pool-submit/' . $pool_id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pool_id" value="{{ $pool_id }}">
            @csrf
            <div class="form-group row m-b-10">
                <div class="col-md-12">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <center><strong>{{ $message }}</strong></center>
                    </div>
                @endif
                </div>
            </div>
            <div class="form-group row m-b-10">
                <label class="col-lg-3 text-lg-right col-form-label">Pool Name<span
                        class="text-danger">*</span></label>
                <div class="col-lg-9 col-xl-6">
                    <input type="text" name="pool_name" placeholder="" data-parsley-group="step-1"
                        data-parsley-required="true" class="form-control" />
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-lg-3 text-lg-right col-form-label">Pool Format <span
                        class="text-danger">*</span></label>
                <div class="col-lg-9 col-xl-6">
                    <select name="pool_format" id="pool_format" class="form-control">
                        <option class="text-secondary" value="Standard Pick 'em">Standard Pick 'em</option>
                        <option class="text-secondary" value="Pick 'em with Best Bets">Pick 'em with Best Bets</option>
                        <option class="text-secondary" value="Pick 'em with Confidence Points">Pick 'em with Confidence Points</option>

                    </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-lg-3 text-lg-right col-form-label">Points Spread <span
                        class="text-danger">*</span></label>
                <div class="col-lg-9 col-xl-6">

                    <select name="pool_spread" class="form-control">
                        <option class="text-secondary" value="Not used in making picks">Not used in making picks</option>
                        <option class="text-secondary" value="Used in making picks, set by RUGBY">Used in making picks, set by RUGBY</option>
                        <option class="text-secondary" value="Used in making picks, manually set by Commish">Used in making picks, manually set by Commish</option>
                    </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-lg-3 text-lg-right col-form-label">Start Week<span
                        class="text-danger">*</span></label>
                <div class="col-lg-9 col-xl-6">

                    <select name="pool_week" class="form-control" id="" >
                        <option >Select </option>
                        <option class="text-secondary" name="week 1">week 1</option>
                        <option class="text-secondary" name="week 2">week 2</option>
                        <option class="text-secondary"  name="week 3" >weeb 3</option>
                    </select>
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-lg-3 text-lg-right col-form-label">&nbsp;</label>
                <div class="col-lg-9 col-xl-6">
                    <button type="submit" class="btn btn-primary">Set Pool</button>
                </div>
            </div>
        </form>
    </div>

   </div>
@include('layouts.footer')

  <!-- .site-wrap -->

  @include('layouts.scriptingLinks')


</body>

</html>
