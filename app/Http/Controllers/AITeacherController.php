namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AITeacherController extends Controller
{
    public function index()
    {
        return view('ai-teacher.index');
    }
}
