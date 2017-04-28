<!-- Side-Nav-->
    <aside class="main-sidebar hidden-print">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
          <div class="pull-left info">
            <p>John Doe</p>
            <p class="designation">Frontend Developer</p>
          </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
          <li class="" id="nav-dashboard"><a href={{route('page.dashboard')}}><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
          <li class="" id="nav-list-user"><a href={{route('page.list-user')}}><i class="fa fa-user"></i><span>User</span></a></li>
          <li class="" id="nav-list-guru"><a href={{route('page.list-guru')}}><i class="fa fa-desktop"></i><span>Guru</span></a></li>
          <li class="" id="nav-list-siswa"><a href={{route('page.list-siswa')}}><i class="fa fa-child"></i><span>Siswa</span></a></li>
          <li class="" id="nav-list-nilai"><a href={{route('page.list-nilai')}}><i class="fa fa-edit"></i><span>Nilai</span></a></li>
          <li class="" id="nav-list-class"><a href={{route('page.list-class')}}><i class="fa fa-users"></i><span>Kelas</span></a></li>
          <li class="" id="nav-list-mapel"><a href={{route('page.list-mapel')}}><i class="fa fa-th-list"></i><span>Mata Pelajaran</span></a></li>
        </ul>
      </section>
    </aside>