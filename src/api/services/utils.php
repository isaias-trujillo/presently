<?php

function hasValidParams(array $valid_params, array $params): bool
{
    return empty($params) || !empty(array_intersect($valid_params, $params));
}