<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class MakeService extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
    protected $signature = 'make:service {name} {--interface}';


	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new service pattern';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'service';

    public function handle()
    {
        $name = (string) $this->argument('name');
        $nameTitle = ucfirst(Str::camel($name));

        if (!$this->option('interface')) {
             // Create a service interface and repository
            if ($this->confirm('Create Service Interface ? ', true)){
                $this->call('make:servicePattern', ['name' => $nameTitle, '--interface'=> true]);
            }

            $this->call('make:servicePattern', ['name' => $nameTitle]);

            return;
        }

        $this->call('make:servicePattern', ['name' => $nameTitle, '--interface'=> true]);

    }
}
