
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            padding: auto;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Table jobs</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">google jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Indeed jobs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Computrabajo jobs</a>
            </li>
          <li class="nav-item">
            <a class="nav-link" href="#">GlassDor jobs</a>
          </li>
        </ul>
        </div>
    </nav>

    <div style="overflow-x:auto;">
    <h1>Google</h1>
    <table class="table table-striped table-bordered table-dark table-hover">

            <?php
            require_once("./scraping_google.php");
            $out  = "";
            foreach($g as $key => $element){
                $out .= "<tr>";
                foreach($element as $subkey => $subelement){
                    $out .= "<td>$subelement</td>";
                }
                $out .= "</tr>";
            }

            echo $out;
            ?>
    </table>
    </div>
    <div style="overflow-x:auto;">
        <h1>Indeed</h1>
            <table class="table table-striped table-bordered table-dark table-hover">
                <?php
                require_once("./scraping_indeed.php");
                $out  = "";
                foreach($i as $key => $element){
                    $out .= "<tr>";
                    foreach($element as $subkey => $subelement){
                        $out .= "<td>$subelement</td>";
                    }
                    $out .= "</tr>";
                }
                echo $out;
                ?>
            </table>
    </div>
    <div style="overflow-x:auto;">
        <h1>CompuTrabajo</h1>
            <table class="table table-striped table-bordered table-dark table-hover">
                <?php
                require_once("./scraping_computrabajo.php");
                $out  = "";
                foreach($ct as $key => $element){
                    $out .= "<tr>";
                    foreach($element as $subkey => $subelement){
                        $out .= "<td>$subelement</td>";
                    }
                    $out .= "</tr>";
                }
                echo $out;
                ?>
            </table>    
    </div>
        <div style="overflow-x:auto;">
        <h1>GlassDor</h1>
            <table class="table table-striped table-bordered table-dark table-hover">
                <?php
                require_once("./scraping_glassdor.php");
                $out  = "";
                foreach($gd as $key => $element){
                    $out .= "<tr>";
                    foreach($element as $subkey => $subelement){
                        $out .= "<td>$subelement</td>";
                    }
                    $out .= "</tr>";
                }    
                echo $out;
                ?>
            </table>
        </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>  
</body>


</html>