namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function edit()
    {
        return view('account.photo');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048'
        ]);

        $user = auth()->user();

        // حذف الصورة القديمة
        if ($user->photo) {
            Storage::delete($user->photo);
        }

        // حفظ الصورة الجديدة
        $path = $request->file('photo')->store('photos', 'public');
        $user->photo = $path;
        $user->save();

        return back()->with('success', 'تم رفع الصورة بنجاح.');
    }

    public function delete()
    {
        $user = auth()->user();

        if ($user->photo) {
            Storage::delete($user->photo);
            $user->photo = null;
            $user->save();
        }

        return back()->with('success', 'تم حذف الصورة بنجاح.');
    }
}
