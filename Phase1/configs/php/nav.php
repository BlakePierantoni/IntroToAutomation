<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="./">Happy Cars</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./">[Home] <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create.php">[Add Vehicle]</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="analytics.php">[Analytics]</a>
      </li>
    </ul>
    <span class="navbar-text">
      <form action="./index.php" method="post">
                <input type="text" name="search">
                <input type="submit" name="submit" value="Search">
            </form>
    </span>
  </div>
</nav>