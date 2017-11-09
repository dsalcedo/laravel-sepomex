<?php

namespace Aftab\Sepomex\Tests;

use Illuminate\Support\Facades\Artisan;

/**
 * Class ImporterCommandTest
 * @package Aftab\Sepomex\Tests
 */
class ImporterCommandTest extends TestCase
{
    /** @test */
    public function it_should_run_the_command()
    {
        $this->artisan('sepomex:import', [
            '--chunk' => '50'
        ]);

        $output = Artisan::output();

        $this->assertContains('Truncating table...', $output);
        $this->assertContains('Table truncated.', $output);
        $this->assertContains('Parsing [404] rows from file...', $output);
        $this->assertContains('Inserted [403] rows from [404] file lines in sepomex table', $output);
    }
}
