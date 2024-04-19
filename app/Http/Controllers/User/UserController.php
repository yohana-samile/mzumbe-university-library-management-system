<?php
    namespace App\Http\Controllers\User;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\User;
    use App\Models\Student;
    use App\Models\Librarian;
    use App\Models\Programme;
    use App\Models\Year_of_study;
    use App\Models\Education_qualification;
    use App\Models\Position;
    use App\Models\Libary_depertment;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Validator;
    use DB;

    class UserController extends Controller {
        // register students
        public function student(){
            $students = DB::select("SELECT users.name as student_name, users.gender, users.physical_address, students.regstration_number, programmes.programme_abbreviation, year_of_studies.name as year_of_study_name FROM users, students, year_of_studies, programmes WHERE students.user_id = users.id AND students.year_of_study_id = year_of_studies.id AND students.programme_id = programmes.id");
            return view('users/student', compact('students'));
        }

        // register_student
        public function register_student(){
            $programmes = Programme::get();
            $year_of_studys = Year_of_study::get();
            return view('users/register_student', [
                'programmes' => $programmes,
                'year_of_studys' => $year_of_studys
            ]);
        }

        // register_unit
        public function register_student_action(Request $request){
            $validateStudent = $request->validate([
                'name' => 'required',
                'physical_address' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'programme_id' => 'required',
                'year_of_study_id' => 'required',
            ]);

            $generated_number = rand(1000, 10000);
            $nameParts = explode(' ', $validateStudent['name']);
            $username = strtolower($nameParts[0]);
            $domain = '';
            if (count($nameParts) > 1) {
                $domain = strtolower(implode('', array_slice($nameParts, 1)));
            }
            $email_generated = $username . '@' . $domain . '.com';

            $user = User::create([
                'name' => $validateStudent['name'],
                'email' => $email_generated,
                'physical_address' => $validateStudent['physical_address'],
                'phone_number' => $validateStudent['phone_number'],
                'gender' => $validateStudent['gender'],
                'role_id' => 3,
                'password' => Hash::make(12345678),
            ]);

            $register_student = new Student;
            $register_student->dob = $validateStudent['dob'];
            $register_student->regstration_number = 'mulms'.$generated_number;
            $register_student->year_of_study_id = $validateStudent['year_of_study_id'];
            $register_student->programme_id = $validateStudent['programme_id'];
            $user->student()->save($register_student);

            if ($user && $register_student) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }


        // librarian staff
        public function staff(){
            $librarians = DB::select("SELECT users.name as librarian_name, users.gender, users.email, users.id, positions.name as position_name, libary_depertments.name as libary_depertment_name, education_qualifications.name as education_qualification_name FROM
                librarians, users, positions, education_qualifications, libary_depertments WHERE
                librarians.user_id = users.id AND
                librarians.position_id = positions.id AND
                librarians.education_qualification_id = education_qualifications.id AND
                librarians.libary_depertment_id = libary_depertments.id"
            );
            return view('users/staff', compact('librarians'));
        }

        // register_staff
        public function register_staff(){
            $education_qualifications = Education_qualification::get();
            $libary_depertments = Position::get();
            $positions = Libary_depertment::get();
            return view('users/register_staff', [
                'education_qualifications' => $education_qualifications,
                'libary_depertments' => $libary_depertments,
                'positions' => $positions
            ]);
        }

        // register_unit
        public function register_librarian_action(Request $request){
            $validateLibrarian = $request->validate([
                'name' => 'required',
                'physical_address' => 'required',
                'phone_number' => 'required',
                'gender' => 'required',
                'education_qualification_id' => 'required',
                'libary_depertment_id' => 'required',
                'position_id' => 'required',
            ]);

            $nameParts = explode(' ', $validateLibrarian['name']);
            $username = strtolower($nameParts[0]);
            $domain = '';
            if (count($nameParts) > 1) {
                $domain = strtolower(implode('', array_slice($nameParts, 1)));
            }
            $email_generated = $username . '@' . $domain . '.com';

            $user = User::create([
                'name' => $validateLibrarian['name'],
                'email' => $email_generated,
                'physical_address' => $validateLibrarian['physical_address'],
                'phone_number' => $validateLibrarian['phone_number'],
                'gender' => $validateLibrarian['gender'],
                'role_id' => 2,
                'password' => Hash::make(12345678),
            ]);

            $register_staff = new Librarian;
            $register_staff->education_qualification_id = $validateLibrarian['education_qualification_id'];
            $register_staff->libary_depertment_id = $validateLibrarian['libary_depertment_id'];
            $register_staff->position_id = $validateLibrarian['position_id'];
            $user->librarian()->save($register_staff);

            if ($user && $register_staff) {
                return response()->json("success");
            }
            else{
                return response()->json("error");
            }
        }
    }
