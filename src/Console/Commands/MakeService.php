<?php

namespace FelipeDamacenoTeodoro\MakeServiceRepository\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;


class MakeService extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'make:service';

    private $complementaryInterfaceName = 'ServiceInterface';
    private $complementaryRepositoryInterfaceName = 'RepositoryInterface';
    private $complementaryServiceName = 'Service';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new contract interface';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Service';

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

        $stub = str_replace('DummyRepositoryInterface', $this->argument('name').$this->complementaryRepositoryInterfaceName, $stub);
        $stub = str_replace('DummyServiceInterface', $this->argument('name').$this->complementaryInterfaceName, $stub);
        $stub = str_replace('DummyContract', $this->argument('name').$this->complementaryInterfaceName, $stub);

        return str_replace('DummyService', $this->argument('name').$this->complementaryServiceName, $stub);
    }

     /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        $complementName = ($this->option('interface')) ? $name.$this->complementaryInterfaceName : $name.$this->complementaryServiceName;
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
		    return  __DIR__ . '/../stubs/make-service-interface.stub';
        }

        $this->type = $this->complementaryServiceName;
        return  __DIR__ . '/../stubs/make-service.stub';
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
            return $rootNamespace . '\Contracts\Services';
        }

		return $rootNamespace . '\Services';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the contract.'],
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
