<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class FirebaseController extends Controller{
    //
    public function index(){
        // $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->withDatabaseUri('https://getmecar-43589.firebaseio.com/')
        //     ->create();
        // $database = $firebase->getDatabase();
        // $newPost = $database
        //     ->getReference('Users')
        //     ->push([
        //             'title' => 'Post title',
        //             'body' => 'This should probably be longer.'
        //         ]);
                
        // $key = $ref->push()->getkey();
        // return $key;


        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        
        // echo"<pre>";
        // print_r($newPost->getvalue());

        $factory = (new Factory)->withServiceAccount(__DIR__.'/FirebaseKey.json');

        $database = $factory->createDatabase();
        $ref = $database->getReference('Customers');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'name'=>'Yuni',
            'email'=>'yuni@gmail.com'
        ]);
        return $key;
        // $newPost = $database
        //     ->getReference('Customers')
        //     ->push([
        //             'title' => 'Post YUNI',
        //             'body' => 'This should probably be longer.'
        //         ]);
        // $newPost->getValue(); 
        // echo"<pre>";
        // print_r($newPost->getvalue());
    }
}














////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Kreait\Firebase\Factory;
// use Kreait\Firebase\ServiceAccount;

// class FirebaseController extends Controller
// {
//     public function index(){
        
        // $serviceAccount = ServiceAccount::fromJsonFile( filepath: __DIR__.'/FirebaseKey.json');
        // $firebase = (new Factory)
        //     ->withServiceAccount($serviceAccount)
        //     ->create();

        // $factory = (new Factory)->withServiceAccount('/path/to/FirebaseKey.json');
        // $factory = (new Factory())
        //     ->withDatabaseUri('https://my-project.firebaseio.com');

        // $database = $firebase->getDatabase();

        // $ref = $database ->getReference( path: 'Customers');

        // $key = $ref->push()->getkey();

        // return $key;
//     }
// }


?>

