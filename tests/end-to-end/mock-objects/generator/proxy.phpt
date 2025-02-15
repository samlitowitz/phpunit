--TEST--
\PHPUnit\Framework\MockObject\Generator\Generator::generate('Foo', null, 'ProxyFoo', true, true, true, true)
--FILE--
<?php declare(strict_types=1);
class Foo
{
    public function bar(Foo $foo)
    {
    }

    public function baz(Foo $foo)
    {
    }
}

require_once __DIR__ . '/../../../bootstrap.php';

$generator = new \PHPUnit\Framework\MockObject\Generator\Generator;

$mock = $generator->generate(
    'Foo', true, true, [], 'ProxyFoo', true, true, true, true
);

print $mock->classCode();
--EXPECTF--
declare(strict_types=1);

class ProxyFoo extends Foo implements PHPUnit\Framework\MockObject\MockObjectInternal
{
    use PHPUnit\Framework\MockObject\StubApi;
    use PHPUnit\Framework\MockObject\MockObjectApi;
    use PHPUnit\Framework\MockObject\GeneratedAsMockObject;
    use PHPUnit\Framework\MockObject\Method;
    use PHPUnit\Framework\MockObject\DoubledCloneMethod;

    public function bar(Foo $foo)
    {
        $__phpunit_arguments = [$foo];
        $__phpunit_count     = func_num_args();

        if ($__phpunit_count > 1) {
            $__phpunit_arguments_tmp = func_get_args();

            for ($__phpunit_i = 1; $__phpunit_i < $__phpunit_count; $__phpunit_i++) {
                $__phpunit_arguments[] = $__phpunit_arguments_tmp[$__phpunit_i];
            }
        }

        $this->__phpunit_getInvocationHandler()->invoke(
            new \PHPUnit\Framework\MockObject\Invocation(
                'Foo', 'bar', $__phpunit_arguments, '', $this, true, true
            )
        );

        $__phpunit_result = call_user_func_array([$this->__phpunit_originalObject, "bar"], $__phpunit_arguments);

        return $__phpunit_result;
    }

    public function baz(Foo $foo)
    {
        $__phpunit_arguments = [$foo];
        $__phpunit_count     = func_num_args();

        if ($__phpunit_count > 1) {
            $__phpunit_arguments_tmp = func_get_args();

            for ($__phpunit_i = 1; $__phpunit_i < $__phpunit_count; $__phpunit_i++) {
                $__phpunit_arguments[] = $__phpunit_arguments_tmp[$__phpunit_i];
            }
        }

        $this->__phpunit_getInvocationHandler()->invoke(
            new \PHPUnit\Framework\MockObject\Invocation(
                'Foo', 'baz', $__phpunit_arguments, '', $this, true, true
            )
        );

        $__phpunit_result = call_user_func_array([$this->__phpunit_originalObject, "baz"], $__phpunit_arguments);

        return $__phpunit_result;
    }
}
