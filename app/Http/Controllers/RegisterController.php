namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password'       => ['required', 'confirmed', 'min:8'],
            'gender'         => ['required', 'in:ذكر,أنثى'],
            'age'            => ['required', 'integer', 'min:18'],
            'country'        => ['required', 'string'],
            'marriage_type'  => ['nullable', 'string'],
        ]);

        $member = Member::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'gender'        => $request->gender,
            'age'           => $request->age,
            'country'       => $request->country,
            'marriage_type' => $request->marriage_type,
        ]);

        event(new Registered($member));
        Auth::login($member);

        return redirect()->route('home');
    }
}
