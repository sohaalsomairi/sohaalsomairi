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

</head>

<body dir="rtl">
    <div class="main-content">
        <div class="menu-side">
            <h1 class="logo">
                Hr System
            </h1>
            <ul>
                <a href="/myProfile" class="{{($title =='البيانات الشخصية')?'active':''}}" ><li> <i class="fas fa-user"></i> الصفحة الشخصية</li></a>
                @if(Auth::user()->superuser == 1)
                    <a href="/empsattendance" class="{{($title =='حضور وغياب الموظفين')?'active':''}}" ><li> <i class="fas fa-users"></i> حضور وغياب الموظفين</li></a>
                    <a href="/empsattendancestatistics" class="{{($title == 'إحصائيات بالحضور و الغياب')?'active':''}}"> <li> <i class="fas fa-chart-bar"></i> إحصائيات بالحضور و الغياب</li></a>
                @endif
            </ul>
            <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                تسجيل خروج
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        <div class="main-side">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <h1>البيانات الشخصية</h1>
                        <div class="emp-info">
                            <div class="img" style="background-image:url(/imgs/avatar.png)"></div>
                            <div class="data">
                                <p class="">الرقم الوظيفي : {{ Auth::user()->emp->empnum }}</p>
                                <p class="">الإسم : {{ Auth::user()->emp->empname }}</p>
                                <p class="">تاريخ التوظيف : {{ substr(Auth::user()->emp->created_at, 0, 10) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <h1>تغيير كلمة المرور</h1>
                        @if(Session::has('msg'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('msg') }}
                        </div>
                        @endif
                        <form method="post" action="/changePassword" class="changepassword-form">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 right">
                                        <label class="" for="">كلمة المرورالجديدة</label>
                                    </div>
                                    <div class="col-xs-12 right">
                                        <input  type="password" name="newpassword" class="form-control custom-input col-xs-6" placeholder="كلمة المرور الجديدة">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 right">
                                        <label class="" for="">تأكيد كلمة المرور</label>
                                    </div>
                                    <div class="col-xs-12 right">
                                        <input  type="password" name="confirmpassword" class="form-control custom-input col-xs-6" placeholder="تأكيد كلمة المرور">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 right">
                                        <button type="submit" class="btn btn-primary pull-left">حفظ</button>
                                    </div>
                                 </div>
                          </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</body>

</html>
