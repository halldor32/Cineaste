 <nav class="top-bar shadow" data-topbar>
  <ul class="title-area">
    <li class="name">
      <a href="../GRU_H5" title="Forsíðan"><img src="img/smallbDMI.png"></a>
    </li>
    <li class="toggle-topbar menu-icon"><a><span>Menu</span></a></li>
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
      <li class="has-form hide-for-medium-down width">
        <form action="login.php" method="post">
          <div class="row collapse topHeight">
            <div class="small-5 pull-2 columns">
                <input type="text" name="username" id="username" placeholder="Notendanafn" required autofocus>
            </div>
            <div class="small-5 pull-1 columns">
                <input type="password" name="password" id="password" class="navInput" placeholder="Lykilorð" required>
            </div>
            <div class="small-2 show-for-large-up columns">
              <input id="submit" type="submit" value="Skrá inn" class="signup navInput" name="Login">
            </div>
          </div>
        </form>
      </li>
      <li class="show-for-medium-down navButton"><a href="login.html.php">Skrá inn</a></li>
      <li class="navButton"><a href="signup.php">Nýskráning</a></li>
    </ul>