<?php
    namespace App\Http\Controllers\Service;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Service;
    use Illuminate\Support\Facades\Validator;
    use DB;

    class ServiceController extends Controller {
        public function index(){
            $services = Service::get();
            return view('services/index', compact('services'));
        }

        // add Service
        public function add_service(){
            return view('services/add_service');
        }

        public function add_service_action(Request $request){
            $validateDataService = $request->validate([
                'name' => 'required'
            ]);
            $insert_services = Service::create($validateDataService);
            if ($insert_services) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }

        // delete Service
        public function delete_service(Request $request){
            $validateDataService = $request->validate([
                'id' => 'required'
            ]);
            $id = $request->input('id');
            $delete = DB::delete("DELETE FROM services WHERE `services`.`id` = '$id' ");
            if ($delete) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }
    }
