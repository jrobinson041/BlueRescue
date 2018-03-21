<?php

namespace App\Http\Controllers;

use App\DispatchFeed;
use App\Note;
use App\Blueprint;
use Illuminate\Http\Request;

class DispatchFeedController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showAll() {
        $tasks = DispatchFeed::orderBy('created_at', "asc")->get();

        return view('dispatchfeed', [
            'tasks' => $tasks,
        ]);
    }

    //Add a new job
    public function addTask(Request $request) {
        $this->validate($request, [
            'address' => 'required|max:255',
            'description' => 'required|max:255'
        ]);

        $task = new DispatchFeed;
        $task->address = formatAddress($request->address);
        $task->description = $request->description;
        $task->save();

        return redirect('/dispatch');
    }

    //Delete a task by ID
    public function deleteTask($id) {
        DispatchFeed::findOrFail($id)->delete();

        return redirect('/dispatch');
    }

    public function viewTask($id) {
        $task = DispatchFeed::findOrFail($id);
        $address = $task->address;

        $blueprints = Blueprint::where('address', $address)->orderBy('created_at', "asc")->get();
        $notes = Note::where('address', $address)->orderBy('created_at', "asc")->get();
        
        $latlng = getLatLong($address);

        return view('dispatchdetailview', [
            'description' => $task->description,
            'address' => $address,
            'id' => $task->id,
            'timestamp'=>$task->created_at,
            'lat'=>$latlng['lat'],
            'lng'=>$latlng['lng'],
            'notes'=>$notes,
            'blueprints'=>$blueprints
        ]);
    }

}
