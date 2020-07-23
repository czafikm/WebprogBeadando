<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark mdb-color darken-1">
  <a id="navHomepage" class="navbar-brand" href="index.php">Homepage</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <?php if(!IsUserLoggedIn()) : ?>
      <li class="nav-item">
        <a id="navLogin" class="nav-link" href="index.php?P=login" value="">Login</a>
      </li>
      <li class="nav-item">
        <a id="navRegister" class="nav-link" href="index.php?P=register">Register</a>
      </li>
        <?php else : ?>
      <li class="nav-item" >
        <a id="navCharacter" class="nav-link" href="index.php?P=character">Character</a>
      </li>
      <li class="nav-item">
        <a id="navSkins" class="nav-link" href="index.php?P=skins">Skins</a>
      </li>
      <li class="nav-item">
        <a id="navMission" class="nav-link" href="index.php?P=mission">Mission</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?P=messages">
          <span id="navMessages">Messages</span>
          <span id="notification" class="badge bg-danger ml-2">3</span>
        </a>
      </li>
      <li class="nav-item">
        <a id="navToplist" class="nav-link" href="index.php?P=toplist">Toplist&nbsp;</a>
      </li>
    <?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 2) : ?>
      <li style="border-left: 1px solid gray;" class="nav-item">
      </li>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"  style="color: #FF3333">

          <span>&nbsp;Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a id="navBugreportlist" class="dropdown-item" href="index.php?P=buglist"><i class="fas fa-bug" style="margin-right: 10px;"></i>Bug reports</a>
          <a id="navUsers" class="dropdown-item" href="index.php?P=users" ><i class="fas fa-user" style="margin-right: 10px;"></i>Users list</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>
<ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" title="Discord">
          <i class="fab fa-discord"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light" title="Facebook">
          <i class="fab fa-facebook"></i>
        </a>
      </li>
      <li class="nav-item">
        <a id="navBugreport" class="nav-link waves-effect waves-light" title="Hibajelentés" href="index.php?P=bugreport">
        <i class="fas fa-bug"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a id="navProfile" class="dropdown-item" href="index.php?P=account"><i class="fas fa-user-edit" style="margin-right: 10px;"></i>Profile</a>
          <a id="navLogout" class="dropdown-item" href="index.php?P=logout" ><i class="fas fa-sign-out-alt" style="margin-right: 10px;"></i>Logout</a>
        </div>
      </li>
    <?php endif; ?>
    </ul>
  </div>
</nav>