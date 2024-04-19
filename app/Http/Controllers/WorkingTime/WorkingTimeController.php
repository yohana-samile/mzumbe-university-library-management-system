<?php

    namespace App\Http\Controllers\WorkingTime;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Opening_hour;
    use DB;
    use Illuminate\Support\Facades\Validator;

    class WorkingTimeController extends Controller  {
        public function index(){
            $working_hours = Opening_hour::get();
            return view('workingTime/index', compact('working_hours'));
        }

        // add_workingTime
        public function add_workingTime(){
            return view('workingTime/add_workingTime');
        }

        public function add_workingTime_action(Request $request){
            $validateDataEvent = $request->validate([
                'day' => 'required',
            ]);
            $open = $request->input('open');
            $close = $request->input('close');
            $holiday = $request->input('holiday');
            if ($open !== null) {
                $insert_working_hour = Opening_hour::create([
                    'day' => $validateDataEvent['day'],
                    'holiday' => false,
                    'open' => $open,
                    'close' => $close,
                ]);
            }
            else{
                $data = [
                    'day' => $validateDataEvent['day'],
                    'open' => null,
                    'close' => null,
                    'holiday' => $holiday
                ];
                $insert_working_hour = Opening_hour::create($data);
                if ($insert_working_hour) {
                    return response()->json("success");
                }
                else{
                    return response()->json("error");
                }
            }
        }
    }
