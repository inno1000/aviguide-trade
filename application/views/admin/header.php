

    <!-- Navigation -->
    <nav id="mainNav" class="navbar static-top navbar-toggleable-md navbar-inverse bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="sidebar-nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-area-chart"></i> Charts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents"><i class="fa fa-fw fa-wrench"></i> Components</a>
                    <ul class="sidebar-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="#">Fixed Navigation</a>
                        </li>
                        <li>
                            <a href="#">Custom Card Examples</a>
                        </li>
                        <li>
                            <a href="#">Blank Page</a>
                        </li>
                        <li>
                            <a href="#">Login Page</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti"><i class="fa fa-fw fa-sitemap"></i> Menu Levels</a>
                    <ul class="sidebar-second-level collapse" id="collapseMulti">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
                            <ul class="sidebar-third-level collapse" id="collapseMulti2">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-envelope"></i> <span class="hidden-lg-up">Messages <span class="badge badge-pill badge-primary">12 New</span></span>
                        <span class="new-indicator text-primary hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">12</span></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="messagesDropdown">
                        <h6 class="dropdown-header">New Messages:</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>David Miller</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>Jane Smith</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <strong>John Doe</strong> <span class="small float-right text-muted">11:21 AM</span>
                            <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item small" href="#">
                            View all messages
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i> <span class="hidden-lg-up">Alerts <span class="badge badge-pill badge-warning">6 New</span></span>
                        <span class="new-indicator text-warning hidden-md-down"><i class="fa fa-fw fa-circle"></i><span class="number">6</span></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content-wrapper py-3">

        <div class="container-fluid">

            <!-- Breadcrumbs -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>