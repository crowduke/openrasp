--TEST--
hook PDO::__construct (dsn)
--SKIPIF--
<?php 
include(__DIR__.'/../skipif.inc');
if (!extension_loaded("mysqli")) die("Skipped: mysqli extension required.");
if (!extension_loaded("pdo")) die("Skipped: pdo extension required.");
file_put_contents('/tmp/openrasp/mysql_connect', 'mysql:host=127.0.0.1;port=3306');
?>
--INI--
openrasp.root_dir=/tmp/openrasp
openrasp.enforce_policy=On
--FILE--
<?php
new PDO('uri:file:///tmp/openrasp/mysql_connect', 'root');
?>
--EXPECTREGEX--
<\/script><script>location.href="http[s]?:\/\/.*?request_id=[0-9a-f]{32}"<\/script>