<?php

use Core\Container;

test('it can reslove something out of the container', function () {
    // arange
    $container = new Container();
    // $container->bind('foo', function () {
    //     return 'foo';
    // });
    $container->bind('foo',  fn() => 'bar');

    // act 
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('bar');
});
