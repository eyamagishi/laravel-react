<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "make:service {className}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * @const string service directory path
     */
    public const SERVICES_PATH = 'app/Services/';

    /**
     * @var string
     */
    private $className;

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->className = $this->argument('className');

        if (empty($this->className)) {
            $this->error('Service Class Name is invalid');
            return;
        }

        $this->className = Str::studly($this->className);
        $this->createFiles();
        $this->info('Service created successfully');
    }

    /**
     * Create service and interface files.
     */
    private function createFiles(): void
    {
        $directoryName = $this->getServiceDirectoryName();
        // ディレクトリが存在しない場合は作成
        if (!is_dir($directoryName)) {
            mkdir($directoryName, 0755, true);
        }
        $this->checkAndCreateFile($this->getServiceFileName(), $this->getServiceFileContent());
        $this->checkAndCreateFile($this->getServiceInterfaceFileName(), $this->getServiceInterfaceFileContent());
    }

    /**
     * Check if the file exists and create it if not.
     *
     * @param string $fileName
     * @param string $fileContent
     */
    private function checkAndCreateFile(string $fileName, string $fileContent): void
    {
        if (file_exists($fileName)) {
            $this->error("{$fileName} already exists");
            return;
        }

        file_put_contents($fileName, $fileContent);
    }

    /**
     * Get the service file name.
     *
     * @return string
     */
    private function getServiceDirectoryName(): string
    {
        return self::SERVICES_PATH . $this->className . '/';
    }

    /**
     * Get the service file name.
     *
     * @return string
     */
    private function getServiceFileName(): string
    {
        return self::SERVICES_PATH . $this->className . '/' . $this->className . '.php';
    }

    /**
     * Get the service interface file name.
     *
     * @return string
     */
    private function getServiceInterfaceFileName(): string
    {
        return self::SERVICES_PATH . $this->className . '/' . $this->className . 'Interface.php';
    }

    /**
     * Get the service file content.
     *
     * @return string
     */
    private function getServiceFileContent(): string
    {
        return "<?php\n\nnamespace App\\Services\\{$this->className};\n\nclass {$this->className} implements {$this->className}Interface\n{\n\t//\n}\n";
    }

    /**
     * Get the service interface file content.
     *
     * @return string
     */
    private function getServiceInterfaceFileContent(): string
    {
        return "<?php\n\nnamespace App\\Services\\{$this->className};\n\ninterface {$this->className}Interface\n{\n\t//\n}\n";
    }
}
