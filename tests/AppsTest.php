<?php

namespace Paylike\Tests;

use Paylike\Endpoint\Apps;

class AppsTest extends BaseTest
{
    /**
     * @var Apps
     */
    protected $apps;

    public function setUp(): void
    {
        parent::setUp();
        $this->apps = $this->paylike->apps();
    }

    public function testCreate()
    {
        $app_identity = $this->apps->create([
            'name' => 'Test App Name',
        ]);

        $this->assertNotEmpty($app_identity, 'app identity');
    }

    public function testFetch()
    {
        $app = $this->apps->fetch();

        $this->assertEquals($app['id'], $this->app_id, 'app id');
    }
}
