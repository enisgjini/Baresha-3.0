<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row shadow-1 mt-0">
  <div class="navbar-brand-wrapper d-flex justify-content-center">
    <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
      <a class="navbar-brand brand-logo" href="index.php"><img src="images/logos.png" alt="logo" style="object-fit:contain;" /></a>
      <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logos.png" alt="logo" style="object-fit:fill;" /></a>
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-mdb-toggle="minimize" data-mdb-placement="bottom" title="Mbylle menun duke shtypur tastin m">
        <span class="mdi mdi-sort-variant"></span>
      </button>
    </div>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <ul class="navbar-nav mr-lg-4 w-100">
      <li class="nav-item nav-search d-none d-lg-block w-100">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="search">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
        </div>
      </li>
      <li>
        <button id="button-id" class="btn btn-light"><i class="fi fi-rr-brightness" id="icon-id"></i></button>
      </li>
      <li>
        <button class="btn btn-primary" id="skinToggler">Toggle skin</button>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown me-1">
        <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-bs-toggle="dropdown">
          <i class="mdi mdi-message-text mx-0"></i>
          <span class="count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
            </div>
            <div class="item-content flex-grow">
              <h6 class="ellipsis font-weight-normal">David Grey
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                The meeting is cancelled
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
            </div>
            <div class="item-content flex-grow">
              <h6 class="ellipsis font-weight-normal">Tim Cook
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                New product launch
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
            </div>
            <div class="item-content flex-grow">
              <h6 class="ellipsis font-weight-normal"> Johnson
              </h6>
              <p class="font-weight-light small-text text-muted mb-0">
                Upcoming board meeting
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item ">
        <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-bs-toggle="dropdown">

        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-success">
                <i class="mdi mdi-information mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">Application Error</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Just now
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-warning">
                <i class="mdi mdi-settings mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                Private message
              </p>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="item-thumbnail">
              <div class="item-icon bg-info">
                <i class="mdi mdi-account-box mx-0"></i>
              </div>
            </div>
            <div class="item-content">
              <h6 class="font-weight-normal">New user registration</h6>
              <p class="font-weight-light small-text mb-0 text-muted">
                2 days ago
              </p>
            </div>
          </a>
        </div>
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="images/faces/face5.jpg" alt="profile" />
          <span class="nav-profile-name"><?php echo $_SESSION["emri"]; ?></span>
        </a>
        <ul class="dropdown-menu navbar-dropdown rounded-3" aria-labelledby="profileDropdown">
          <li class="dropdown-item">
            <i class="fi fi-rr-settings"></i>
            Cilësimet
          </li>
          <li class="dropdown-item">
            <i class="fi fi-rr-exit"></i> <a href="out.php" class="text-decoration-none text-dark">Dilni</a>
          </li>
        </ul>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-mdb-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>


<script>
  window.onload = function() {
    const button = document.getElementById('button-id');
    const icon = document.getElementById('icon-id');
    const otherElement = document.getElementById('sss');

    let isDarkMode = false;

    button.addEventListener('click', function() {
      if (isDarkMode) {

        icon.classList.remove('fi-rr-moon');
        icon.classList.add('fi-rr-brightness');
        otherElement.style.backgroundColor = 'white';
        otherElement.classList.remove("text-warning");
        otherElement.classList.add("text-dark");
      } else {

        icon.classList.remove('fi-rr-brightness');
        icon.classList.add('fi-rr-moon');
        otherElement.style.color = 'white';
        otherElement.style.backgroundColor = 'black';
        otherElement.classList.remove("text-dark");
        otherElement.classList.add("text-warning");
      }

      isDarkMode = !isDarkMode;
    });
  };

  
</script>