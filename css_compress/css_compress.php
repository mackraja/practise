<style type="text/css">
<?php
     $cssFiles = array(
      'styles.css',
    );

    $buffer = '';
    foreach ($cssFiles as $cssFile) {
        $buffer .= file_get_contents($cssFile);
    }
    echo minify_css($buffer);
?>
</style>
<?php
function minify_css($input)
{
    $input = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $input);
    $input = str_replace(': ', ':', $input);

    return str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $input);
}
?>