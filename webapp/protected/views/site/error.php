<div class="container error-404">
	<h1><?php echo $code?></h1>
	<h2>Houston, we have a problem.</h2>
	<p>
		Actually, the page you are looking for does not exist. 
	</p>
	<p>
		<a href="/">Return home</a>
		<br>
	</p>
	
	<pre><?php echo $message?></pre>
	<pre><?php echo $file.":".$line?></pre>
	<pre><?php echo $trace?></pre>
	
</div>
