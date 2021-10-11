<?php
/** @var modX $this->modx */
/** @var array $sources */

$chunks = array();

$tmp = array(
    'head' => array(
        'file' => 'head',
        'description' => ''
    ),
    'header' => array(
        'file' => 'header',
        'description' => ''
    ),
    'footer' => array(
        'file' => 'footer',
        'description' => ''
    ),
    'scripts' => array(
        'file' => 'scripts',
        'description' => ''
    ),
    'block_feedback' => array(
        'file' => 'block_feedback',
        'description' => ''
    ),
    'block_text' => array(
        'file' => 'block_text',
        'description' => ''
    ),
    'schetchiki' => array(
        'file' => 'schetchiki',
        'description' => ''
    ),
    'style' => array(
        'file' => 'style',
        'description' => ''
    ),
    'tpl_card' => array(
        'file' => 'tpl_card',
        'description' => ''
    ),
);
$setted = false;
foreach ($tmp as $k => $v) {
    
    /** @var modchunk $chunk */
    $chunk = $this->modx->newObject('modChunk');
    $chunk->fromArray(array(
        'name' => $k,
        'category' => 0,
        'description' => @$v['description'],
        'content' => file_get_contents($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html',
    ), '', true, true);
    $chunks[] = $chunk;
}
unset($tmp, $properties);

return $chunks;
