namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit()
    {
        return view('account.settings');
    }

    public function updateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:members,email,' . auth()->id()]);
        $user = auth()->user();
        $user->email = $request->email;
        $user->save();

        return back()->with('success', 'تم تحديث البريد الإلكتروني بنجاح.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'تم تحديث كلمة المرور بنجاح.');
    }
}
