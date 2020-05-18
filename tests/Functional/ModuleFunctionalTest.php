<?php
namespace AvoRed\Framework\Tests\Functional;

use AvoRed\Framework\Tests\BaseTestCase;
use AvoRed\Framework\Modules\ModuleManager;
use Illuminate\Filesystem\Filesystem;

class ModuleFunctionalTest extends BaseTestCase
{
    /** @test **/
    public function test_module_manager_all()
    {
        $this->markTestIncomplete('todo');
        $files = app()->get('files');
        $manager = new ModuleManager($files);
        $manager->setBasePath($this->testModulePath);
        
        $modules = $manager->all();

        //dd($modules);
        $this->assertEquals(1, count($modules));
    }
}
