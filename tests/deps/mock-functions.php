<?php

function get_option($name)
{
    return wp_options[$name] ?? null;
}

function is_ssl()
{
    return true;
}

function apply_filters($name, $value)
{
    return $value;
}
