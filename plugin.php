<?php

class KokenPiwikAnalytics extends KokenPlugin {

	function __construct()
	{
		$this->require_setup = true;
		$this->register_hook('before_closing_body', 'render');
	}

	function render()
	{

		echo <<<OUT
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  // tracker methods like "setCustomDimension" should be called before "trackPageView"
  _paq.push(['trackPageView']);
  _paq.push(['enableHeartBeatTimer']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//{$this->data->tracking_url}/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '{$this->data->site_id}']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//{$this->data->tracking_url}/piwik.php?idsite={$this->data->site_id}&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
OUT;

	}
}
