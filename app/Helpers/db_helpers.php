<?php

use Illuminate\Support\Facades\DB;

// setup database structure. option to seed
function db_migrate( $andSeed = false, $seedList = [] ){

    // get each migration file
    foreach(glob(database_path().'/migrations/*.php') as $filename){

        // require the file in order to make class available
        require_once($filename);

        // get class name from file
        preg_match("/(?<=_)([a-z_]+?)(?=.php)/",$filename,$matches);
        if($matches && count($matches)>1){
            $table = $matches[0];
            $tableClass = camel_case($table);
            if(class_exists($tableClass)) {

                // run migration script and output message
                (new $tableClass)->up();
                echo "Migrated: ". basename($filename). PHP_EOL . "<br />";
            }
        }
    }

    // option to seed database
    if($andSeed){
        db_seed( $seedList );
    }
}

// seed database after it has been structured
function db_seed( array $seederClasses = [] ){

    // default, load seeder classes from folder and seed database
    if( !$seederClasses ) {
        if (class_exists('DatabaseSeeder')) {
            (new DatabaseSeeder)->run();
            echo "Seeding complete" . PHP_EOL . "<br />";
        }
    }

    // optionally load seeder classes via $seederClasses array
    else {
        foreach($seederClasses as $seederClass){
            if(class_exists($seederClass)){

                // run seeding script and output message
                (new $seederClass)->run();
                echo "Seeding: ". basename($seederClass). PHP_EOL . "<br />";
            }
        }
    }
}

// delete databases
function db_rollback(){
    foreach(array_reverse(glob(database_path().'/migrations/*.php')) as $filename){
        // require the file in order to make class available
        require_once($filename);

        // get class name from file
        preg_match("/(?<=_)([a-z_]+?)(?=.php)/",$filename,$matches);
        if($matches && count($matches)>1){
            $table = $matches[0];
            $tableClass = camel_case($table);
            if(class_exists($tableClass)) {

                // run rollback script and output message
                (new $tableClass)->down();
                echo "Rolled back: ". basename($filename). PHP_EOL . "<br />";
            }
        }
    }
}

// delete databases and re-setup database structure. option to seed
function db_refresh( $andSeed = false, $seedList = [] ){
    db_rollback();
    db_migrate( $andSeed, $seedList );
}

// custom autoload function for seeder classes | script can't find them otherwise
function db_seeder_autoload( $class ){
    $classPath = database_path().'/seeds/'.$class.'.php';
    if (is_file($classPath)) {
        require_once $classPath;
        return;
    }
}
// register autoload function
spl_autoload_register('db_seeder_autoload');

?>