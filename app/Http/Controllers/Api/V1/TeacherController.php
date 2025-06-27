<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreTeacherRequest;
use App\Http\Requests\Teacher\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return response()->json([
            'status' => 'success',
            'data' => $teachers
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $teacher = Teacher::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => $teacher
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        return response()->json(
            [
                'status' => 'success',
                'data' => $teacher

            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, string $id)
    {
        $teacher = Teacher::find($id);

        $validated = $request->validated();

        if (!$teacher) {
            return response()->json([
                'status' => 'error',
                'message' => 'Teacher not found'
            ], 404);
        }

        $teacher->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Update successfully',
            'data'    => $teacher,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher){
            return response()->json([
                'message'=>'Delete not found'
            ],404);
        }
        $teacher->delete();
        return response()->json([
            'meassage'=> 'Delete successfuly'
        ],200);
    }
}
