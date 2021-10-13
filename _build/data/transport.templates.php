<?php
/** @var modX $this->modx */
/** @var array $sources */

$templates = array();

$tmp = array(
    'cat_service' => array(
        'name' => 'Категория услуг',
        'description' => ''
    ),
    'cat_doctors' => array(
        'name' => 'Категория врачей',
        'description' => ''
    ),
    'cat_news' => array(
        'name' => 'Категория статей',
        'description' => ''
    ),
    'service' => array(
        'name' => 'Услуга',
        'description' => ''
    ),
    'doctor' => array(
        'name' => 'Врач',
        'description' => ''
    ),
    'article' => array(
        'name' => 'Статья',
        'description' => ''
    ),
    'onecolumn' => array(
        'name' => 'Одна колонка',
        'description' => ''
    ),
    'contacts' => array(
        'name' => 'Контакты',
        'description' => ''
    ),
    'licenses' => array(
        'name' => 'Лицензии',
        'description' => ''
    ),
    'palaty' => array(
        'name' => 'Палаты',
        'description' => ''
    ),
    'clinic' => array(
        'name' => 'Клиника',
        'description' => ''
    ),
);
$setted = false;
foreach ($tmp as $k => $v) {
    
    /** @var modtemplate $template */
    $template = $this->modx->newObject('modTemplate');
    $template->fromArray(array(
        'templatename' => $v['name'],
        // 'category' => 0,
        'description' => @$v['description'],
        'content' => file_get_contents($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/templates/template.' . $k . '.html'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/templates/template.' . $v['file'] . '.html',
    ), '', true, true);
    $templates[] = $template;
}
unset($tmp, $properties);

return $templates;
