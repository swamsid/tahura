<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="clip-circle" src="{{ asset('public/backend/img/upload/pegawai/'.Auth::user()->user_id.'/'.Auth::user()->foto) }}" style="object-fit: scale-down;" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->nama }}</strong>
                    </span> <span class="text-muted text-xs block">{{ Session::get('jabatan') }}</a>
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    +
                </div>
            </li>

            @if(Auth::user()->hasAccessTo('dashboard'))
                <li class="active">
                    <a href="{{Route('wpadmin.dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                </li>
            @endif

            @if(Auth::user()->hasAccessTo('data master'))
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Data Master</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @if(Auth::user()->can('read', 'data_jabatan'))
                            <li><a href="{{ Route('wpadmin.jabatan.index') }}">Master Data Jabatan</a></li>
                        @endif

                        @if(Auth::user()->can('read', 'data_pegawai'))
                            <li><a href="{{ Route('wpadmin.pegawai.index') }}">Master Data Pegawai</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasAccessTo('manajemen pendaki'))
                <li>
                    <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Manajemen Pendaki</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        @if(Auth::user()->can('read', 'data_pendaftar'))
                            <li><a href="{{ Route('wpadmin.pendaki.index') }}">Data Pendaftar</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(Auth::user()->hasAccessTo('laporan'))
                <li>
                    <a href="{{ Route('wpadmin.laporan.pendaki_masuk.index') }}"><i class="fa fa-database"></i> <span class="nav-label">Laporan</span></a>
                </li>
            @endif
        </ul>

    </div>
</nav>