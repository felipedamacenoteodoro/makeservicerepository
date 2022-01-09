<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class MakeRepository extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
    protected $signature = 'make:repository {name} {--interface}';


	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new repository pattern';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'repository';

    public function handle()
    {
        $name = (string) $this->argument('name');
        $nameTitle = ucfirst(Str::camel($name));

        if (!$this->option('interface')) {
            if ($this->confirm('Create Repository Interface ? ', true)){
                $this->call('make:repositoryPattern', ['name' => $nameTitle, '--interface'=> true]);
            }

            $this->call('make:repositoryPattern', ['name' => $nameTitle]);

            return;
        }

        $this->call('make:repositoryPattern', ['name' => $nameTitle, '--interface'=> true]);

    }
}
