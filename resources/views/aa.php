
RUTAS---------------------
use App\Http\Controllers\VervosController;
Route::post('formExamen', [VervosController::class, 'formExamen'])->name('formExamen');
Route::get('formExamen', [VervosController::class, 'formExamen'])->name('formExamen');


CONSULTAS-------------------------------------

  use Illuminate\Support\Facades\DB;
   
 $users = User::all();
 $data = DB::table('vervos')
                ->join('detalle_vervos', 'vervos.id', '=', 'detalle_vervos.vervo_id')
                ->where('detalle_vervos.user_id','=',$id)
                ->where('detalle_vervos.habilitar','=','1')
                ->get();
                
contraseya123&&&123
DELETE----------------
 use App\Models\Flight;
            $flight = Flight::find($txt);
            $flight->delete();
UPDATE----------------
           use App\Models\Series;
           Series::where('id', $request->serie_id)
                   ->update(['habilitar' => true]);

INSERTAR---------------
use App\Models\Series;
   numero = Series::create([
                'numero'=>8,
                'numero_serie' => i,
                'user_id' => 1  ]);

service mysql stop
sudo /etc/init.d/apache2 stop
sudo /opt/lampp/lampp start
sudo /opt/lampp/lampp stop

MODELOS
public $timestamps = false;
protected $fillable = ['id','valor','user_id','order_id','articulo'];
