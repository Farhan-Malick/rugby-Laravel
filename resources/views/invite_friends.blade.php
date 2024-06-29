<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.headLinks')
</head>
<body>
    @include('layouts.header2')
<br><br><br>
        <div class="container">
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
            <div class="row">
                <h1 class="text-center">Invite you Friends</h1>
                <div class="col-6">
                    <!-- invite_friends.blade.php -->
                    <form action="{{ route('send.invitation') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Friend's Email:</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <input type="hidden" name="pool_id" value="{{ $pool->random_id }}">
                        <input type="hidden" name="pool_name" value="{{ $pool->pool_name }}">

                        <button type="submit" class="btn btn-primary">Send Invitation</button>
                    </form>

                </div>
            </div>
        </div>
        <!-- end old script -->
<br><br><br>

        @include('layouts.footer')
        <!-- .site-wrap -->
        @include('layouts.scriptingLinks')
</body>
</html>