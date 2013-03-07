<?php

class KokenPiwikAnalytics extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_head', 'render');
	}

	function render()
	{

		echo <<<OUT
<!-- Piwik --> 
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "$this->data->tracking_url" : "$this->data->tracking_url");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 3);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="$this->data->tracking_url/piwik.php?idsite=$this->data->site_id" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
OUT;

	}
}