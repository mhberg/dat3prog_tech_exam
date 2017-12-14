<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="index.php">XPLOR CALI</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav">
    <a class="nav-item nav-link" href="index.php">Home</a>
    <a class="nav-item nav-link" href="login.php">Login</a>
    <a class="nav-item nav-link" href="logout.php">Logout</a>
    <a class="nav-item nav-link" href=#><?php session_start(); echo "Logged in as: " . $_SESSION['login'];?></a>
  </div>
</div>
</nav>