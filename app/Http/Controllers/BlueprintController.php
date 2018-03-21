<?php

namespace App\Http\Controllers;

use App\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Storage;

class BlueprintController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    public function showForm() {
        $blueprints = Blueprint::orderBy('created_at', "asc")->get();

        return view('adminmenu', [
            'blueprints'=>$blueprints
        ]);
    }

    public function addBlueprint(Request $request) {
        $this->validate($request, [
            'file_upload' => 'required|max:1000000',
            'address' => 'required|max:255'
        ]);

        $image = $request->file('file_upload');

        $imageFileName = time() . '.' . $image->getClientOriginalExtension();
        
        $s3 = Storage::disk('s3');
        $filePath = 'blueprints/' . $imageFileName;
        $s3->put($filePath, file_get_contents($image), 'public');
        $url = Storage::disk('s3')->url($filePath);
        

        $blueprint = new Blueprint;
        $blueprint->address = formatAddress($request->address);
        $blueprint->file_ref = $url;
        $blueprint->save();

        return redirect('/admin');
    }

    public function deleteBlueprint($id) {
        Blueprint::findOrFail($id)->delete();

        return redirect('/admin');
    }

    public function viewBlueprint($id) {
        $blueprint = Blueprint::findOrFail($id);

        return view('blueprintdetailview', [
            'file_ref' => $blueprint->file_ref,
            'address' => $blueprint->address,
            'id' => $blueprint->id,
            'created'=>$blueprint->created_at,
            'updated'=>$blueprint->updated_at
        ]);
    }
}
