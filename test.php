<?php

function foo() {
    try {
        throw new Exception('foo');
    } catch (Exception $e) {
        return 'bar';
    } finally {
        return 'baz';
    }
}

echo foo();