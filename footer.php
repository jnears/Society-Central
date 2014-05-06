<?php
/**
* The template for displaying the footer.
*
* Contains the closing of the #content div and all content after
*
* @package societycentral
*/
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
<div class="site-info">

<div class="third">
<h3>Contact</h3>
<p>
Institute for Social &amp; Economic Research<br>
University of Essex<br>
Wivenhoe Park<br>
Colchester CO4 3SQ<br>
+44 (0) 1206 873684<br>
<a href="mailto:societycentral@essex.ac.uk">societycentral@essex.ac.uk</a><br>
</p>
<p class="logo"><a class="iser-logo" href="https://iser.essex.ac.uk">ISER</a></p>
<p class="logo"><a class="essex-logo" href="http://www.essex.ac.uk">University of Essex</a></p>
</div>

<div class="third">
<h3>Departments</h3>
<nav class="topics"><ol>
<?php top_level_category_list(); ?>
</ol>
</nav>
</div>

<div class="third twitter" data-twttr-id="twttr-sandbox-0">
<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" class="twitter-timeline twitter-timeline-rendered" title="Twitter Timeline" width="469" height="400" style="border: none; max-width: 100%; min-width: 180px;"></iframe>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
</div>

<a href="#" id="show-grid" class="btn">Toggle grid</a>
<!-- <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'societycentral' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'societycentral' ), 'WordPress' ); ?></a>
<span class="sep"> | </span>
<?php printf( __( 'Theme: %1$s by %2$s.', 'societycentral' ), 'societycentral', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?> -->
</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
