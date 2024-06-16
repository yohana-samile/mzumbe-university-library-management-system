<?php
    namespace App\Http\Controllers\Event;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Event_and_announcement;
    use DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Storage;


    class Event_And_AnnouncementController extends Controller {
        public function index(){
            $events = Event_and_announcement::get();
            return view('events/index', compact('events'));
        }

        // add_event
        public function add_event(){
            return view('events/add_event');
        }

        public function add_event_action(Request $request){
            $validateDataEvent = $request->validate([
                'name' => 'required',
                'event_image' => 'required'
            ]);


            if ($request->hasFile('event_image')) {
                $file = $request->file('event_image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path('event_images');
    
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
    
                $file->move($destinationPath, $fileName);
    
                $event = new Event_and_announcement();
                $event->event_image = $fileName;
                $event->name = $request->input('name');
                $event->save();
    
                if ($event) {
                    return response()->json("success");
                } else {
                    return response()->json("error");
                }
            }
            else {
                return response()->json("No file uploaded");
            }

            // $image_path = $request->file('event_image')->store('public/event_images');

            // $insert_event = Event_and_announcement::create([
            //     'name' => $validateDataEvent['name'],
            //     'event_image' => $image_path
            // ]);
            // if ($insert_event) {
            //     return response()->json("success");
            // }
            // else{
            //     return response()->json("error");
            // }
        }

        // delete Events
        public function delete_event(Request $request){
            $validateDataEvent = $request->validate([
                'id' => 'required'
            ]);
            $id = $request->input('id');
            $event = Event_and_announcement::find($id);
            if ($event) {
                $imagePath = $event->event_image;
                if ($imagePath && Storage::exists($imagePath)) {
                    Storage::delete($imagePath);
                }
                $delete = $event->delete();
                if ($delete) {
                    return response()->json("success");
                } else {
                    return response()->json("error");
                }
            }
            else {
                return response()->json("error"); // Event not found
            }
            // Storage::delete('file.jpg');

            // $delete = DB::delete("DELETE FROM event_and_announcements WHERE `event_and_announcements`.`id` = '$id' ");
            // if ($delete) {
            //     return response()->json("success");
            // }
            // else{
            //     return response()->json("error");
            // }
        }
    }


