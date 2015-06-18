use Illuminate\Database\Seeder;
use App\Logs as Logs;
  
class LogsTableSeeder extends Seeder {
    public function run() {
        
        Logs::truncate();
        
        Logs::create( [
            'id' => '1' ,
            'access' => '2015-05-26 10:11:59' ,
        ] );
       
        Logs::create( [
            'id' => '2' ,
            'access' => '2015-05-26 12:15:39' ,
        ] );

	Logs::create( [
            'id' => '1' ,
            'access' => '2015-05-27 11:00:40' ,
        ] );

	Logs::create( [
            'id' => '3' ,
            'access' => '2015-05-27 15:11:12' ,
        ] );

	Logs::create( [
            'id' => '2' ,
            'access' => '2015-05-28 10:19:42' ,
        ] );

	Logs::create( [
            'id' => '1' ,
            'access' => '2015-05-28 11:14:27' ,
        ] );
    }
}
