
<!-- | nav-collapse | -->
<nav class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a id="logo" class="navbar-brand" href="index.php"><img src="img/nextGenDev.ico" alt="nextGenDev"/></a>
</nav>
<!-- <nav class="collapse navbar-collapse" >
	<ul>
		<li><a href="#">Welcome Laravel</a></li>
		<li><a href="#">Migrate(Database)</a></li>
		<li><a href="#">Blade Laravel</a></li>
		<li><a href="#">Language</a></li>
		<li><a href="#">UI Testing</a></li>
    </ul>
</nav>
<nav>
	<ul id="lang">
		<li><span>English</span><img src="img/layout/en_icon.jpg" alt="language icon"></li>
	</ul>
</nav> -->
<nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
		<li><a href="#">Welcome Laravel</a></li>
		<li><a href="#">Migrate(Database)</a></li>
		<li><a href="#">Blade Laravel</a></li>
		<li><a href="#">Language</a></li>
		<li><a href="{{url('/')}}">UI Testing</a></li>
		<li>{{HTML::link('/ui', 'UI')}}</li>
      </ul>
      <ul id="lang" class="nav navbar-nav navbar-right">
        <li><a href="#"><span>English</span><img src="img/layout/en_icon.jpg" alt="language icon"></a></li>
      </ul>
    </nav>

<!-- | nav-collapse | -->
