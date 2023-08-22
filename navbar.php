<nav class="navbar  sticky-top justify-content-between">
  <div class="container-fluid">
    <div class="navbar-brand d-flex " >
      <img  src="./logo.png" width="120" height="60" alt="logo">
      <p class="align-middle pt-3 px-4" style="font-size:1.1em;">DocPoster</p>
    </div>

    <form class="d-flex" name='fSearch' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Buscar" name="search" autofocus>
      <button class="btn btn-outline-info" type="submit"  onCLick="document.fSearch.submit();">Search</button>
    </form>
  </div>
</nav>