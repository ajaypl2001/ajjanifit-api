<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gym;
use Illuminate\Support\Facades\Validator;

class GymController extends Controller
{

    public function index()
    {
        $gyms = Gym::latest()->get();

        return response()->json([
            'success' => true,
            'data' => $gyms
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gym_name'   => 'required',
            'owner_id' => 'required|exists:users,id',
            'email'      => 'required|email|unique:gyms,email',
            'phone'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $gym = Gym::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Gym created successfully',
            'data' => $gym
        ]);
    }

    public function show(string $id)
    {
        $gym = Gym::find($id);

        if (!$gym) {
            return response()->json([
                'success' => false,
                'message' => 'Gym not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $gym
        ]);
    }

    public function update(Request $request, string $id)
    {
        $gym = Gym::find($id);

        if (!$gym) {
            return response()->json([
                'success' => false,
                'message' => 'Gym not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'gym_name'   => 'required',
            'owner_id' => 'required|exists:users,id',
            'email'      => 'required|email|unique:gyms,email,' . $id,
            'phone'      => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $gym->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Gym updated successfully',
            'data' => $gym
        ]);
    }

    public function destroy(string $id)
    {
        $gym = Gym::find($id);

        if (!$gym) {
            return response()->json([
                'success' => false,
                'message' => 'Gym not found'
            ], 404);
        }

        $gym->delete();

        return response()->json([
            'success' => true,
            'message' => 'Gym deleted successfully'
        ]);
    }
}