<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>main</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- Day.js -->
        <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0">console</a>
        </nav>
        <div class="container">
            <div class="card-deck my-5">
                <div class="card">
                    <div class="card-header">
                        Current time
                    </div>
                    <div class="card-body">
                        <span id='current-ymd' class="display-4"></span><br>
                        <span id='current-time' class="display-4"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/main/edit')}}" class="form-row align-items-center justify-content-center h-100" method="post">
                            @csrf
                            <div class="col">
                                <input type="submit" class="form-control btn btn-lg btn-info" name="in" value="出勤/IN">
                            </div>
                            <div class="col">
                                <input type="submit" class="form-control btn btn-lg btn-light" name="out" value="退勤/OUT">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <h2>work time</h2>
            <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>day</th><th>in</th><th>out</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($worktimes as $worktime)
                    <tr>
                        <td>{{ $worktime->day}}</td>
                        <td>{{ $worktime->in_time}}</td>
                        <td>{{ $worktime->out_time}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

        </div>{{-- /container --}}

        <script>
            // window.addEventListener('DOMContentLoaded', () => {
            //     document.getElementById('current-ymd').textContent = now.format('YYYY/MM/DD');
            // });
            function currentTime() {
                let now = dayjs();
                document.getElementById('current-ymd').textContent = now.format('YYYY/MM/DD');
                document.getElementById('current-time').textContent = now.format('HH:mm:ss');
            }
            setInterval('currentTime()',1000);
        </script>
    </body>
</html>
