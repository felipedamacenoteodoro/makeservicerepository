<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class MakeRepository extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'make:repository {--interface}';

    private $complementaryInterfaceName = 'RepositoryInterface';
    private $complementaryRepositoryName = 'Repository';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new repository';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Repository';

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

        if($this->option('interface'))
        {
            return $this->replaceClassInterface($stub);
        }

        return $this->replaceClasses($stub);
    }

    private function replaceClassInterface($stub)
    {
        return str_replace('DummyRepositoryContract', $this->argument('name').$this->complementaryInterfaceName, $stub);
    }

    private function replaceClasses ($stub){

        $stub = str_replace('DummyRepositoryInterface', $this->argument('name').$this->complementaryInterfaceName, $stub);
        $stub = str_replace('DummyModel', $this->argument('name'), $stub);

        return str_replace('DummyRepository', $this->argument('name').$this->complementaryRepositoryName, $stub);
    }

     /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $complementName = ($this->option('interface')) ? $name.$this->complementaryInterfaceName : $name.$this->complementaryRepositoryName;
        $name = Str::replaceFirst($this->rootNamespace(), '', $complementName);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
        if($this->option('interface'))
        {
            $this->type = $this->complementaryInterfaceName;
            return  __DIR__ . '/../stubs/make-repository-interface.stub';
        }

        $this->type = $this->complementaryRepositoryName;
        return  __DIR__ . '/../stubs/make-repository.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
        if($this->option('interface'))
        {
		    return $rootNamespace . '\Contracts\Repositories';
        }

        return $rootNamespace . '\Repositories';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the repository.'],
        ];
    }

    protected function getOptions()
    {
        return [
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if it already exists'],
            ['interface', null, InputOption::VALUE_NONE, 'Create the interface class for repository']
        ];
    }
}
