<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Process;

class SetupProjectCommand extends Command
{
    protected $signature = 'project:setup';

    protected $description = 'Set up the project after cloning from GitHub';

    public function handle()
    {
        $this->info('Starting project setup...');

        // Copy .env.example to .env
        $this->copyEnvFile();

        // Run necessary commands to set up the project
        $this->call('key:generate');
        $this->call('config:cache');
        $this->call('migrate');
        // $this->call('db:seed');
        $this->info('Project setup completed.');
        $this->info('Starting development server...');
        $this->call('serve');
    }
    protected function copyEnvFile()
    {
        if (!file_exists('.env')) {
            $this->executeCommand('cp .env.example .env');
            $this->info('.env file created successfully.');
        } else {
            $this->info('.env file already exists. Skipping creation.');
        }
    }
    protected function executeCommand($command)
    {
        $process = Process::fromShellCommandline($command);
        $process->run();

        if (!$process->isSuccessful()) {
            $this->error('An error occurred while executing the command:');
            $this->error($process->getErrorOutput());
            exit(1);
        }
    }
}
