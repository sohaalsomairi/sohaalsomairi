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
                    <a href="/myProfile" class="{{($title =='البيانات الشخصية')?'active':''}}" ><li> <i class="fas fa-user"></i>  الصفحة الشخصية</li></a>
                    <a href="/empsattendance" class="{{($title =='حضور وغياب الموظفين')?'active':''}}" ><li> <i class="fas fa-users"></i>  حضور وغياب الموظفين</li></a>
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
                    <h1>بيانات حضور وغياب الموظفين</h1>
                    <form method="post" action="/attendance/emp">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-2 right">
                                    <label class="" for="">فرز بحسب رقم الموظف</label>
                                </div>
                                <div class="col-xs-6 right">
                                    <input  type="text" name="empid" class="form-control custom-input col-xs-6" placeholder="بحث برقم الموظف">
                                </div>
                                <div class="col-xs-4 right">
                                    <button type="submit" class="btn btn-primary">بحث</button>
                                </div>
                              </div>
                        </div>
                      </form>
                      <hr>
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> الرقم الوظيفي</th>
                            <th scope="col">إسم الموظف</th>
                            <th scope="col">الحالة</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(count($emps)>0)
                            @foreach($emps as $emp)
                            <tr>
                                <th>{{$emp->id}}</th>
                                <td>{{$emp->empnum}}</td>
                                <td>{{$emp->empname}}</td>
                                <td><i class="fas {{(count($emp->attendance)>0)?"fa-check-circle green":"fa-times-circle red"}} "></i></td>
                              </tr>
                            @endforeach
                            @elseif($emp !== null)
                            <tr>
                                <th>{{$emp->id}}</th>
                                <td>{{$emp->empnum}}</td>
                                <td>{{$emp->empname}}</td>
                                <td><i class="fas {{(count($emp->attendance)>0)?"fa-check-circle green":"fa-times-circle red"}} "></i></td>
                            </tr>
                            @else
                              @endif
                        </tbody>
                      </table>
                </div>

            </div>
        </div>

    </body>
</html>
