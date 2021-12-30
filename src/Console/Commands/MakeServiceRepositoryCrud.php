<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class MakeServiceRepositoryCrud extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
    protected $signature = 'make:crudsrv {name}';


	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new Crud With Service And Repository';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Crud';

    public function handle()
    {
        $name = (string) $this->argument('name');
        $nameTitle = ucfirst(Str::camel($name));

        $this->call('make:repositoryi', ['name' => $nameTitle]);
        $this->call('make:repository', ['name' => $nameTitle]);

        // Create a service interface and repository
        $this->call('make:servicei', ['name' => $nameTitle]);
        $this->call('make:service', ['name' => $nameTitle]);
    }
}
