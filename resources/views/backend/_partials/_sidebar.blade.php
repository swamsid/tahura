<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="clip-circle" src="{{ asset('backend/img/upload/pegawai/'.Auth::user()->user_id.'/'.Auth::user()->foto) }}" style="object-fit: scale-down;" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->nama }}</strong>
                    </span> <span class="text-muted text-xs block">Sebagai {{ Auth::user()->id_jabatan }}</a>
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ Route('wpadmin.jabatan.index') }}">Master Data Jabatan</a></li>
                    <li><a href="{{ Route('wpadmin.pegawai.index') }}">Master Data Pegawai</a></li>
                </ul>
            </li>
            <li>
                <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Manajemen Pendaki</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ Route('wpadmin.pendaki.index') }}">Data Pendaftar</a></li>
                </ul>
            </li>
            <li class="special_link">
                <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Laporan</span></a>
            </li>
        </ul>

    </div>
</nav>