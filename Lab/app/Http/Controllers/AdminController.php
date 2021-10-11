<?php 


namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\UserRight;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {


    public function admin() {
        if (Gate::allows('admin-panel')) {
            return view('admin/admin', [
                'users' => User::all(),
                'models' => ['patient'],
            ]);
        }
        else {
            $this->home();
        }
        
    }

    public function rights(Request $request)
    {
        if (!Gate::allows('admin-panel')) {
            return redirect('/');
        }

        $data = $request->validate([
            'user' => ['required'],
            'model' => ['required', 'max:32'],
            'update' => ['nullable'],
            'view' => ['nullable'],
        ]);

        DB::table('user_rights')
            ->where('user_id', '=', $data['user'])
            ->where('model', '=', $data['model'])
            ->delete();

        if (array_key_exists('update', $data)) {
            $new_permissions[] = [
                'model' => $data['model'],
                'user_id' => $data['user'],
                'right' => 'update'
            ];
        }

        if (array_key_exists('view', $data)) {
            $new_permissions[] = [
                'model' => $data['model'],
                'user_id' => $data['user'],
                'right' => 'view'
            ];
        }

        DB::table('user_rights')->insert($new_permissions);

        return redirect('admin');
    }
}