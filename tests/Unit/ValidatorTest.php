<?php

use Core\Validator;

test('validates minimum string length', function () {
    expect(Validator::string('abc', 4))->toBeFalse();
    expect(Validator::string('abcd', 4))->toBeTrue();
});

test('validet an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@example.com'))->toBeTrue();
});
