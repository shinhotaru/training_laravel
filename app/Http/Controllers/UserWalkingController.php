<?php
// The namespace declaration is necessary for the controller to function correctly within the Laravel framework.
// It allows Laravel to locate the controller class when routing requests.
// The namespace declaration should remain as `namespace App\Http\Controllers;` at the top of the file.
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserWalking;

class UserWalkingController extends Controller
{
    public function index(Request $request)
    {
        $query = UserWalking::query();

        if ($request->has('user_id') && $request->user_id !== null) {
            $query->where('user_id', $request->user_id);
        }

        $walkings = $query->orderBy('walking_on', 'desc')->paginate(20);

        return view('user_walkings.index', compact('walkings'));
    }

    public function create()
    {
        return view('user_walkings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'walking_on' => 'required|date',
            'step_cnt' => 'required|integer',
        ]);

        UserWalking::create($request->only(['user_id', 'walking_on', 'step_cnt']));

        return redirect()->route('user-walkings.index')->with('success', 'Record created successfully.');
    }

    public function edit($id)
    {
        $walking = UserWalking::findOrFail($id);
        return view('user_walkings.edit', compact('walking'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'walking_on' => 'required|date',
            'step_cnt' => 'required|integer',
        ]);

        $walking = UserWalking::findOrFail($id);
        $walking->update($request->only(['user_id', 'walking_on', 'step_cnt']));

        return redirect()->route('user-walkings.index')->with('success', 'Record updated.');
    }

    public function destroy($id)
    {
        $walking = UserWalking::findOrFail($id);
        $walking->delete();

        return redirect()->route('user-walkings.index')->with('success', 'Record deleted.');
    }

    public function show($id)
{
    $walking = UserWalking::findOrFail($id);
    return view('user-walkings.show', compact('walking'));
}
    public function filter(Request $request)
    {
        $query = UserWalking::query();

        if ($request->has('user_id') && $request->user_id !== null) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('walking_on') && $request->walking_on !== null) {
            $query->whereDate('walking_on', $request->walking_on);
        }

        $walkings = $query->orderBy('walking_on', 'desc')->paginate(20);

        return view('user_walkings.index', compact('walkings'));
    }
}
