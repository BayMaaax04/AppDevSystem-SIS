@extends('dashboards.admins.admin_layouts.admin-nav')

@section('content')
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Dashboard</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                <form class="navbar-form">
                    <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                        Stats
                        </p>
                    </a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p class="d-lg-none d-md-block">
                        Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                        Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Used Space</p>
                        <h3 class="card-title">49/50
                        <small>GB</small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="javascript:;">Get More Space...</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">store</i>
                        </div>
                        <p class="card-category">Revenue</p>
                        <h3 class="card-title">$34,245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">person</i>
                        </div>
                        <p class="card-category">Total Professors</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">school</i>
                        </div>
                        <p class="card-category">Total Students</p>
                        <h3 class="card-title">+245</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                        <div class="card-header card-header-danger">
                            <h4 class="card-title">{{ __('Newly Registered Students') }}</h4>
                            <p class="card-category">As of 
                                <script>
                                    document.write(monthNames[d.getMonth()] + ' ')
                                    document.write(new Date().getDay() + ', ')
                                    document.write(new Date().getFullYear())
                                </script>
                            </p>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover">
                            <thead class="text-warning">
                                <th>Name</th>
                                <th>Email</th>

                            </thead>
                            <tbody>
                                <tr>
                                    <td>Jan Mikko Malizon</td>
                                    <td>jmmalizon@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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