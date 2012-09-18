<?php use_stylesheet('menu.css'); ?>
<!--[if IE]>
<style type="text/css" media="screen">
 #menu ul li {float: left; width: 100%;}
</style>
<![endif]-->
<!--[if lt IE 7]>
<style type="text/css" media="screen">
body {
behavior: url(csshover.htc);
font-size: 100%;
}

#menu ul li a {float: left; height: 1%;} 

#menu a, #menu h2 {
font: bold 0.7em/1.4em arial, helvetica, sans-serif;
}
</style>
<![endif]-->
<?php include_stylesheets()?>

<!-- start menu HTML -->

<ul>
    <li><a href="#">Home</a></li>
</ul>
<ul>
    <li><a href="#">GDP</a>
        <ul>
            <li><?php echo link_to('New GDP', 'gdp/index')?></li>
            <li><?php echo link_to('New Gdp Record', 'gdprecord/single')?></li>
            <li><?php echo link_to('Monthly GDP Record Report', 'gdprecord/query')?></li>
            <li><?php echo link_to('Search Total GDP records', 'gdprecord/query')?></li>
            
        </ul>
    </li>
</ul>

<!--<ul>
    <li><a href="">System Administration</a>
          <ul>
            <li><a href="#">Users</a>
                <ul>
                <li><a href="#">Create New User</a></li>
                <li><a href="#">Eidt User List</a></li>
                </ul>
            </li>
            <li><a href="#">System Parameters</a>
                <ul>
                <li><a href="#">Access Level</a></li>
                <li><a href="#">department</a></li>
                <li><a href="#">gdp</a></li>
                <li><a href="#">country</a></li>
                <li><a href="#">unit</a></li>
                <li><a href="#">data source</a></li>
                <li><a href="#">period</a></li>
                <li><a href="#">type</a></li>
                <li><a href="#">status</a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>
-->
<ul>
    <li><a href="#">logout</a></li>
</ul>

 

