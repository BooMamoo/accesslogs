use Illuminate\Database\Seeder;
use App\Cards as Cards;
  
class CardsTableSeeder extends Seeder {
    public function run() {
        
        Cards::truncate();
        
        Cards::create( [
            'id' => '1' ,
            'name' => 'Alice' ,
        ] );
       
        Cards::create( [
            'id' => '2' ,
            'name' => 'Bob' ,
        ] );

	Cards::create( [
            'id' => '3' ,
            'name' => 'New' ,
        ] );
    }
}
