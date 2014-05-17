elasticache-php-sessions
========================

A class file / instructions to setup php to use Elasticache Cluster Client for PHP for PHP sessions.

1.  Follow the instructions here to get the Elasticache Cluster Client for PHP setup

http://docs.aws.amazon.com/AmazonElastiCache/latest/UserGuide/Appendix.PHPAutoDiscoverySetup.html

2.  Include this at the beginning of your PHP:

require 'path/to/ElasticachePHPSessions.php';
$session_handler = new ElasticachePHPSessions(YOUR_ELASTICACHE_ENDPOINT, YOUR_ELASTICACHE_PORT, YOUR_SESSION_EXPIRATION_DURATION);
session_set_save_handler($session_handler, true);

(hint: YOUR_SESSION_EXPIRATION_DURATION = seconds)

3.  Done!  You can now call session activity as you normally would:

session_start();

$_SESSION['yeah'] = "it works!";


