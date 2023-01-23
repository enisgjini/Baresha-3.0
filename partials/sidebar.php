<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="fi fi-rr-home menu-icon pe-3"></i>
        <span class="menu-title">Shtëpia</span>
      </a>
    </li>
    <?php if ($_SESSION['acc'] == '1') {
    ?>
      <li class="nav-item">
        <a class="nav-link" href="logs.php">
          <i class="fi fi-rr-time-past menu-icon pe-3"></i>
          <!-- <i class="fa-solid fa-clock-rotate-left menu-icon pe-3"></i> -->
          <span class="menu-title">Logs</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="stafi.php">
          <i class="fi fi-rr-users-alt menu-icon pe-3"></i>
          <span class="menu-title">Stafi</span>
        </a>
      </li>

    <?php } ?>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#klienti" aria-expanded="false" aria-controls="klienti">
        <i class="fi fi-rr-handshake menu-icon pe-3"></i>
        <span class="menu-title">Klient&euml;t</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="klienti">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="klient.php">Lista e klient&euml;ve</a></li>
          <li class="nav-item"><a class="nav-link" href="klient2.php">Lista e klient&euml;ve tjer</a></li>
          <li class="nav-item"><a class="nav-link" href="kategorit.php">Lista e kategorive</a></li>
          <li class="nav-item"><a class="nav-link" href="ads.php">ADS Accounts</a></li>
          <li class="nav-item"><a class="nav-link" href="emails.php">Email list</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#video" aria-expanded="false" aria-controls="video">
        <i class="fi fi-rr-cloud-upload-alt menu-icon pe-3"></i>
        <span class="menu-title">Videot / Ngarkimi</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="video">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="shtoy.php">Regjistro nj&euml; k&euml;ng&euml;</a></li>
          <li class="nav-item"><a class="nav-link" href="listang.php">Lista e K&euml;ng&euml;ve</a></li>

        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tiketat" aria-expanded="false" aria-controls="tiketat">
        <i class="fi fi-rr-ticket menu-icon pe-3"></i>
        <span class="menu-title">Tiketat</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="tiketat">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="tiketa.php">Tiket e re</a></li>
          <li class="nav-item"><a class="nav-link" href="listat.php">Lista e tiketave</a></li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#content" aria-expanded="false" aria-controls="content">
        <i class="fi fi-rr-photo-video menu-icon pe-3"></i>
        <span class="menu-title">Content ID</span>
        <i class="menu-arrow pe-3"></i>
      </a>
      <div class="collapse" id="content">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="claim.php">Recent Claim</a></li>
          <li class="nav-item"><a class="nav-link" href="whitelist.php">Whitelist</a></li>
        </ul>
      </div>
    </li>


    <?php if ($_SESSION['acc'] == '3') { ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#financat" aria-expanded="false" aria-controls="financat">
          <i class="fi fi-rr-chart-histogram menu-icon pe-3"></i>
          <span class="menu-title">Financat</span>
          <i class="menu-arrow pe-3"></i>
        </a>
        <div class="collapse" id="financat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="rrogat.php">Pagat</a></li>
            <li class="nav-item"><a class="nav-link" href="tatimi.php">Tatimi</a></li>
            <li class="nav-item"><a class="nav-link" href="yinc.php">Shpenzimet</a></li>
            <li class="nav-item"><a class="nav-link" href="shpenzimep.php">Shpenzimet Personale</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat.php">Pagesat YouTube</a></li>
            <li class="nav-item"><a class="nav-link" href="pagesat.php">Pagesat e kryera</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat2.php">Platformat Tjera</a></li>
          </ul>
        </div>
      </li>

    <?php } ?>
    <?php if ($_SESSION['acc'] == '1') {
    ?>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#financat" aria-expanded="false" aria-controls="financat">
          <i class="fi fi-rr-chart-histogram menu-icon pe-3"></i>
          <span class="menu-title">Financat</span>
          <i class="menu-arrow  pe-3"></i>
        </a>
        <div class="collapse" id="financat">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="rrogat.php">Pagat</a></li>
            <li class="nav-item"><a class="nav-link" href="tatimi.php">Tatimi</a></li>
            <li class="nav-item"><a class="nav-link" href="yinc.php">Shpenzimet</a></li>
            <li class="nav-item"><a class="nav-link" href="shpenzimep.php">Shpenzimet Personale</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat.php">Pagesat YouTube</a></li>
            <li class="nav-item"><a class="nav-link" href="pagesat.php">Pagesat e kryera</a></li>
            <li class="nav-item"><a class="nav-link" href="faturat2.php">Platformat Tjera</a></li>
          </ul>
        </div>
      </li>

    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="filet.php">
        <i class="fi fi-rr-folders menu-icon pe-3"></i>
        <span class="menu-title">Dokumente Tjera</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="chatGPT.php">
        <i class="fi fi-rr-file-ai menu-icon pe-3"></i>
        <span class="menu-title">Chat GPT</span>
      </a>
    </li>
  </ul>
</nav>