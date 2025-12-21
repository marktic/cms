<?php

namespace Marktic\Cms\Tests;

use Bytic\Phpqa\PHPUnit\TestCase as ByticTestCase;
use Marktic\Cms\CmsServiceProvider;
use Nip\Config\Config;
use Nip\Container\Container;

/**
 * Class AbstractTest
 */
abstract class TestCase extends ByticTestCase
{

    protected function loadConfig($data = [])
    {
        $config = config();
        $configNew = new Config([CmsServiceProvider::NAME => $data], true);
        Container::getInstance()->set('config', $config->merge($configNew));
    }

    protected function loadConfigFromFixture($name)
    {
        $config = require TEST_FIXTURE_PATH . '/config/' . $name . '.php';
        $this->loadConfig($config);
    }

    protected function loadServiceProvider(): CmsServiceProvider
    {
        $container = Container::container();
        $provider = new CmsServiceProvider();
        $provider->setContainer($container);
        $provider->register();
        return $provider;
    }

    protected function loadFakeTranslator()
    {
        $translator = Mockery::mock('translator');
        $translator->shouldReceive('trans')->andReturnArg(0);

        $container = Container::container();
        $container->set('translator', $translator);
    }
}
