<header class="app-header"><a class="app-header__logo" href="index.html">Portfolio</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="edit_profile.php"><i class="fa fa-user fa-lg"></i> Update Profile</a></li>
            <li><a class="dropdown-item" href="update_password.php"><i class="fa fa-user fa-lg"></i> Update Passsword</a></li>
            <li><a class="dropdown-item" href="?user_id=<?php echo SessionUser::getUser('user_id') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            <?php
							if(isset($_GET['user_id'])){
							  SessionUser::destroyUser();
							}
            ?>
          </ul>
        </li>
      </ul>
</header>