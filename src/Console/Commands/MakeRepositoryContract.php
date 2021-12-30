<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class MakeRepositoryContract extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'make:repositoryi';

    private $complementaryInterfaceName = 'RepositoryInterface';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new repository contract interface';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Contract';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace('DummyRepositoryContract', $this->argument('name').$this->complementaryInterfaceName, $stub);
    }

     /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name.$this->complementaryInterfaceName);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return  __DIR__ . '/../stubs/make-repository-interface.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\Contracts\Repositories';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository contract.'],
        ];
    }
}
