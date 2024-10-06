<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {className : The name of the service class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class and its corresponding interface';

    /**
     * Directory path for services.
     *
     * @const string
     */
    private const SERVICES_PATH = 'app/Services/';

    /**
     * The class name of the service to create.
     *
     * @var string
     */
    private string $className;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->className = Str::studly($this->argument('className'));

        if ($this->className === '') {
            $this->error('The service class name is invalid. Please provide a valid class name.');
            return;
        }

        $this->createFiles();
        $this->info("Service {$this->className} created successfully.");
    }

    /**
     * Create service and interface files.
     */
    private function createFiles(): void
    {
        $directoryName = $this->getServiceDirectoryName();

        // Create the directory if it doesn't exist
        if (!File::exists($directoryName)) {
            File::makeDirectory($directoryName, 0755, true);
        }

        $this->createFile($this->getServiceFileName(), $this->getServiceFileContent());
        $this->createFile($this->getServiceInterfaceFileName(), $this->getServiceInterfaceFileContent());
    }

    /**
     * Create a file if it does not already exist.
     *
     * @param string $fileName
     * @param string $fileContent
     */
    private function createFile(string $fileName, string $fileContent): void
    {
        if (File::exists($fileName)) {
            $this->warn("File {$fileName} already exists.");
        } else {
            File::put($fileName, $fileContent);
            $this->info("Created: {$fileName}");
        }
    }

    /**
     * Get the service directory path.
     *
     * @return string
     */
    private function getServiceDirectoryName(): string
    {
        return base_path(self::SERVICES_PATH . $this->className);
    }

    /**
     * Get the service file name.
     *
     * @return string
     */
    private function getServiceFileName(): string
    {
        return $this->getServiceDirectoryName() . '/' . $this->className . '.php';
    }

    /**
     * Get the service interface file name.
     *
     * @return string
     */
    private function getServiceInterfaceFileName(): string
    {
        return $this->getServiceDirectoryName() . '/' . $this->className . 'Interface.php';
    }

    /**
     * Get the content of the service class.
     *
     * @return string
     */
    private function getServiceFileContent(): string
    {
        return "<?php\n\nnamespace App\\Services\\{$this->className};\n\nclass {$this->className} implements {$this->className}Interface\n{\n    // Implement your service methods here\n}\n";
    }

    /**
     * Get the content of the service interface.
     *
     * @return string
     */
    private function getServiceInterfaceFileContent(): string
    {
        return "<?php\n\nnamespace App\\Services\\{$this->className};\n\ninterface {$this->className}Interface\n{\n    // Define your service interface methods here\n}\n";
    }
}
