use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/allUsers', [AuthController::class, 'allUsers']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
