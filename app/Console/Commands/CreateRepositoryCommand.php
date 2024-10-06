<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CreateRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {className : The name of the repository class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class and its corresponding interface';

    /**
     * Directory path for repositories.
     *
     * @const string
     */
    private const REPOSITORIES_PATH = 'app/Repositories/';

    /**
     * The class name of the repository to create.
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
            $this->error('The repository class name is invalid. Please provide a valid class name.');
            return;
        }

        $this->createFiles();
        $this->info("Repository {$this->className} created successfully.");
    }

    /**
     * Create repository and interface files.
     */
    private function createFiles(): void
    {
        $directoryName = $this->getRepositoryDirectoryName();

        // Create the directory if it doesn't exist
        if (!File::exists($directoryName)) {
            File::makeDirectory($directoryName, 0755, true);
        }

        $this->createFile($this->getRepositoryFileName(), $this->getRepositoryFileContent());
        $this->createFile($this->getRepositoryInterfaceFileName(), $this->getRepositoryInterfaceFileContent());
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
     * Get the repository directory path.
     *
     * @return string
     */
    private function getRepositoryDirectoryName(): string
    {
        return base_path(self::REPOSITORIES_PATH . $this->className);
    }

    /**
     * Get the repository file name.
     *
     * @return string
     */
    private function getRepositoryFileName(): string
    {
        return $this->getRepositoryDirectoryName() . '/' . $this->className . '.php';
    }

    /**
     * Get the repository interface file name.
     *
     * @return string
     */
    private function getRepositoryInterfaceFileName(): string
    {
        return $this->getRepositoryDirectoryName() . '/' . $this->className . 'Interface.php';
    }

    /**
     * Get the content of the repository class.
     *
     * @return string
     */
    private function getRepositoryFileContent(): string
    {
        return "<?php\n\nnamespace App\\Repositories\\{$this->className};\n\nclass {$this->className} implements {$this->className}Interface\n{\n    // Implement your repository methods here\n}\n";
    }

    /**
     * Get the content of the repository interface.
     *
     * @return string
     */
    private function getRepositoryInterfaceFileContent(): string
    {
        return "<?php\n\nnamespace App\\Repositories\\{$this->className};\n\ninterface {$this->className}Interface\n{\n    // Define your repository interface methods here\n}\n";
    }
}
