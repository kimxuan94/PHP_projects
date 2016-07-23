<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <title>TP</title>
    </head>

    <body>

        <!-- Le header avec logo site et login -->
        <header>

          <div class="row">
              <div class="col-md-offset-1 col-md-2 well">
                log du site
              </div>
              <div class="col-md-offset-4 col-md-5">
                  <form action="#" class="form-inline">

                      <div class="form-group">
                        <label class="sr-only" for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword3">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                      </div>

                      <a href="#">Inscription</a> / <a href="#">Connexion</a>
                  </form>
              </div>
          </div>

        </header>
        <!-- Le header avec logo site et login -->

        <!-- La nav bar -->
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="row">
                    <div class="navbar-header col-md-2">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Project name</a>
                    </div>
                    <div class="col-md-10">
                        <div id="navbar" class="navbar-collapse collapse row">
                            <ul class="nav navbar-nav">
                                <li class="col-md-4 select"><a href="#">Accueil</a></li>
                                <li class="col-md-4"><a href="#">Page 1</a></li>
                                <li class="col-md-4"><a href="#">Page 2</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- La nav bar -->

        <!-- Contenu de la page -->
        <div class="row">

          <article class="col-md-offset-1 col-md-6 well">
            <form action="#" class="form-horizontal">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>

            </form>
          </article>
            
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-offset-2 col-md-8 col-md-offset-4 well">Coté T</div>
              <div class="col-md-offset-2 col-md-8 col-md-offset-4 well">Coté F</div>
            </div>
          </div>

        </div>
        <!-- Contenu de la page -->
    </body>
</html>
