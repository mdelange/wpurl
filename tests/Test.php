<?php

// See deps/mock-functions.php
const wp_options   = [
    'home' => 'https://test.local' // No trailing slash
];

require __DIR__ . '/deps/mock-functions.php';
require __DIR__ . '/deps/wp/link-template.php';
require __DIR__ . '/../url.php';

test('leading slash can be omitted', function () {
    $in  = url('/path/');
    $out = url('path/');
    expect($in)->toEqual($out);
});
test('query string included if parameters given', function () {
    $in  = url('path', ['foo' => 1, 'bar' => 2, 'baz' => 3]);
    $out = wp_options['home'] . '/path?foo=1&bar=2&baz=3';
    expect($in)->toEqual($out);
});
test('query string parameter values are encoded', function () {
    $in  = url('this/that/', ['foo' => ' ?', 'bar' => ':/']);
    $out = wp_options['home'] . '/this/that/?foo=+%3F&bar=%3A%2F';
    expect($in)->toEqual($out);
});
