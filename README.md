elasticache-php-sessions
========================

A class file / instructions to setup php to use Elasticache Cluster Client for PHP for PHP sessions.

A.  Follow the instructions here to get the Elasticache Cluster Client for PHP setup

http://docs.aws.amazon.com/AmazonElastiCache/latest/UserGuide/Appendix.PHPAutoDiscoverySetup.html

B.  Include this at the beginning of your PHP:

<pre>
require 'path/to/ElasticachePHPSessions.php';
$session_handler = new ElasticachePHPSessions(YOUR_ELASTICACHE_ENDPOINT, YOUR_ELASTICACHE_PORT, YOUR_SESSION_EXPIRATION_DURATION);
session_set_save_handler($session_handler, true);
</pre>

(hint: YOUR_SESSION_EXPIRATION_DURATION = seconds)

C.  Done!  You can now call session activity as you normally would:

<pre>
session_start();

$_SESSION['yeah'] = "it works!";
</pre>

