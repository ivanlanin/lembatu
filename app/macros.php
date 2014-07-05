<?php
/**
 *
 */

/**
 * Delete form macro
 */
Form::macro('delete', function (
    $url,
    $label = '',
    $params = array(),
    $options = array('class' => 'btn btn-small btn-danger')
) {
    if ($label == '') {
        $label = Lang::get('msg.delete');
    }
    if (empty($params)) {
        $params = array('class'  => 'delete-form');
    };
    $params['url'] = $url;
    $params['method'] = 'DELETE';

    return Form::open($params) . Form::submit($label, $options) . Form::close();
});
