<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="/css/all.css" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <script src="/js/chart.min.js"></script>

    </head>
    <body dir="rtl">
        <div class="main-content">
            <div class="menu-side">
                <h1 class="logo">
                    Hr System
                </h1>
                <ul>
                    <a href="/myProfile" class="{{($title =='البيانات الشخصية')?'active':''}}" ><li> <i class="fas fa-user"></i> الصفحة الشخصية</li></a>
                    <a href="/empsattendance" class="{{($title =='حضور وغياب الموظفين')?'active':''}}" ><li> <i class="fas fa-users"></i> حضور وغياب الموظفين</li></a>
                    <a href="/empsattendancestatistics" class="{{($title == 'إحصائيات بالحضور و الغياب')?'active':''}}"> <li> <i class="fas fa-chart-bar"></i> إحصائيات بالحضور و الغياب</li></a>
                    <a class="logout" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                       تسجيل خروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                       @csrf
                    </form>
                </ul>

            </div>
            <div class="main-side">
                <div class="container">
                    <h1>إحصائية بعدد الحضور والغياب</h1>
                    <form method="post" action="/empsattendancestatistics/date">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 right">
                                    <label class="" for="">فرز بحسب التاريخ</label>
                                </div>
                                <div class="col-xs-6 right">
                                    <input  type="date" name="attenddate" class="form-control custom-input col-xs-6" placeholder="بحث برقم الموظف">
                                </div>
                                <div class="col-xs-4 right">
                                    <button type="submit" class="btn btn-primary">بحث</button>
                                </div>
                              </div>
                        </div>
                      </form>

            </div>
            <div class="statistics right">
                <input type="hidden" name="date" id="date" data-date="{{$date}}" value="{{$date}}">
                <input type="hidden" name="present" id="present" data-present="{{count($present)}}" value="{{count($present)}}">
                <input type="hidden" name="absent" id="absent" data-absent="{{count($absent)}}" value="{{count($absent)}}">
                <input type="hidden" name="allemps" id="allemps" data-absent="{{$allemps}}" value="{{$allemps}}">
                <div class="chart-container" style="position: relative; height:20vh; width:30vw ; margin-right:60%;margin-top:10%">
                    <canvas id="myChart"></canvas>
                </div>
             </div>

        </div>

        <script>
            var date = document.getElementById('date');
            var present = document.getElementById('present');
            var absent = document.getElementById('absent');
            var allemps = document.getElementById('allemps');
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['حضور', 'غياب'],
                    datasets: [{
                        label: 'إحصائية بحضور وغياب الموظفين لتاريخ ' + date.value,
                        data: [present.value , absent.value],
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 99, 132, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true, // minimum value will be 0.
                                // <=> //
                                min: 0,
                                max: allemps.value,
                                stepSize: 2 // 1 - 2 - 3 ...
                            }
                        }]
                    }
                }
            });
</script>
    </body>
</html>
