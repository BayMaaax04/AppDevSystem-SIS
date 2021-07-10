@extends('dashboards.admins.admin_layouts.admin-nav')

@section('content')
    <div class="main-panel">
        <div class="w-full">
            <div class="content main-content">
                <div class="container-fluid py-3">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand " href="javascript:;">Dashboard</a>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="bg-red-accent rounded-full mb-2">
                                <i class="material-icons bg-red-accent">security</i>
                            </div>
                            <p class="card-category">Total Administrator</p>
                            <h3 class="card-title"><span class="font-bold text-4xl text-red-accent">{{ $admins }}</span></h3>
                        </div>
                        <div class="card-footer">
                            {{-- <div class="stats">
                            <i class="material-icons">date_range</i> Last 24 Hours
                            </div> --}}
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="bg-red-accent rounded-full mb-2">
                            <i class="material-icons bg-red-accent">face</i>
                            </div>
                            <p class="card-category">Total Professors</p>
                            <h3 class="card-title"><span class="font-bold text-4xl text-red-accent">{{ 75 }}</span></h3>
                        </div>
                        <div class="card-footer">
                            {{-- <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div> --}}
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <div class="card-header card-header-icon">
                            <div class="bg-red-accent rounded-full mb-2">
                            <i class="material-icons bg-red-accent">school</i>
                            </div>
                            <p class="card-category">Total Students</p>
                            <h3 class="card-title"><span class="font-bold text-4xl text-red-accent">{{ $students }}</span></h3>
                        </div>
                        <div class="card-footer">
                            {{-- <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div> --}}
                        </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">{{ __('Newly Registered Students') }}</h4>
                                <p class="card-category">As of 
                                    <script>
                                        document.write(monthNames[d.getMonth()] + ' ')
                                        document.write(new Date().getDate() + ', ')
                                        document.write(new Date().getFullYear())
                                    </script>
                                </p>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                <thead class="text-red-accent">
                                    <th>Name</th>
                                    <th>Email</th>

                                </thead>
                                <tbody>
                                    @foreach($latestusers as $latestuser)
                                        <tr>
                                            <td>{{ $latestuser->lastname.', '. $latestuser->firstname.' '.$latestuser->middlename[0].'.' }}</td>
                                            <td>{{ $latestuser->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Footer --}}
        <footer class="footer">
            <div class="container-fluid">
                <h5 class="copyright float-right">
                    &copy; 1998 -
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Polytechnic University of the Philippines
                </h5>
            </div>
        </footer>
    </div>

@endsection