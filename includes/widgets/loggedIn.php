    <nav class="top-bar shadow" data-topbar>
  <ul class="title-area">
    <li class="name">
      <a href="../GRU_H5" title="Forsíðan"><img src="img/smallbDMI.png"></a>
    </li>
    <li class="toggle-topbar menu-icon"><a><span>menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <ul class="left hide-for-small">
        <li class="has-form">
        <form>
            <div class="row collapse topHeight paddingSide">
              <div class="large-12 columns">
                <input type="text" placeholder="Leita að kvikmynd" autocomplete="off" id="search" class="navInput">
                <ul id="results" class="dropdown"></ul>
              </div>
            </div>
          </form>
        </li>
    </ul>


    <ul class="right">
    <li class="divider hide-for-small"></li>
    <li class="has-dropdown show-for-medium-up"><a> <?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></a>

        <ul class="dropdown">
          <li><a href="settings.php" class="navHover">Stillingar</a></li>
          <li class="divider"></li>
          <li><a href="signOut.php" class="navHover">Útskráning</a></li>
        </ul>
      </li>
      <li class="show-for-small"><a href="settings.php" class="navHover">Stillingar</a></li>
      <li class="divider show-for-small"></li>
      <li class="show-for-small"><a href="signOut.php" class="navHover">Útskráning</a></li>
    </ul>