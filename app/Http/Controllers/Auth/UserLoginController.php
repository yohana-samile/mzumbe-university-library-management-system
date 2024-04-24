<?php
    namespace App\Http\Controllers\Auth;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Support\Facades\Auth;
    use App\Models\User;
    use App\Models\Time_entry;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Hash;


    class UserLoginController extends Controller {
        public function studentLogin() {
            return view("studentLogin");
        }

        public function log_me_in(Request $request) {
            $credentials = $request->validate([
            //     'regstration_number' => 'required',
            //     'password' => 'required'
            // ]
            // ,
            // [
                'email.required' => 'Please enter a valid email address',
                'password.required' => 'Please enter your password',
            ]
            );

            // $regstration_number = $request->input('regstration_number');
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where([
                // 'regstration_number' => $regstration_number,
                'email' => $email,
            ])->first();

            if ($user && Hash::check($password, $user->password)) {
                $insert_to_know_current_users = Time_entry::create([
                    'user_id' => $user->id,
                    'time_in' => Carbon::now(),
                    'time_out' => null
                ]);
                if (Auth::login($user)) {
                    $request->session()->regenerate();
                    // After successful login, the user will be redirected to $this->redirectTo (HOME).
                    return response()->json("success");
                }
            }
            else {
                return response()->json("error");
            }
        }


        public function log_me_out(Request $request){
            $time_entry_data = $request->validate([
                'user_id' => 'required'
            ]);
            $time_entry_data = Time_entry::findOrFail($request->input('user_id'));
            $time_entry_data->update(['time_out' => Carbon::now()]);
            if ($time_entry_data) {
                $request->session()->flash('id', $request->input('user_id'));
                Auth::logout();
                return response()->json("success");
            }
            else{
                return response()->json("success");
            }
        }
    }
