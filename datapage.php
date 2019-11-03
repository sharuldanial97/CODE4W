<!DOCTYPE HTML>
<html>

<head>
	<meta charset = "UTF-8" name = "viewport" content ="width-device=width, initial scale = 1" /> 
	<title></title>
	<style>

		body{

			background-image: url(images/bcg2.jpg);
			background-size:cover;
			background-attachment:fixed;
            background-repeat:no-repeat;
            height:100%;
        }	
        
        
	</style>
	<link rel = "stylesheet" type = "text/css" href = "css/style.css" media="screen" />	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>

<body>

<header> 
    <a href="index.php"><img src="images/header2.png" alt="logo" class="logos"> </a>
</header>


<div>

</div>
<div class="row justify-content-center" style="float:right;">
        
    <div class="searchcontainer">

            <div class="col-sm-12">
                <form class="card card-sm" style="background: rgba(0,0,0,0.5);">
                    <div class="card-body row no-gutters align-items-center">
                        <!--div class="col-auto">
                            <i class="fas fa-search h4 text-body"></i>
                        </div-->
                    
                        <div class="col-auto">
                            <input class="form-control form-control-lg form-control-borderless" style="font-size:1vw;" type="search" placeholder="Enter animal keyword...">
                        </div>
                    
                        <div class="col-auto">
                            <button class="btn btn-lg btn-success" type="submit"><i class="fas fa-search h4 text-body"></i></button>
                        </div>
                    
                    </div>
                </form>
            </div>
  
        <br>    
        <!--div class="profilecontainer" style="color:white; background: rgba(0,0,0,0.5);">
            
            <p> This website is developed to study the trend of sales and prices of illegal wildlife online.</p> <br>

    
        </div-->
    </div>
    </div>
<div>
     <?php
        $command = escapeshellcmd('python\scrape.py '. + $_GET['searchTerm']);
        $output = shell_exec($command);
        echo $output;
    ?>
    <img src="plot.png" alt="logo" class="footerlogos"> 
</div>

<div id="footer">
        <!--img src="images/footer.png" alt="logo" class="footerlogos"--> 
</div>
   
</body>
</html>


