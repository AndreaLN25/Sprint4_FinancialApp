<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:make-view-command {view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(){
        $view = $this->argument('view');
        $path = $this->viewPath($view);

        $this->createDir($path);
        if(File::exists($path)){
            $this->error("The [{$path}] view already exists!");
        }
        File::put($path, $path);
        $this->info("File {$path} created");
    }
    

        /**
        * Get the view full path.
        *
        * @param string $view
        *
        * @return string
        */
    public function viewPath($view){
        $view = str_replace('.', '/', $view) . '.blade.php';
        $path = "resources/views/{$view}";
        return $path;  
    }



    /**
    * Create a view directory if it does not exist.
    *
    * @param $path
    */
    public function createDir($path)
    {
      $dir = dirname($path);
      if (!file_exists($dir))
      {
          mkdir($dir, 0777, true);
      }
    }
    
    
}
