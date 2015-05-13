<?php namespace Thomaswelton\LaravelMcryptFaker;

use Crypto;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class KeyGenerateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'key:generate-openssl';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Set the application key for Open SSL encryption";

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$key = $this->getRandomKey();

		if ($this->option('show'))
		{
			return $this->line('<comment>'.$key.'</comment>');
		}

		$path = base_path('.env');

		if (file_exists($path))
		{
			file_put_contents($path, str_replace(
				$this->laravel['config']['app.key'], $key, file_get_contents($path)
			));
		}

		$this->laravel['config']['app.key'] = $key;

		$this->info("Application key [$key] set successfully.");
	}

	/**
	 * Generate a random key for the application.
	 *
	 * @return string
	 */
	protected function getRandomKey()
	{
		return bin2hex(Crypto::CreateNewRandomKey());
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('show', null, InputOption::VALUE_NONE, 'Simply display the key instead of modifying files.'),
		);
	}

}
