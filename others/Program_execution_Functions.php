<?php
echo '<pre>';

// Outputs all the result of shellcommand "ls", and returns
// the last output line into $last_line. Stores the return value
// of the shell command in $retval.
$last_line = system('ls', $retval);

// Printing additional info
echo '
</pre>
<hr />Last line of the output: ' . $last_line . '
<hr />Return value: ' . $retval;

echo "</br>";
// outputs the username that owns the running php/httpd process
// (on a system with the "whoami" executable in the path) exec('whoami');
echo "Node Version : ".exec('node -v');

echo "</br>";

$output = shell_exec('ls -lart');
echo "<pre>$output</pre>";

echo "</br>";