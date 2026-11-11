<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="/dashboard" class="{{Request::is('dashboard*') ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        
        <li class="sidebar-heading" style="padding: 10px 25px 5px; font-size: 11px; color: #999; text-transform: uppercase; font-weight: bold;">Master Data</li>
        <li><a href="/siswa" class="{{Request::is('siswa*') ? 'active' : ''}}"><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
        <li><a href="/admin/gurus" class="{{Request::is('admin/gurus*') ? 'active' : ''}}"><i class="lnr lnr-users"></i> <span>Data Guru</span></a></li>
        <li><a href="/admin/kelas" class="{{Request::is('admin/kelas*') ? 'active' : ''}}"><i class="lnr lnr-apartment"></i> <span>Data Kelas</span></a></li>
        <li><a href="/admin/mapels" class="{{Request::is('admin/mapels*') ? 'active' : ''}}"><i class="lnr lnr-book"></i> <span>Mata Pelajaran</span></a></li>

        <li class="sidebar-heading" style="padding: 10px 25px 5px; font-size: 11px; color: #999; text-transform: uppercase; font-weight: bold;">Akademik &amp; Kesiswaan</li>
        <li><a href="/admin/presensi" class="{{Request::is('admin/presensi*') ? 'active' : ''}}"><i class="lnr lnr-calendar-full"></i> <span>Presensi Harian</span></a></li>
        <li><a href="/admin/nilais" class="{{Request::is('admin/nilais*') ? 'active' : ''}}"><i class="lnr lnr-chart-bars"></i> <span>Nilai &amp; Raport</span></a></li>
        <li><a href="/admin/ppdb" class="{{Request::is('admin/ppdb*') ? 'active' : ''}}"><i class="lnr lnr-license"></i> <span>PPDB Online</span></a></li>

        <li class="sidebar-heading" style="padding: 10px 25px 5px; font-size: 11px; color: #999; text-transform: uppercase; font-weight: bold;">Publikasi &amp; CMS</li>
        <li><a href="/admin/artikels" class="{{Request::is('admin/artikels*') ? 'active' : ''}}"><i class="lnr lnr-file-empty"></i> <span>Berita &amp; Artikel</span></a></li>
        <li><a href="/admin/pengumumans" class="{{Request::is('admin/pengumumans*') ? 'active' : ''}}"><i class="lnr lnr-bullhorn"></i> <span>Pengumuman</span></a></li>
        <li><a href="/admin/jurusans" class="{{Request::is('admin/jurusans*') ? 'active' : ''}}"><i class="lnr lnr-graduation-hat"></i> <span>Kompetensi Jurusan</span></a></li>

        <li style="margin-top: 15px;"><a href="/" target="_blank"><i class="lnr lnr-earth"></i> <span>Lihat Website</span></a></li>
      </ul>
    </nav>
  </div>
</div>
