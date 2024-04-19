<?php
    namespace App\Http\Controllers\Unit;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use App\Models\Unit;
    use App\Models\Programme;

    class StudentUnitController extends Controller {
        public function studentUnit(){
            $units = Unit::get();
            return view('units/studentUnit', compact('units'));
        }

        // addUnit
        public function addUnit(){
            return view('units/addUnit');
        }

        // register_unit
        public function register_unit(Request $request){
            $validateUnitData = $request->validate([
                'name' => 'required',
                'unit_abbreviation' => 'required',
            ]);
            $create_unit = Unit::create($validateUnitData);
            if ($create_unit) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }

        // programme
        public function programme(){
            $programmes = Programme::get();
            return view('units/programme', compact('programmes'));
        }

        // addProgramme
        public function addProgramme(){
            $units = Unit::get();
            return view('units/addProgramme', compact('units'));
        }

        // register_unit
        public function register_Programme(Request $request){
            $validateProgrammeData = $request->validate([
                'name' => 'required',
                'programme_abbreviation' => 'required',
                'unit_id' => 'required',
            ]);
            $create_programme = Programme::create($validateProgrammeData);
            if ($create_programme) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }
    }

